<?php
use App\Http\Controllers\Auth\SteamLoginController;
use App\Http\Livewire\Index;
use App\Http\Livewire\Rules;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// // Static routes
// Route::get('/',  Index::class )->name('index');
// Route::get('/rules', Rules::class)->name('rules');
// Auth
// Route::get('auth/steam', [SteamLoginController::class, 'redirectToSteam'])->name('login');
// Route::get('auth/steam/handle', [SteamLoginController::class, 'handle'])->name('auth.steam.handle');
// Route::get('logout', function() {
//     \Auth::logout();
//     return redirect()->route('index');
// })->middleware('auth')->name('logout');
