<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyPreRegistered extends Mailable
{
    use Queueable, SerializesModels;
    public $preInscrit;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($preInscrit)
    {
        $this->preInscrit = $preInscrit;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                ->from('noreply@esc-ouaga.com')
                ->subject("Relance pour préinscription")
                ->view('emails.relance_preinscrit');
    }
}
