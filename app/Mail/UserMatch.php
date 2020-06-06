<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserMatch extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $authUser;

    public function __construct($authUser, $user)
    {
        $this->user = $user;
        $this->authUser = $authUser;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.match', [
            'user' => $this->user,
            'authUser' => $this->authUser
        ]);
    }
}
