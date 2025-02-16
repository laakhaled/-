<?php

use App\Http\Middleware\EnsureUserIsRegistered;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;





Route::get('/', function () {
    return Auth::check() ? redirect()->route('auths.register') : redirect()->route('home');
});
Route::get('/home', [HomeController::class, 'index'])
    ->middleware(\App\Http\Middleware\EnsureUserIsRegistered::class)
    ->name('home');
Route::get('/auths/register', [AuthController::class, 'register'])->name('auths.register');
Route::post('/auths/register', [AuthController::class, 'handelregister'])->name('auths.handelregister');
Route::get('/auths/login', [AuthController::class, 'login'])->name('auths.login');
Route::post('/auths/login', [AuthController::class, 'handellogin'])->name('auths.handellogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
