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
use App\Http\Controllers\KillerQuestionController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\CvPositionController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\StudyDegreeController;
use App\Http\Controllers\TestCompetitionsController;
use App\Http\Controllers\TestSoftSkillsController;
use App\Http\Controllers\UserSkillController;
use App\Http\Controllers\VacanciesController;
use App\Http\Controllers\WorkPreferencesController;

// Chat
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;

// Example Broadcasting Laravel Event on a public channel
use App\Events\Hello;
use App\Events\PrivateTest;

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
Route::get('/study-degree/schools', [StudyDegreeController::class, 'getSchools'])->name('list-degrees-schools');
Route::get('/study-degree/{id}', [StudyDegreeController::class, 'show'])->name('study-degrees.show');
Route::post('/study-degree', [StudyDegreeController::class, 'store'])->name('study-degree.store');
Route::put('/study-degree/{id}', [StudyDegreeController::class, 'update'])->name('study-degree.update');
Route::delete('/study-degree/{id}', [StudyDegreeController::class, 'destroy'])->name('study-degree.delete');
Route::get('/cv-search/{id}', [StudyDegreeController::class, 'cvSearch'])->name('cv-search');

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

// Test Soft Skills CRUD Alternative Routes
Route::get('testsoftskills', [TestSoftSkillsController::class, 'indexTest'])->name('list-answers-test-softskills');
Route::get('testsoftskills/{id}', [TestSoftSkillsController::class, 'showTest'])->name('testsoftskills.show');
Route::post('testsoftskills', [TestSoftSkillsController::class, 'storeTest'])->name('testsoftskills.store');
Route::put('testsoftskills/{id}', [TestSoftSkillsController::class, 'update'])->name('testsoftskills.update');

//Company
Route::post('/company/create', [CompanyController::class, 'store'])->name('company.store');
//Route::get('/company/dashboard', [CompanyController::class, 'index'])->name('company.index');

//User
// / Candidate Basic Info
Route::post('/user/create', [UserController::class, 'store'])->name('user.store');
// /Work Preferences
Route::get('/user/wp', [WorkPreferencesController::class, 'index'])->name('workPreferences.index');
// Route::post('/user/wp', [WorkPreferencesController::class, 'store'])->name('workPreferences.store');
Route::get('/user/wp/{id}', [WorkPreferencesController::class, 'search'])->name('workPreferences.search');
Route::post('/user/wp/{id}', [WorkPreferencesController::class, 'update'])->name('workPreferences.update');
Route::put('/user/position/{id}', [CvPositionController::class, 'update'])->name('user.position.update');
Route::get('/user/position/{id}', [CvPositionController::class, 'index'])->name('user.position.index');
Route::get('/userSkill/{id}', [UserSkillController::class, 'index'])->name('user.skills.index');
Route::get('/progress/{id}', [ProgressController::class, 'index'])->name('progress.index');
Route::get('/vacancies/{id}', [VacanciesController::class, 'index'])->name('vacancies.index');
Route::get('/vacancies/detail/{id}', [VacanciesController::class, 'view'])->name('vacancies.detail');
Route::get('/vacants', [VacanciesController::class, 'appliedVacants'])->name('vacants.applied');
Route::get('/vacants/check', [VacanciesController::class, 'checkApplied'])->name('vacants.checkApplied');
Route::post('/vacants/apply', [VacanciesController::class, 'apply'])->name('vacants.apply');
Route::delete('/vacants/delete', [VacanciesController::class, 'destroy'])->name('vacants.cancel');

// / Candidate Basic Info
Route::get('/user/create', [UserController::class, 'sendEmail'])->name('user.sendEmail');


