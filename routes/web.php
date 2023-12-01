<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;

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
Route::get('/choose_register', [App\Http\Controllers\Auth\RegisterController::class, 'choose'])->name('choose_register');
Route::get('/scout_register', [App\Http\Controllers\Auth\RegisterController::class, 'scout'])->name('scout_register');
Route::get('/completion_register', [App\Http\Controllers\Auth\RegisterController::class, 'completion'])->name('completion_register');
Route::get('/player_register', [App\Http\Controllers\Auth\RegisterController::class, 'getSportsName'])->name('player_register');
Route::get('/player_info', [App\Http\Controllers\PlayerController::class, 'player_register_info'])->name('player_register_info');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::post('/formValidation', [App\Http\Controllers\Auth\RegisterController::class])->name('formValidation');