<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Mail\SupportEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index(){
        return view('emails', [
            'emails' => Email::latest()->with('attachments')->paginate(50)
        ]);
    }


    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'body' => 'required',
        ]);

        $email = Email::create([
            'email' => $request->email,
            'subject' => $request->subject,
            'body' => $request->body
        ]);

        Mail::to($request->email)->send(new SupportEmail($request, $email->id));

        return back()->with('success', 'Email has been sent!');
    }
}