<?php

namespace App\Jobs;

use Throwable;
use App\Models\EventsMail;
use Illuminate\Bus\Queueable;
use App\Mail\MensagemTesteMail;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Log;
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

    protected $email;
    // public $maxExceptions = 3;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        // $events_selected = EventsMail::where('uuid', strval($this->job->payload()['uuid']));
        // Log::info($events_selected);
        // if ($events_selected->get()->count() == 0) {
        //     $logEvent = new EventsMail;
        //     $logEvent->uuid = $this->job->payload()['uuid'];
        //     $logEvent->email = $this->email;
        //     $logEvent->status = 'PROCESSANDO';
        //     $logEvent->details = 'Aguarde, o evento ainda está na fila.';
        //     $logEvent->save();
        // }

        // Log::info($this->job->getJobId());

        // Mail::to('teste@test.com')->queue(new MensagemTesteMail($this->email, $this->job->payload()['uuid']));
        Mail::to('teste@test.com')->queue(new MensagemTesteMail($this->email);
        // dd('job primeiro', $this->job->hasFailed());

        // if(Mail::failures() == 0){
        //     throw new \Exception("Erro de conexão com o servidor de disparos de emails.", 1);
        // }
    }
    // /**
    //      * Handle a job failure.
    //      *
    //      * @param  \Throwable  $exception
    //      * @return void
    //      */
    //     public function failed(Throwable $exception)
    //     {
    //     }
}
