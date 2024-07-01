<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RefuserMail extends Mailable
{
    use Queueable, SerializesModels;
    public $refuser;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $refuser)
    {
        $this->refuser = $refuser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reponse à une demande')->view('emails.refusermail');
    }
}
