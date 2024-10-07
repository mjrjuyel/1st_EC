<?php

namespace App\Listeners;

use App\Events\BrandProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Auth;
use App\Mail\BrandMail;
use Illuminate\Support\Facades\Mail;

class SendBrandNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BrandProcessed $event): void
    {
        // dd($event->brand);
        if(is_null($event->brand)){
            dd($event);
        }

        if(is_null($event)){
            dd($event);
        }

        Mail::to('mjrjuyel8@gmail.com')->send(new BrandMail($event));
    }
}
