<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AccountSuspended extends Mailable
{
    use Queueable, SerializesModels;

    protected $type;

    /**
     * Create a new message instance.
     */
    public function __construct($type = 'suspend')
    {
        $this->type = $type;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->type == 'suspend' ? 'Akun Anda Telah Dinonaktifkan' : 'Akun Anda Telah Diaktifkan',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $type = $this->type;

        return new Content(
            view: 'mails.account-suspended',
            with: [
                'type' => $type,
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
        return [];
    }
}
