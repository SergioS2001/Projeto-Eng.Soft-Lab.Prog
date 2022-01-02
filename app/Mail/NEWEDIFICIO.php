<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NEWEDIFICIO extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($edificio,$mode)
    {

switch($mode){case 1:
    return $this->view('edificio.NEW_MAIL',['edificios' => $edificio ]);
    break;
case 2:
return $this->view('edificio.UPDATE_MAIL',['edificios' => $edificio ]);

break;
case 3:
    return $this->view('edificio.DELETEDEDIFICIOS',['edificios' => $edificio ]);
    break;

default:
return false;
break;
 }
return false;
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
