<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Console\Commands\SendMail;

class RandomLanguageMail extends Mailable
{
    use Queueable, SerializesModels;

    private $userMessage;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->userMessage = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(config('mail.from'))
            ->view('mail.random_language_mail')
            ->with([
                'userMessage' => $this->userMessage,
            ]);
    }
}
