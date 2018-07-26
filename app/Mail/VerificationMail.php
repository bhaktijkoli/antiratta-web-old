<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;
use App\EmailVerification;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Verify Your Email";
    public $user;
    public $ev;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, EmailVerification $ev)
    {
      $this->ev = $ev;
      $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.signup');
    }
}
