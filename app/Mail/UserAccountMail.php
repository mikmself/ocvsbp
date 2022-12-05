<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserAccountMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    public function __construct($details)
    {
        $this->details = $details;
    }
    public function envelope()
    {
        return new Envelope(
            subject: 'User Account Mail',
        );
    }
    public function content()
    {
        return new Content(
            view: 'mail.userAccount',
        );
    }
    public function attachments()
    {
        return [];
    }
}
