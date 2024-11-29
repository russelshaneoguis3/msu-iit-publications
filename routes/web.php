<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\CenterController;

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
Route::put('/admin/dashboard/{id}', [DashboardController::class, 'updateAnnouncement'])->name('admin.updateAnnouncement');
Route::post('/admin/dashboard/add', [DashboardController::class, 'addAnnouncement'])->name('admin.addAnnouncement');

//Admin research
Route::get('/admin/research', [ResearchController::class, 'adminResearch'])->name('admin.research');
Route::post('/admin/research/add', [ResearchController::class, 'addResearch'])->name('admin.addResearch');
Route::put('/admin/research/{id}', [ResearchController::class, 'updateResearch'])->name('admin.updateResearch');
// Route to view a user's research as an admin
Route::get('/admin/research/{id}', [ResearchController::class, 'viewUserResearch'])->name('admin.viewResearch');
//view from center
Route::get('/admin/viewResearch/{id}', [ResearchController::class, 'viewCenterResearch'])->name('admin.viewCenterResearch');
//print research
Route::get('/admin/research/print/{r_id}', [ResearchController::class, 'printSpecificResearch'])->name('admin.print.research');

//Admin publication
Route::get('/admin/publication', [PublicationController::class, 'adminPublication'])->name('admin.publication');
Route::post('/admin/publication/add', [PublicationController::class, 'addPublication'])->name('admin.addPublication');
Route::put('/admin/publication/{id}', [PublicationController::class, 'updatePublication'])->name('admin.updatePublication');
// Route to view a user's publications as an admin
Route::get('/admin/publication/{id}', [PublicationController::class, 'viewUserPublication'])->name('admin.viewPublication');
//View from center 
Route::get('/admin/viewPublication/{id}', [PublicationController::class, 'viewCenterPublication'])->name('admin.viewCenterPublication');
//print publication
Route::get('/admin/publication/print/{p_id}', [PublicationController::class, 'printSpecificPublication'])->name('admin.print.publication');


//Admin presentation
Route::get('/admin/presentation', [PresentationController::class, 'adminPresentation'])->name('admin.presentation');
Route::post('/admin/presentation/add', [PresentationController::class, 'addPresentation'])->name('admin.addPresentation');
Route::put('/admin/presentation/{id}', [PresentationController::class, 'updatePresentation'])->name('admin.updatePresentation');
// Route to view a user's presentation as an admin
Route::get('/admin/presentation/{id}', [PresentationController::class, 'viewUserPresentation'])->name('admin.viewPresentation');
//view fron center 
Route::get('/admin/viewPresentation/{id}', [PresentationController::class, 'viewCenterPresentation'])->name('admin.viewCenterPresentation');
//print presentation
Route::get('/admin/presentation/print/{pr_id}', [PresentationController::class, 'printSpecificPresentation'])->name('admin.print.presentation');


//Admin documentation
Route::get('/admin/documentation', [DocumentationController::class, 'adminDocumentation'])->name('admin.documentation');
Route::post('/admin/documentation/add', [DocumentationController::class, 'addDocumentation'])->name('admin.addDocumentation');
Route::put('/admin/documentation/{id}', [DocumentationController::class, 'updateDocumentation'])->name('admin.updateDocumentation');
// Route to view a user's Documentation as an admin
Route::get('/admin/documentation/{id}', [DocumentationController::class, 'viewUserDocumentation'])->name('admin.viewDocumentation');


//Admin Team
Route::get('/admin/team', [TeamController::class, 'adminTeam'])->name('admin.team');
Route::put('admin/team/edit/{uid}', [TeamController::class, 'editUser'])->name('admin.team.edit');


//Admin Center
Route::get('/admin/center', [CenterController::class, 'adminCenter'])->name('admin.center');
Route::post('/admin/center/add', [CenterController::class, 'addCenter'])->name('admin.addCenter');

//-----------------------------------------------------------------------------------------------------------------------------


// User Routes ----------------------------------------------------------------------------------------------------------------

// User Dashboard
Route::get('/users/dashboard', [DashboardController::class, 'usersDashboard'])->name('users.dashboard');
Route::get('/dashboard/yearly-report', [DashboardController::class, 'getYearlyReportData']);


//user research
Route::get('/users/research', [ResearchController::class, 'usersResearch'])->name('users.research');
Route::post('/users/research/add', [ResearchController::class, 'addResearch'])->name('users.addResearch');
Route::put('/users/research/{id}', [ResearchController::class, 'updateResearch'])->name('users.updateResearch');
//print research
Route::get('/users/research/print/{r_id}', [ResearchController::class, 'printUserResearch'])->name('users.print.research');

//user publication
Route::get('/users/publication', [PublicationController::class, 'usersPublication'])->name('users.publication');
Route::post('/users/publication/add', [PublicationController::class, 'addPublication'])->name('users.addPublication');
Route::put('/users/publication/{id}', [PublicationController::class, 'updatePublication'])->name('users.updatePublication');
//print publication
Route::get('/users/publication/print/{p_id}', [PublicationController::class, 'printUserPublication'])->name('users.print.publication');

//user presentation
Route::get('/users/presentation', [PresentationController::class, 'usersPresentation'])->name('users.presentation');
Route::post('/users/presentation/add', [PresentationController::class, 'addPresentation'])->name('users.addPresentation');
Route::put('/users/presentation/{id}', [PresentationController::class, 'updatePresentation'])->name('users.updatePresentation');
//print presentation
Route::get('/users/presentation/print/{pr_id}', [PresentationController::class, 'printUserPresentation'])->name('users.print.presentation');

//user documentation
Route::get('/users/documentation', [DocumentationController::class, 'usersDocumentation'])->name('users.documentation');
Route::post('/users/documentation/add', [DocumentationController::class, 'addDocumentation'])->name('users.addDocumentation');
Route::put('/users/documentation/{id}', [DocumentationController::class, 'updateDocumentation'])->name('users.updateDocumentation');

//user Team
Route::get('/users/team', [TeamController::class, 'usersTeam'])->name('users.team');
Route::put('/users/{uid}/update-personal', [TeamController::class, 'updatePersonal'])->name('users.updatePersonal');


//-----------------------------------------------------------------------------------------------------------------------------