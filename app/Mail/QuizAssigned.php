<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QuizAssigned extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;

    public $quiz;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $quiz)
    {
        $this->user = $user;
        $this->quiz = $quiz;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Quiz Assigned',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'quiz-assigned',
        )->with([
            'user' => $this->user,
            'quiz' => $this->quiz,
        ]);
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