Route::apiResources([
    "experience" => ExperienceController::class,
    "language" => LanguageController::class,
    "certifications" => CertificationsController::class,
    "testsoftskillsAsw" => TestSoftSkillsController::class,
    "userSkill" => UserSkillController::class
]);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/micv', function () {
        return Inertia::render('User/MiCV');
    })->name('user.micv');

    Route::get('/vacancies', function () {
        return Inertia::render('User/Vacant');
    })->name('user.vacancies');

    Route::get('/vacantdetail', function () {
        return Inertia::render('User/VacanciesDetail');
    })->name('user.vacanciesdetail');

    Route::get('/vacantdetail', function () {
        return Inertia::render('User/Vacancies/AppliedVacants');
    })->name('user.appliedvacants');

    Route::get('/messages', function () {
        return Inertia::render('User/Messages');
    })->name('user.messages');

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/userprofile', function () {
        return Inertia::render('User/UserProfile');
    })->name('user.userprofile');

    // Profile
    Route::patch('/user/{user}', [UserController::class, 'update'])->name('user.updateData');
    Route::patch('/user/resetPassword/{user}', [UserController::class, 'updatePassword'])->name('user.updatePassword');
    Route::put('/user/photo/{user}', [UserController::class, 'updatePhoto'])->name('user.updatePhoto');
    Route::delete('/user/delete/{user}', [UserController::class, 'destroy'])->name('user.deleteUser');
});



Route::middleware(['auth:company', 'verified'])->group(function () {

    // Profile
    Route::get('/company/dashboard', [CompanyController::class, 'index'])->name('company.index');
    Route::get('/company/settings', [CompanyController::class, 'settings'])->name('company.settings');
    Route::put('/company/update/{company}', [CompanyController::class, 'update'])->name('company.update');

    // Offer
    Route::get('/company/offer', [OfferController::class, 'index'])->name('offer.index');
    Route::get('/company/getOffer', [OfferController::class, 'getOffer'])->name('offer.getOffer');
    Route::get('/company/newOffer', [OfferController::class, 'create'])->name('offer.create');
    Route::post('/company/newOffer/create', [OfferController::class, 'store'])->name('offer.store');
    Route::delete('/company/offer/delete/{offer}', [OfferController::class, 'destroy'])->name('offer.destroy');
    Route::get('/company/offer/edit/{id}', [OfferController::class, 'edit'])->name('offer.edit');
    Route::put('/company/offer/update/{offer}', [OfferController::class, 'update'])->name('offer.update');
    Route::put('/company/offer/changeStatus/{offer}', [OfferController::class, 'changeStatus'])->name('offer.changeStatus');

    //Plans and Package
    Route::post('/company/buyPlan', [PlanController::class, 'store'])->name('plan.store');
    Route::delete('/company/plan/delete/{id}', [PlanController::class, 'destroy'])->name('plan.destroy');

    //KillerQuestions
    Route::delete('/company/question/delete/{killer}', [KillerQuestionController::class, 'destroy'])->name('question.destroy');
    Route::put('/company/question/update/{killer}', [KillerQuestionController::class, 'update'])->name('question.update');

    //CV - Applicant
    Route::get('/company/cv/{id}', [CompanyController::class, 'cv'])->name('company.cv');
    Route::get('/company/downloadCV/{id}', [CompanyController::class, 'downloadCVPDF'])->name('company.downloadCVPDF');

    // Chat
    Route::get('/company/chat/from/{company}/{user}', [ChatController::class, 'chat_from_company_to_user'])->name('chat.from.company.to.user');
});

// Ejemplo Chat

// RUTAS DE CHAT

// index
Route::get('/chat', function () {
    return Inertia::render('Chat/ejemploChat');
})->name('chat.index');

// with
// Route::get('/chat/with/{user}', [ChatController::class, 'chat_with'])->name('chat.with');

// Show
Route::get('/chat/{chat}', [ChatController::class, 'show'])->name('chat.show');

// RUTAS DE MESSAGE

// Sent
Route::post('/message/sent', [MessageController::class, 'sent'])->name('message.sent');


// Example Broadcasting Laravel Event on a public channel
Route::get('/broadcast', function () {

    Hello::dispatch();
    return "Event has been sent!";
});

Route::get('/broadcastPrivate', function () {
    $user = App\Models\User::find(14);
    PrivateTest::dispatch($user);
    return "Event has been sent!" . $user;
});
