<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Loan;
use App\Models\User;

class LoanApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $loan  , $user , $subject;

    /**
     * Create a new message instance.
     *
     * @param $loan The loan object being approved.
     * @return void
     */

     public function __construct(Loan $loan, User $user, $subject)
    {
        $this->loan = $loan;
        $this->user = $user;
        $this->subject = $subject;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->markdown('emails.loan_approved')->subject($this->subject);

    }
}
