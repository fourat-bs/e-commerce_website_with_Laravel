<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Message extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * The order instance.
     *
     * @var Order
     */
    public $message;
    /**
     * Create a new message instance.
     *
     * @param  \App\Order  $order
     * @return void
     */ 


    public function __construct( $message)
    {
        $this->message = $message;
      
    }
     /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {    

        return $this->view('emails.message-created')->with([
                        'email' => $this->message->email,
                        'name' => $this->message->name,
                    ]);;
    }
}
