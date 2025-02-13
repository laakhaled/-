<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
//use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AuthorBookController;
use App\Http\Controllers\StudentController;

Route::get('/home', function () {
   return view('home');})->name('home');

//});
//Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class);
Route::resource('students', StudentController::class);
