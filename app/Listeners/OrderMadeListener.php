<?php

namespace App\Listeners;

use App\Events\OrderMade;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use PDF;

class OrderMadeListener implements ShouldQueue
{
 
    public function __construct()
    {
        //
    }

   
    public function handle(OrderMade $event)
    {

        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];
          
        $pdf = PDF::loadView('myPDF', $data);

      //  $pdf->save(storage_path('app/stuff.pdf'));

    
        return $pdf->download('itsolutionstuff.pdf');
        
    }
}
