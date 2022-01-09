<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NEWSALA extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sala,$mode)
    {
        switch($mode){case 1:
            return $this->view('sala.NEWSALA',['sala' => $sala ]);
            break;
        case 2:
        return $this->view('sala.UPDATESALA',['sala' => $sala ]);

        break;
        case 3:
            return $this->view('sala.DELETESALA',['sala' => $sala ]);
            break;

        default:
        return false;
        break;
    }
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
