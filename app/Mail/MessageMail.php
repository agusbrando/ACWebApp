<?php

namespace App\Mail;

use App\Models\Message;
use App\Models\User;
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
    protected $user;
    protected $url;
    protected $attachmentsCount;

    public function __construct(Message $message)
    {
        $message = Message::find($message->id)->loadMissing('attachments');
        $this->message = $message;
        $this->user = User::find($message->user_id);
        $this->url = url("/messages/$message->id");
        $attachmentsCount = 0;
        foreach ($message->attachments as $attachment) {

            $attachmentsCount = $attachmentsCount + 1;
        }
        $this->attachmentsCount = $attachmentsCount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('emails/message')->with([
            'messageSubject' => $this->message->subject,
            'username' => $this->user->first_name,
            'userlastname' => $this->user->last_name,
            'attachmentscount' => $this->attachmentsCount,
            'url' => $this->url,
        ]);
    }
}
