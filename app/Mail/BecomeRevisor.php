<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class BecomeRevisor extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $user;

    public $surname;

    public $number;
    public $address;
    public $city;
    public $description;
    public $file;
    public $email;
    public $userData;
    public function __construct($userData)
    {
        // $this->user=$user;      
        // $this->surname=$surname;
        // $this->number=$number;
        // $this->address=$address;
        // $this->city=$city;
        // $this->description=$description;
        // $this->file=$file;
        // $this->email=$email;

        $this->userData=$userData;
    }

    public function build(){
        return $this->from('presto.it@noreply.com')->view('mail.become_revisor');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // from:new Address($this->userData['email']),
            subject: 'Richiesta di diventare revisore',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.become_revisor',
            
            with: [
                'userData' => $this->userData,
            ]

        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath($this->userData['file'])
                ->as('cv.pdf')
                ->withMime('application/pdf')
        ];
    }
}
