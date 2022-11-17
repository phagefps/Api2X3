<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Payment;

class GetClpPerUsd implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $payment_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($payment_id)
    {
        $this->payment_id = $payment_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $last_payment = Payment::whereNotNull('clp_usd')->whereDate('created_at', \Carbon\Carbon::today())->orderBy('created_at', 'desc')->first();
        if ($last_payment) {
            $clp_usd = $last_payment->clp_usd;
        } else {            
            $api_clpperusd = file_get_contents('https://mindicador.cl/api/dolar');
            $clp_usd = json_decode($api_clpperusd, true)['serie'][0]['valor'];
        }

        $payment = Payment::findOrFail($this->payment_id);
        $payment->clp_usd = $clp_usd;
        $payment->save();
    }
}
