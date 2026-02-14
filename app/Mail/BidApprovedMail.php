<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Models\User;
use Illuminate\Queue\SerializesModels;
use App\Models\Bid;
use App\Models\NFT;

class BidApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $bid;
    public $nft, $subject, $user;

    /**
     * Create a new message instance.
     */
    public function __construct( Bid $bid, NFT $nft, $subject )
    {
        $this->bid = $bid;
        $this->nft = $nft;
        $this->subject = $subject;

    }

    /**
     * Build the message.
     */
    public function build()
    {



        return $this->markdown('emails.bid_approved')->subject($this->subject);

    }
}
