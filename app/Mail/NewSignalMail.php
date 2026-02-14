<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Models\User;
use Illuminate\Queue\SerializesModels;
use App\Models\Signal;

class NewSignalMail extends Mailable
{
    use Queueable, SerializesModels;

    public $signal,  $user , $subject;

    /**
     * Create a new message instance.
     */
    public function __construct(Signal $signal, User $user, $subject)
    {
        $this->signal = $signal;
        $this->user = $user;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     */
    public function build()
    {

        return $this->markdown('emails.new_signal')->subject($this->subject);

    }
}
