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
            
            $getEvent = EventsMail::where('uuid', $event->job->payload()['uuid']);
            if (!$event->job->hasFailed()) {
                $getEvent->update(['status' => 'Success', 'details' => 'The email has been sent.']); 
            }
        });
        
        Queue::failing(function (JobFailed $event) {
            $exception = $event->exception->getMessage();
            $getEvent = EventsMail::where('uuid', $event->job->payload()['uuid']);
            $getEvent->update(['status' => 'Error', 'details' => $exception]);
        });
    }
}
