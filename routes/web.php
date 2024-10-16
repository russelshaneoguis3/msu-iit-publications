<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Front end / Landing Page --------------------------------------------------------------------------------------------------

// Public Routes (not requiring authentication)
Route::get('/', function () {
    return view('home');
})->name('home');

//----------------------------------------------------------------------------------------------------------------------------


//Authentication -------------------------------------------------------------------------------------------------------------

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


// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//-----------------------------------------------------------------------------------------------------------------------------


// Admin Routes ---------------------------------------------------------------------------------------------------------------

// Admin Dashboard
Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])->name('admin.dashboard');

//-----------------------------------------------------------------------------------------------------------------------------


// User Routes ----------------------------------------------------------------------------------------------------------------

// User Dashboard
Route::get('/users/dashboard', [AuthController::class, 'userDashboard'])->name('users.dashboard');


//-----------------------------------------------------------------------------------------------------------------------------