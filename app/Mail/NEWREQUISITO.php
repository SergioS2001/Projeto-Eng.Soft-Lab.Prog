<?php

namespace App\Mail;

use App\Models\Requisito;
use Illuminate\Http\Response;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NEWREQUISITO extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($util,$req,$mode)
    {

switch($mode){case 1:
        return $this->view('mail.newrequisito',['id'=>$util  ,'requisito' => $req ]);
        break;
case 2:
    return $this->view('mail.updatedrequsito',['id'=>$util  ,'requisito' => $req ]);

break;
    case 3:
        return $this->view('mail.deleterequisito',['id'=>$util  ,'requisito' => $req ]);
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
