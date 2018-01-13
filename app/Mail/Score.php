<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Model\Session;

class Score extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * store Session data.
     *
     * @return object
     */
     public $form;

     /**
      * store Session data.
      *
      * @return object
      */
      public $session;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($form)
    {
        $this->session = Session::where('refid','=',$form['refid'])->firstorfail();
        $this->form = $form;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.score');
    }
}
