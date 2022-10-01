<?php

use App\Http\Controllers\Auth\SteamLoginController;
use App\Http\Controllers\Bank\BankController;
use App\Http\Controllers\Bank\BankLentController;
use App\Http\Controllers\Dashboard\BillingController;
use App\Http\Controllers\Dashboard\ConnectedPlayerController;
use App\Http\Controllers\Dashboard\EntrepriseController;
use App\Http\Controllers\Dashboard\IndexController as DashboardIndexController;
use App\Http\Controllers\Dashboard\JobController as DashboardJobController;
use App\Http\Controllers\Dashboard\LicenseController;
use App\Http\Controllers\Dashboard\OrganisationController;
use App\Http\Controllers\Dashboard\PlayerController;
use App\Http\Controllers\Dashboard\SecondJobController;
use App\Http\Controllers\Dashboard\SearchController;
use App\Http\Controllers\Dashboard\VehiculeController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Index;
use App\Http\Livewire\Rules;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\OrgController;

// Static routes
Route::get('/',  Index::class )->name('index');
Route::get('/rules', Rules::class)->name('rules');

// Auth
Route::get('auth/steam', [SteamLoginController::class, 'redirectToSteam'])->name('login');
Route::get('auth/steam/handle', [SteamLoginController::class, 'handle'])->name('auth.steam.handle');
Route::get('logout', function() {
    \Auth::logout();
    return redirect()->route('index');
})->middleware('auth')->name('logout');



// Profile
Route::middleware('auth')->prefix('profile')->group(function() {
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::middleware('auth')->name('bank-')->group(function() {
});
    // Entreprise
    Route::middleware(['player', 'boss'])->prefix('entreprise')->name('entreprise-')->group(function() {
        Route::get('', [ProfileController::class, 'entreprise'])->name('index');
        Route::post('promote', [JobController::class,'promote'])->name('promote');
        Route::post('retire', [JobController::class,'retire'])->name('retire');
        Route::post('post', [JobController::class,'post'])->name('post');
        Route::post('vehicle', [JobController::class,'vehicle'])->name('vehicle');
        Route::post('reattribution', [JobController::class,'allReattribute'])->name('reattribution');
    });   // org
    Route::middleware(['player', 'org'])->prefix('organisation')->name('org-')->group(function() {
        Route::get('', [ProfileController::class, 'org'])->name('index');
        Route::post('promote', [OrgController::class,'promote'])->name('promote');
        Route::post('retire',[ OrgController::class,'retire'])->name('retire');
        Route::post('post', [OrgController::class,'post'])->name('post');
        Route::post('vehicle', [OrgController::class,'vehicle'])->name('vehicle');
        Route::post('reattribution', [OrgController::class,'allReattribute'])->name('reattribution');
    });

});
// Forms
Route::view('formulaires', 'forms')->middleware('auth')->name('forms');

Route::name('formbuilder::')->prefix('form/')->group(function () {
    Route::get('{identifier}', [\restray\FormBuilder\Controllers\RenderFormController::class , 'render'])->name('form.render');
    Route::post('{identifier}', [\restray\FormBuilder\Controllers\RenderFormController::class, 'submit'])->name('form.submit');
    Route::redirect('{identifier}/feedback', '/')->name('form.feedback');
});

Route::middleware(['auth', 'dashboard'])->prefix('dashboard')->name('dashboard-')->group(function() {
    Route::middleware('staff')->group(function () {
        Route::resource('billing', BillingController::class);
        Route::get('/accueil',[DashboardIndexController::class, 'index'])->name('index');
        Route::get('player/weapons',[PlayerController::class, 'getWeapons'])->name('player.weapons');
        Route::resource('player', PlayerController::class);
        Route::get('player/{vehicule}', [ PlayerController::class, 'delvehicule'])->name('player.delvehicule');
        Route::POST('player/additem', [ PlayerController::class, 'additem'])->name('player.additem');
        Route::POST('player/jobedit', [ PlayerController::class, 'jobedit'])->name('player.jobedit');
        Route::POST('player/orgedit', [ PlayerController::class, 'orgedit'])->name('player.orgedit');
        // Route::POST('player/addjob', [ PlayerController::class, 'addjob'])->name('player.addjob');
        // Route::POST('player/editsecjob', [ PlayerController::class, 'editsecjob'])->name('player.editsecjob');
        Route::get('player/{player}/billings', [PlayerController::class, 'showBillings'])->name('player.show-billings');
        // Route::resource('doublejob', SecondJobController::class);
        Route::resource('license', LicenseController::class);
        Route::resource('vehicule', VehiculeController::class);
        Route::get('vehicules/search', [VehiculeController::class, 'search'])->name('live_search_veh');
        Route::get('entreprises', [EntrepriseController::class, 'index'])->name('entreprise.show');
        Route::resource('organisation', OrganisationController::class);
        Route::resource('job', DashboardJobController::class);
        Route::get('jobs/search', [DashboardJobController::class, 'search'])->name('live_search');
        Route::get('recherche', [PlayerController::class, 'search'])->name('recherche');
        Route::get('connected', [ConnectedPlayerController::class, 'index'])->name('connected_player');
        Route::post('connected/kick', [ConnectedPlayerController::class, 'kick'])->name('connected_player.kick');
        Route::post('connected/ban', [ConnectedPlayerController::class, 'ban'])->name('connected_player.ban');

    });

    Route::name('formbuilder::forms.')->group(function () {
        Route::resource('forms', \restray\FormBuilder\Controllers\FormController::class)->only(['create', 'store', 'edit', 'update', 'destroy'])->middleware('superadmin');
        Route::resource('forms', \restray\FormBuilder\Controllers\FormController::class)->only(['index', 'show']);
        Route::resource('/forms/{fid}/submissions', \restray\FormBuilder\Controllers\SubmissionController::class);
    });

});
