<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Email,$token)
    {
        return $this->view('Utilizador.Email_Verifical',['Email' => $Email,'token'=>$token]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    }
}
