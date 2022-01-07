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
     * @param $edificio informação a por na tabela
     *@param $mode mode que ira determinar o tipo de email enviado
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
