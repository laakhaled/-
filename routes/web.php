<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\AppointmentController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::prefix('test')->group(function () {
    Route::get('/requests', [ServiceRequestController::class, 'index'])->name('test.requests.index');
    Route::get('/requests/create', [ServiceRequestController::class, 'create'])->name('test.requests.create');
    Route::post('/requests', [ServiceRequestController::class, 'store'])->name('test.requests.store');

    Route::post('/offers/{request}', [OfferController::class, 'store'])->name('test.offers.store');

    Route::get('/appointments/create/{offer}', [AppointmentController::class, 'create'])->name('test.appointments.create');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('test.appointments.store');
});
