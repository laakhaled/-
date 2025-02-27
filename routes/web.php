<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', [UserController::class, 'register']);
Route::post('/signup',[UserController::class,'handleRegister'])->name('register');


Route::get('/login',[UserController::class,'login']);
Route::post('/login',[UserController::class,'handleLogin'])->name('login');

Route::get('/logout',[UserController::class,'logout']);


Route::get('/users',[UserController::class,'index']);

Route::get('/home', function () {
    return view('home');
})->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/upload-image', [ProfileController::class, 'uploadPortfolioImage'])->name('profile.upload.image');
    Route::delete('/profile/delete-image/{id}', [ProfileController::class, 'deletePortfolioImage'])->name('profile.delete.image');
});
Route::get('/allrequests', [ServiceRequestController::class, 'admin']);
Route::get('/requests', [ServiceRequestController::class, 'index'])->name('requests.index');
Route::get('/requests/create', [ServiceRequestController::class, 'create'])->name('requests.create');
Route::post('/requests', [ServiceRequestController::class, 'store'])->name('requests.store');
Route::delete('requests/delete/{id}',[ServiceRequestController::class,'destroy']);

Route::get('/offers',[OfferController::class,'index']);
Route::post('/offers/{request}', [OfferController::class, 'store'])->name('offers.store');
Route::put('/offers/{offer}', [OfferController::class, 'update'])->name('offers.update');


Route::get('/appointments/create/{offer}', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');

Route::get('/allappointments', [AppointmentController::class, 'index']);