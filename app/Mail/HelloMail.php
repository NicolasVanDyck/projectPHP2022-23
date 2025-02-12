<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class HelloMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($voornaam, $achternaam, $email, $dropdown, $bericht,)
    {
//
        $this->voornaam = $voornaam;
        $this->achternaam = $achternaam;
        $this->email = $email;
        $this->dropdown = $dropdown;
        $this->bericht = $bericht;
    }


    /**
     * Get the message envelope.
     *
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contactformulier', // onderwerp van de mail
            from: $this->email, // afzender van de mail
        );
    }

    /**
     * Get the message content definition.
     * Stuurt de data van het contactformulier naar de mail.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.hello',
            with: [
                'voornaam' => $this->voornaam,
                'achternaam' => $this->achternaam,
                'email' => $this->email,
                'dropdown' => $this->dropdown,
                'bericht' => $this->bericht,

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
