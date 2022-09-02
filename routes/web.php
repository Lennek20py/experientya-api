<?php

use App\Http\Controllers\AnuiesController;
use App\Http\Controllers\CertificationsController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CountriesStatesCitiesController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\StudyDegreeController;
use App\Http\Controllers\TestCompetitionsController;
use App\Http\Controllers\WorkPreferencesController;

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
Route::get('/user/micv', [HomeController::class, 'miCV'])->name('user.micv');

//State and Towns
Route::get('/list-states', [StateController::class, 'fetchStates'])->name('list-states');
Route::get('/list-towns/{id}', [StateController::class, 'fetchTowns'])->name('list-towns');
Route::get('/list-sectors', [SectorController::class, 'fetchSectors'])->name('list-sectors');
Route::get('/town/{id}', [StateController::class, 'fecthTown'])->name('town');
Route::get('/countries', [CountriesStatesCitiesController::class, 'fetchCountries'])->name('countries-list');
Route::get('/states/{id}', [CountriesStatesCitiesController::class, 'fetchStates'])->name('states-list');
Route::get('/cities/{id}', [CountriesStatesCitiesController::class, 'fetchCities'])->name('cities-list');
// Route::get('/city/{id}', [CountriesStatesCitiesController::class, 'searchCountry'])->name('search-location-info');



// ANUIES Areas, general and speecific areas.
Route::get('/anuies-areas', [AnuiesController::class, 'fetchAreas'])->name('anuies-areas');
Route::get('/anuies-generals/{id}', [AnuiesController::class, 'fetchGenerals'])->name('anuies-generals');
Route::get('/anuies-generals', [AnuiesController::class, 'fetchGeneralsAll'])->name('anuies-generals.all');
Route::get('/anuies-specifics/{id}', [AnuiesController::class, 'fetchSpecifics'])->name('anuies-specifics');
Route::get('/anuies-specifics', [AnuiesController::class, 'fetchSpecificsAll'])->name('anuies-specifics.all');

// Study Degree table routes CRUD
Route::get('/study-degree', [StudyDegreeController::class, 'index'])->name('list-degrees');
Route::get('/study-degree/{id}', [StudyDegreeController::class, 'show'])->name('study-degrees.show');
Route::post('/study-degree', [StudyDegreeController::class, 'store'])->name('study-degree.store');
Route::put('/study-degree/{id}', [StudyDegreeController::class, 'update'])->name('study-degree.update');
Route::delete('/study-degree/{id}', [StudyDegreeController::class, 'destroy'])->name('study-degree.delete');
Route::get('/cv-search/{id}', [StudyDegreeController::class, 'cvSearch'])->name('cv-search');

// Certifications table routes CRUD
Route::get('/certifications', [CertificationsController::class, 'index'])->name('list-certifications');
Route::get('/certifications/{id}', [CertificationsController::class, 'show'])->name('certifications.show');
Route::post('/certifications', [CertificationsController::class, 'store'])->name('certifications.store');
Route::post('/certifications/{id}', [CertificationsController::class, 'update'])->name('certifications.update');
Route::delete('/certifications/{id}', [CertificationsController::class, 'destroy'])->name('certifications.delete');

// Language table routes CRUD
Route::get('/language', [LanguageController::class, 'index'])->name('list-languages');
Route::get('/language/{id}', [LanguageController::class, 'show'])->name('languages.show');
Route::post('/language', [LanguageController::class, 'store'])->name('languages.store');
Route::post('/language/{id}', [LanguageController::class, 'update'])->name('languages.update');
Route::delete('/language/{id}', [LanguageController::class, 'destroy'])->name('languages.delete');

// Experience table routes CRUD
Route::get('/experience', [ExperienceController::class, 'index'])->name('list-experiences');
Route::get('/experience/{id}', [ExperienceController::class, 'show'])->name('experiences.show');
Route::post('/experience', [ExperienceController::class, 'store'])->name('experiences.store');
Route::post('/experience/{id}', [ExperienceController::class, 'update'])->name('experiences.update');
Route::delete('/experience/{id}', [ExperienceController::class, 'destroy'])->name('experiences.delete');

// Test Competitions CRUD
Route::get('/testcomp', [TestCompetitionsController::class, 'indexTest'])->name('list-TestsCompetitions');
Route::get('/testcompAsw', [TestCompetitionsController::class, 'indexAnswers'])->name('list-AnswerTestCompetition');
Route::get('/testcomp/{id}', [TestCompetitionsController::class, 'searchTest'])->name('testcompetitions.show');
Route::get('/testcompAws/{id}', [TestCompetitionsController::class, 'searchAnswers'])->name('AnswersRestCompetitions.show');
Route::post('/testcomp', [TestCompetitionsController::class, 'store'])->name('testcompetitions.store');
Route::post('/testcompAws', [TestCompetitionsController::class, 'storeAnswers'])->name('AnswersTestCompetitions.store');
Route::post('/testcomp/{id}', [TestCompetitionsController::class, 'updateTest'])->name('testcompetitions.update');
Route::post('/testcompAws/{id}', [TestCompetitionsController::class, 'updateAnswer'])->name('AnswersTestCompetitions.update');
// Route::post('/experience/{id}', [TestCompetitionsController::class, 'update'])->name('experiences.update');
// Route::delete('/experience/{id}', [TestCompetitionsController::class, 'destroy'])->name('experiences.delete');

//Company
Route::post('/company/create', [CompanyController::class, 'store'])->name('company.store');
Route::get('/company/dashboard', [CompanyController::class, 'index'])->name('company.index');

//User
// / Candidate Basic Info
Route::post('/user/create', [UserController::class, 'store'])->name('user.store');
// /Work Preferences
Route::get('/user/wp', [WorkPreferencesController::class, 'index'])->name('workPreferences.index');
// Route::post('/user/wp', [WorkPreferencesController::class, 'store'])->name('workPreferences.store');
Route::get('/user/wp/{id}', [WorkPreferencesController::class, 'search'])->name('workPreferences.search');
Route::post('/user/wp/{id}', [WorkPreferencesController::class, 'update'])->name('workPreferences.update');




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
    // Profile
    Route::get('/company/dashboard', [CompanyController::class, 'index'])->name('company.index');
    Route::get('/company/settings', [CompanyController::class, 'settings'])->name('company.settings');
    Route::put('/company/update/{company}', [CompanyController::class, 'update'])->name('company.update');

    // Offer
    Route::get('/company/offer', [OfferController::class, 'index'])->name('offer.index');
    Route::get('/company/newOffer', [OfferController::class, 'create'])->name('offer.create');
    Route::post('/company/newOffer/create', [OfferController::class, 'store'])->name('offer.store');
    Route::delete('/company/offer/delete/{offer}', [OfferController::class, 'destroy'])->name('offer.destroy');
    Route::get('/company/offer/edit/{id}', [OfferController::class, 'edit'])->name('offer.edit');
    Route::put('/company/offer/update/{offer}', [OfferController::class, 'update'])->name('offer.update');
    Route::put('/company/offer/changeStatus/{offer}', [OfferController::class, 'changeStatus'])->name('offer.changeStatus');

    Route::post('/company/buyPlan', [PlanController::class, 'store'])->name('plan.store');
});
