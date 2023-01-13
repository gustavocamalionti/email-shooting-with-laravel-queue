<?php

namespace App\Jobs;

use Exception;
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

    public $email;
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
        $event_exists = EventsMail::where('uuid', $this->job->payload()['uuid']);
        if ($event_exists->count() == 0) {
            $logEvent = new EventsMail;
            $logEvent->uuid = $this->job->payload()['uuid'];
            $logEvent->email = $this->email;
            $logEvent->status = 'Processing';
            $logEvent->details = 'The email is being processed, please wait.';
            $logEvent->save();
        };
        Mail::to('teste@test.com')->send(new MensagemTesteMail($this->email));
    }
}
