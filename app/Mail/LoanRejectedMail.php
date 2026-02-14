<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use App\Models\User;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Loan;
class LoanRejectedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $loan , $user , $subject;

    /**
     * Create a new message instance.
     *
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


        return $this->markdown('emails.loan_rejected')->subject($this->subject);

    }
}
