<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class messageMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $message;
    protected $url;

    public function __construct(Message $message)
    {
        $this->message = $message;

        $this->url = url("/messages/$message->id");
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //TODO change to gobal variable
        return $this->view('emails/message')->with([
            'messageSubject' => $this->message->subject,
            'url' => $this->url,
        ]);

    }
}
