<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use App\Jobs\OrderDDJob;
use App\Jobs\OrderPlacedJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Jobs\OrderPlacedPDFJob;


class OrderPlacedPDF implements ShouldQueue
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
     * Handle the event.['order' => $event->order]
     * @param  \App\Events\OrderPlaced  $event
     * @return void
     */
    public function handle(OrderPlaced $event)
    {
        OrderPlacedPDFJob::dispatch($event->order);
        OrderPlacedJob::dispatch($event->order);
        OrderDDJob::dispatch($event->order);
;      
    }
}
