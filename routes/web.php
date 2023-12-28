<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\TeamRegisterController;
use App\Http\Controllers\PlayerController;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/choose-register', [App\Http\Controllers\Auth\RegisterController::class, 'choose'])->name('choose_register');
Route::get('/completion-register', [App\Http\Controllers\Auth\RegisterController::class, 'completion'])->name('completion_register');
Route::get('/completion-success', [App\Http\Controllers\PlayerController::class, 'success'])->name('completion_success');
Route::get('/player/register', [App\Http\Controllers\Auth\RegisterController::class, 'getSportsName'])->name('player_register');
Route::get('/team/register', [App\Http\Controllers\Auth\TeamRegisterController::class, 'getSportsName'])->name('scout_register');
Route::get('/player/info', [App\Http\Controllers\PlayerController::class, 'player_register_info'])->name('player_register_info');
Route::get('/player/video', [App\Http\Controllers\PlayerController::class, 'player_video_post'])->name('player_video');
Route::get('/player/video-history', [App\Http\Controllers\PlayerController::class, 'player_video_history'])->name('player_video_history');
Route::post('player/register', [RegisterController::class, 'store'])->name('register.store');
Route::post('team/register', [TeamRegisterController::class, 'store'])->name('team.store');
Route::post('/player/video', [PlayerController::class, 'store'])->name('player.store');
