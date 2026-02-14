<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Trade;

class TradeExecutedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $trade, $user , $subject;

    public function __construct(Trade $trade, User $user, $subject)
    {
        $this->trade = $trade;
        $this->user = $user;
        $this->subject = $subject;
    }

    public function build()
    {


        return $this->markdown('emails.trade_executed')->subject($this->subject);

    }
}
