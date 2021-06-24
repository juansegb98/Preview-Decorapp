<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AVISolutionsPlusUserMailRegistration extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $this->view('mail.userRegisterMail');

        // $this->withSwiftMessage(function ($message) {
        //     $message->getHeaders()->addTextHeader(
        //         'Custom-Header', 'Header Value'
        //     );
        // });
        $this->subject('AVI Solutions Plus: User Mail Registration');
        return $this->view('mail.userRegisterMail');

    }
}
