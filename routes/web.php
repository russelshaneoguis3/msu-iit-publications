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
})->name('register'); 

// This will show the registration form
Route::get('/register', [AuthController::class, 'showCenters'])->name('register');
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
Route::post('/admin/publication/add', [PublicationController::class, 'addPublication'])->name('admin.addPublication');
Route::put('/admin/publication/{id}', [PublicationController::class, 'updatePublication'])->name('admin.updatePublication');
// Route to view a user's publications as an admin
Route::get('/admin/publication/{id}', [PublicationController::class, 'viewUserPublications'])->name('admin.viewPublications');


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
Route::get('/dashboard/yearly-report', [DashboardController::class, 'getYearlyReportData']);


//user research
Route::get('/users/research', [ResearchController::class, 'usersResearch'])->name('users.research');
Route::post('/users/research/add', [ResearchController::class, 'addResearch'])->name('users.addResearch');
Route::put('/users/research/{id}', [ResearchController::class, 'updateResearch'])->name('users.updateResearch');

//user publication
Route::get('/users/publication', [PublicationController::class, 'usersPublication'])->name('users.publication');
Route::post('/users/publication/add', [PublicationController::class, 'addPublication'])->name('users.addPublication');
Route::put('/users/publication/{id}', [PublicationController::class, 'updatePublication'])->name('users.updatePublication');


//user presentation
Route::get('/users/presentation', [PresentationController::class, 'usersPresentation'])->name('users.presentation');
Route::post('/users/presentation/add', [PresentationController::class, 'addPresentation'])->name('users.addPresentation');
Route::put('/users/presentation/{id}', [PresentationController::class, 'updatePresentation'])->name('users.updatePresentation');

//user documentation
Route::get('/users/documentation', [DocumentationController::class, 'usersDocumentation'])->name('users.documentation');
Route::post('/users/documentation/add', [DocumentationController::class, 'addDocumentation'])->name('users.addDocumentation');
Route::put('/users/documentation/{id}', [DocumentationController::class, 'updateDocumentation'])->name('users.updateDocumentation');

//user Team
Route::get('/users/team', [TeamController::class, 'usersTeam'])->name('users.team');
Route::put('/users/{uid}/update-personal', [TeamController::class, 'updatePersonal'])->name('users.updatePersonal');


//-----------------------------------------------------------------------------------------------------------------------------