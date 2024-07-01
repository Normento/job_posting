<?php

namespace App\Mail;

use App\Models\Postuler;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccepterMail extends Mailable
{
    use Queueable, SerializesModels;
        public $accepter;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $infos)
    {
        $this->accepter=$infos;
    }

    /**
     * Build the message. 
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reponse à une demande')->view('emails.acceptermail');
    }
}
