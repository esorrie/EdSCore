<?php

use App\Http\Controllers\LeagueController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::prefix('/players')->name('players.')->group(function() {
    Route::get('/', [PlayerController::class, 'index'])->name('index');
    Route::get('/{id}/{slug}', [PlayerController::class, 'view'])->name('view');
});

Route::prefix('/managers')->name('managers.')->group(function() {
    Route::get('/', [ManagerController::class, 'index'])->name('index');
    Route::get('/{id}/{slug}', [ManagerController::class, 'view'])->name('view');
});

Route::prefix('/teams')->name('teams.')->group(function() {
    Route::get('/', [TeamController::class, 'index'])->name('index');
    Route::get('/{id}/{slug}', [TeamController::class, 'view'])->name('view');
    Route::get('/{id}/{slug}/matches', [TeamController::class, 'matches'])->name('matches');
    Route::get('/{id}/{slug}/players', [TeamController::class, 'players'])->name('players');
});

Route::prefix('/leagues')->name('leagues.')->group(function() {
    Route::get('/', [LeagueController::class, 'index'])->name('index');
    Route::get('/{id}/{slug}', [LeagueController::class, 'view'])->name('view');
    Route::get('/{id}/{slug}/standings', [LeagueController::class, 'standings'])->name('standings');
    Route::get('/{id}/{slug}/fixtures', [LeagueController::class, 'fixtures'])->name('fixtures');
    Route::get('/{id}/{slug}/teams', [LeagueController::class, 'teams'])->name('teams');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});