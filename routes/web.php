<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\TeamRegisterController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TeamController;



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
    return view('welcome');
});

// Authディレクトリに含まれるルーティング設定
Auth::routes();
Route::get('/choose-register', [App\Http\Controllers\Auth\RegisterController::class, 'choose'])->name('choose_register');
Route::get('/completion-register', [App\Http\Controllers\Auth\RegisterController::class, 'completion'])->name('completion_register');
Route::get('/completion-logout', [LoginController::class, 'completion_logout'])->name('completion_logout');
Route::get('/completion-success', [App\Http\Controllers\PlayerController::class, 'success'])->name('completion_success');
Route::get('/player/register', [App\Http\Controllers\Auth\RegisterController::class, 'getSportsName'])->name('player_register');
Route::get('/team/register', [App\Http\Controllers\Auth\TeamRegisterController::class, 'getSportsName'])->name('scout_register');
Route::get('/player/info', [App\Http\Controllers\PlayerController::class, 'player_register_info'])->name('player_register_info');
Route::get('/player/video', [App\Http\Controllers\PlayerController::class, 'player_video_post'])->name('player_video');
Route::get('/team/info', [App\Http\Controllers\teamController::class, 'team_register_info'])->name('team_register_info');
Route::get('/player/video-history', [App\Http\Controllers\playerController::class, 'player_video_history'])->name('player_video_history');
Route::get('/team/players-list', [App\Http\Controllers\TeamController::class, 'players_list'])->name('players_list');
Route::get('/team/url-point-list/{id}', [App\Http\Controllers\TeamController::class, 'url_point_list'])->name('url_point_list');
Route::post('player/register', [RegisterController::class, 'store'])->name('register.store');
Route::post('team/register', [TeamRegisterController::class, 'store'])->name('teamregister.store');
Route::post('/player/video', [PlayerController::class, 'store'])->name('player.store');
Route::post('/team/{player_id}', [TeamController::class, 'store'])->name('team.store');
