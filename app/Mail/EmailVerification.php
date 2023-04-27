<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $name;
    public $payload;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $email, string $name, string $payload)
    {
        $this->email = $email;
        $this->name = $name;
        $this->payload = $payload;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            to: $this->email,
            subject: 'Email Verification',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'mail.emailVerification',
            with: [
                'name' => $this->name,
                'link' => env('FRONTEND_URL') . '/auth/verify?payload='. $this->payload,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
