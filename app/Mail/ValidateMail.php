<?php 

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ValidateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function build()
    {
        return $this->from('noreply@leboncoin.com')
                    ->subject('Annonce validé')
                    ->view('mail.validate-annonce', ['token' => $this->token]);
    }
}
