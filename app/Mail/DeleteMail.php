<?php 

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeleteMail extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        return $this->from('noreply@leboncoin.com')
                    ->subject('Annonce supprimée')
                    ->view('mail.delete-annonce');
    }
}
