<?php

namespace App\Providers;

use App\Models\EventsMail;
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
        Queue::before(function (JobProcessing $event) {
            // $job = $event->job->getJobId();
            // $obj = unserialize($job['data']['data']);
            // $logEvent = new EventsMail;
            // $logEvent->uuid = $event->job->payload()['uuid'];
            // $logEvent->email = 'qualquer_email@teste.com.br';
            // $logEvent->status = 'ANTES';
            // $logEvent->details = 'teste';
            // $logEvent->save();
            // dd($event,'antesbefore');
            // dd($event->job);
            // $event->connectionName
            // $event->job
            // $event->job->payload()
        });
        
        Queue::after(function (JobProcessed $event) {
            // $logEvent = new EventsMail;
            // $logEvent->uuid = $event->job->payload()['uuid'];
            // $logEvent->email = 'qualquer_email@teste.com.br';
            // $logEvent->status = 'DEPOIS';
            // $logEvent->details = 'teste';
            // $logEvent->save();
        });

        Queue::failing(function (JobFailed $event) {
            // $logEvent = new EventsMail;
            // $logEvent->uuid = $event->job->payload()['uuid'];
            // $logEvent->email = 'qualquer_email@teste.com.br';
            // $logEvent->status = 'FALHA';
            // $logEvent->details = 'teste';
            // $logEvent->save();
        });
    }
}
