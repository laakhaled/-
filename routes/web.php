<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\AppointmentController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', [UserController::class, 'register']);
Route::post('/signup',[UserController::class,'handleRegister'])->name('register');


Route::get('/login',[UserController::class,'login']);
Route::post('/login',[UserController::class,'handleLogin'])->name('login');

Route::get('/logout',[UserController::class,'logout']);

Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/update', [UserController::class, 'update'])->name('user.update');

Route::get('/home', function () {
    return view('home');
})->name('home');





Route::get('/requests', [ServiceRequestController::class, 'index'])->name('requests.index');
Route::get('/requests/create', [ServiceRequestController::class, 'create'])->name('requests.create');
Route::post('/requests', [ServiceRequestController::class, 'store'])->name('requests.store');
Route::delete('requests/delete/{id}',[ServiceRequestController::class,'destroy']);

Route::post('/offers/{request}', [OfferController::class, 'store'])->name('offers.store');

Route::get('/appointments/create/{offer}', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');