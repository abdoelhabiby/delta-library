<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResponseContactUs extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $response = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($response)
    {
        $this->response = $response;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.responseContact')->with(['name' => $this->response['name'],'response' => $this->response['response']]);
    }
}
