<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::view('/player_register', 'auth.player_register')->name('player_register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/choose_register', [App\Http\Controllers\Auth\RegisterController::class, 'choose'])->name('choose');
Route::get('/player_register', [App\Http\Controllers\Auth\RegisterController::class, 'player'])->name('player');
