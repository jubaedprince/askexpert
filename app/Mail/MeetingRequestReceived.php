<?php

namespace App\Mail;

use App\Meeting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MeetingRequestReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $meeting;
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct(Meeting $meeting)
    {
        $this->meeting = $meeting;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this->from(env('MAIL_USERNAME'))->view('emails.meeting.request-received');
    }
}
