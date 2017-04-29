<?php

namespace App\Mail;

use App\Expert;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExpertJoined extends Mailable
{
    use Queueable, SerializesModels;

    public $expert;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Expert $expert)
    {
        $this->expert = $expert;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_USERNAME'))->view('emails.expert.joined');
    }
}
