<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderBookAdminAlert extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $array2;

    public function __construct($array2)
    {
        $this->arrays = $array2;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
     {
         return $this->view($this->arrays['view'])
                     ->from($this->arrays['from'], env('MAIL_FROM_NAME'))
                     ->subject($this->arrays['subject'])
                     ->with([
                         'order_details' => $this->arrays['details'],
                         'user_details' => $this->arrays['user_details']
                     ]);
     }
}
