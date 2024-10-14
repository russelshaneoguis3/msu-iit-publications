<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');  // Add the name for the route here


Route::get('/verify/{token}', [AuthController::class, 'verifyEmail'])->name('verifyEmail');

