<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Public Routes (not requiring authentication)
Route::get('/', function () {
    return view('home');
})->name('home');

// Registration Routes
Route::get('/register', function () {
    return view('register');
})->name('register'); // This will show the registration form

Route::post('/register', [AuthController::class, 'register'])->name('register.store'); // Post route for registration

// Login Routes
Route::get('/login', function () {
    return view('login');
})->name('login');  // Add the name for the route

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Email Verification Route
Route::get('/verify/{token}', [AuthController::class, 'verifyEmail'])->name('verifyEmail');

// Admin Routes (Require Authentication and Admin Role)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// User Routes (Require Authentication and User Role)
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/users/dashboard', function () {
        return view('users.dashboard');
    })->name('users.dashboard');
});
