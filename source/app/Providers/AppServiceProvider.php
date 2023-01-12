<?php

namespace App\Providers;

use App\Models\EventsMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\ServiceProvider;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Queue::before(function (JobProcessing $event) {
        //     if (!$event->job->hasFailed()) {
        //         $email_send = EventsMail::where('uuid', $event->job->payload()['uuid'])->get()['email'];
        //         EventsMail::where('email', $email_send)->update(['status' => 'ENTREGUE', 'details' => 'Email enviado com sucesso.']);
        //     }
        // });
        
        Queue::after(function (JobProcessed $event) {
            
            // $e = EventsMail::where('uuid', $event->job->payload()['uuid'])->get();
            // if (!$event->job->hasFailed() and (count($e) > 0)) {
            //     $email_send = EventsMail::where('uuid', $event->job->payload()['uuid'])->get()->pluck('email')[0];
            //     EventsMail::where('email', $email_send)->update(['status' => 'ENTREGUE', 'details' => 'Email enviado com sucesso.']); 
            // };
        });
        
        Queue::failing(function (JobFailed $event) {

            // Log::info($event->job->getJobId());
            // $exception = $event->exception->getMessage();
            // EventsMail::where('uuid', strval($event->job->payload()['uuid']))->update(['status' => 'FALHA AO ENVIAR', 'details' => $exception]);
        });
    }
}
