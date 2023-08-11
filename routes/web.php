<?php

use App\Http\Controllers\InvoiceManagementController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('send-invoice', [InvoiceManagementController::class,'sendInvoice']);

Route::get('test',[OrderController::class,'index'])->name('orders.index');

Route::get('create-order',[OrderController::class,'create'])->name('orders.create');
Route::post('create-order',[OrderController::class,'store'])->name('orders.store');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
