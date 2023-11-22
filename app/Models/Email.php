<?php

namespace App\Models;

use App\Models\Attachment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Email extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'subject',
        'body'
    ];

    public function attachments(){
        return $this->hasMany(Attachment::class);
    }
}