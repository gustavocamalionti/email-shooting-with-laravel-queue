<?php

namespace App\Jobs;

use Throwable;
use App\Models\EventsMail;
use Illuminate\Bus\Queueable;
use App\Mail\MensagemTesteMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $tries = 3;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   
        // throw new \Exception("Error Processing the job", 1);
        // dd($this->job->getJobId);

        Mail::to('teste@test.com')->send(new MensagemTesteMail());

        
        $logEvent = new EventsMail;
        $logEvent->uuid = $this->job->payload()['uuid'];
        $logEvent->email = 'qualquer_email@teste.com.br';
        $logEvent->status = 'INICIO';
        $logEvent->details = 'teste';
        $logEvent->save();
        
    }

    public function failed(Throwable $throwable) {
        $logEvent = new EventsMail;
        $logEvent->uuid = $this->job->payload()['uuid'];
        $logEvent->email = 'qualquer_email@teste.com.br';
        $logEvent->status = 'FALHA';
        $logEvent->details = 'teste';
        $logEvent->save();
    }
}
