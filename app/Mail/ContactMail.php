<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ContactMessage $contact) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '[Contacto] '.($this->contact->subject ?: 'Nuevo mensaje').' — '.$this->contact->name,
            replyTo: [$this->contact->email],
        );
    }

    public function content(): Content
    {
        return new Content(markdown: 'emails.contact');
    }
}
