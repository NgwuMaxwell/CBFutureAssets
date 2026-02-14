<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Trade;

class AdminPlacedTradeMail extends Mailable
{
    use Queueable, SerializesModels;

    public  $trade ,  $user,  $ubject;

    /**
     * Create a new message instance.
     */
    public function __construct(Trade $trade , User $user , $subject )
    {
        $this->trade = $trade;
        $this->user = $user;
        $this ->subject = $subject;

    }

    /**
     * Build the message.
     */
    public function build()
    {

        return $this->markdown('emails.admin_placed_trade')->subject($this->subject);

    }
}
