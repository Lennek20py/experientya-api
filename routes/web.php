<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\CompanyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::resource('company', CompanyController::class);
// Route::resource('user', UserController::class);

//Home
Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/welcome', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/company/register', [HomeController::class, 'companyRegister'])->name('company.register');
Route::get('/user/register', [HomeController::class, 'userRegister'])->name('user.register');

//State and Towns
Route::get('/list-states', [StateController::class, 'fetchStates'])->name('list-states');
Route::get('/list-towns/{id}', [StateController::class, 'fetchTowns'])->name('list-towns');
Route::get('/list-sectors', [SectorController::class, 'fetchSectors'])->name('list-sectors');

//Company
Route::post('/company/create', [CompanyController::class, 'store'])->name('company.store');
Route::get('/company/dashboard', [CompanyController::class, 'index'])->name('company.index');

//User / Candidate Basic Info
Route::post('/user/create', [UserController::class, 'store'])->name('user.store');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/micv', function () {
        return Inertia::render('User/MiCV');
    })->name('user.micv');
    Route::get('/vacants', function () {
        return Inertia::render('User/Vacant');
    })->name('user.vacants');
    Route::get('/messages', function () {
        return Inertia::render('User/Messages');
    })->name('user.messages');
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:company', 'verified'])->group(function () {
    Route::get('/company/dashboard', [CompanyController::class, 'index'])->name('company.index');
    Route::get('/company/settings', [CompanyController::class, 'settings'])->name('company.settings');
    Route::put('/company/update/{company}', [CompanyController::class, 'update'])->name('company.update');
});
