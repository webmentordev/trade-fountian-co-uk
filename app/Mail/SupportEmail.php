<?php

namespace App\Mail;

use App\Models\Attachment as AttachmentModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SupportEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $data, $id;

    public function __construct($data, $id)
    {
        $this->data = $data;
        $this->id = $id;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('contact@tradefountain.co.uk', 'Trade Fountain'),
            subject: $this->data->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.support-email',
            with: [
                'body' => $this->data->body
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachment = [];
        foreach($this->data->files as $item){
            foreach($item as $file){
                AttachmentModel::create([
                    'email_id' => $this->id,
                    'name' => $file->getClientOriginalName(),
                    'type' => $file->getClientMimeType()
                ]);
                $attachment[] = Attachment::fromPath($file->getRealPath())->as($file->getClientOriginalName())->withMime($file->getClientMimeType());
            }
        }
        return $attachment;
    }
}