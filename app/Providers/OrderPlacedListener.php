<?php

namespace App\Providers;

use App\Providers\OrderPlaced;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderPlacedListener
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
     * @param  \App\Providers\OrderPlaced  $event
     * @return void
     */
    public function handle(OrderPlaced $event)
    {
        //
    }
}
