<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisteredUser extends Mailable
{
    use Queueable, SerializesModels;

    private $userInfo;
    private $companyInfo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userInfo, $companyInfo)
    {
        $this->userInfo = $userInfo;
        $this->companyInfo = $companyInfo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $userInfo = $this->userInfo;
        $companyInfo = $this->companyInfo;
        $this->subject('AVI Solution Plus: New User Registered');
        return $this->view('mail.registerMail', compact('userInfo', 'companyInfo'));
    }
}
