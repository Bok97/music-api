<?php

namespace App\Mail\v1;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationCodeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $type;

    public function __construct($user, $type)
    {
        $this->user = $user;
        $this->type = $type;
    }

    public function build()
    {
        return $this->subject('Mail from Music Platform')
            ->view('emails.verification_code');
    }
}
