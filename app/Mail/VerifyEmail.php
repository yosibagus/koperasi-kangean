<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->view('auth.verify')
                    ->subject('Verify Your Email Address')
                    ->with([
                        'user' => $this->user,
                        'verificationUrl' => route('verification.notice')
                    ]);
    }
}
