<?php

namespace App\Listeners;

use App\Event\PaymentCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\PaymentCreatedNotification;
use Illuminate\Support\Facades\Mail;

class SendMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Event\PaymentCreated  $event
     * @return void
     */
    public function handle(PaymentCreated $event)
    {
        $mailData = [
            'subject' => 'You have a new payment notification.',
            'message' => 'A new payment request has been created in your name, pay it as soon as possible.'
        ];
        
        Mail::to($event->email)->queue(new PaymentCreatedNotification($mailData));
    }
}
