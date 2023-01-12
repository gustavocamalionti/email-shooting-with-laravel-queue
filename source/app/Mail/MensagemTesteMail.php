<?php

namespace App\Mail;

use App\Models\EventsMail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MensagemTesteMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
      
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $events_selected = EventsMail::where('uuid', $this->uuid);
        // if ($events_selected->get()->count() == 0) {
        //     $logEvent = new EventsMail;
        //     $logEvent->uuid = $this->uuid;
        //     $logEvent->email = $this->email;
        //     $logEvent->status = 'PROCESSANDO';
        //     $logEvent->details = 'Aguarde, o evento ainda está na fila.';
        //     $logEvent->save();
        // } else {
        //     EventsMail::where('email', $this->email)->update(['status' => "PROCESSANDO", 'details' => 'Aguarde, o evento ainda está na fila.' ]);
        // }

        return $this->subject('gustavocamalionti@gmail.com')
            ->from(env("MAIL_FROM_ADDRESS", null), 'Teste email')
            ->view('emails.cadastro-sucesso');
    }
}
