<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\InvoicePaymentNotification;
use Illuminate\Support\Facades\Notification;

class InvoiceManagementController extends Controller
{
   public function sendInvoice(){

   // $user = User::first();
   $users = User::all();

    $invoicedata = [
        'body' => 'Invoice payment boss',
        'text'=>'Pay Now',
        'url'=>url('/'),
        'thankyou'=>'Pay Now'
    ];

  


   // $user->notify(new InvoicePaymentNotification($invoicedata));
 //  Notification::send($user, new InvoicePaymentNotification($invoicedata));

 $delay = now()->addSeconds(90);
 foreach ($users as $user) {
 $user->notify((new InvoicePaymentNotification($invoicedata))->delay($delay));
 }

    return 'completed';

   }
}
