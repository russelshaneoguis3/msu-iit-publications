<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\TeamController;

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
Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');

//Admin research
Route::get('/admin/research', [ResearchController::class, 'adminResearch'])->name('admin.research');

//Admin publication
Route::get('/admin/publication', [PublicationController::class, 'adminPublication'])->name('admin.publication');

//Admin presentation
Route::get('/admin/presentation', [PresentationController::class, 'adminPresentation'])->name('admin.presentation');

//Admin documentation
Route::get('/admin/documentation', [DocumentationController::class, 'adminDocumentation'])->name('admin.documentation');

//Admin Team
Route::get('/admin/team', [TeamController::class, 'adminTeam'])->name('admin.team');

Route::get('admin/team/edit/{uid}', [TeamController::class, 'editUser'])->name('admin.team.edit');

//-----------------------------------------------------------------------------------------------------------------------------


// User Routes ----------------------------------------------------------------------------------------------------------------

// User Dashboard
Route::get('/users/dashboard', [DashboardController::class, 'usersDashboard'])->name('users.dashboard');

//user research
Route::get('/users/research', [ResearchController::class, 'usersResearch'])->name('users.research');

//user publication
Route::get('/users/publication', [PublicationController::class, 'usersPublication'])->name('users.publication');
Route::post('/users/publication/add', [PublicationController::class, 'addPublication'])->name('users.addPublication');
Route::put('/users/publication/{id}', [PublicationController::class, 'updatePublication'])->name('users.updatePublication');


//user presentation
Route::get('/users/presentation', [PresentationController::class, 'usersPresentation'])->name('users.presentation');

//user documentation
Route::get('/users/documentation', [DocumentationController::class, 'usersDocumentation'])->name('users.documentation');

//user Team
Route::get('/users/team', [TeamController::class, 'usersTeam'])->name('users.team');


//-----------------------------------------------------------------------------------------------------------------------------