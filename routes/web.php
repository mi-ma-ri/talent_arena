<?php

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

// トップページ
Route::controller(App\Http\Controllers\IndexController::class)
    ->name('index.')
    ->prefix('/')
    ->group(function () {
        Route::get('', 'getIndex')->name('top.index');
    });

// 選手(新規登録フロー)
Route::controller(App\Http\Controllers\PlayerController::class)
    ->name('player.')
    ->prefix('player')
    ->middleware(App\Http\Middleware\CheckNonMember::class)
    ->group(function () {
        Route::get('temporary', 'getTemporary')->name('get.temporary');
        Route::post('email_auth', 'postEmailAuth')->name('post.email_auth');
        Route::get('auth', 'getAuth')->name('get.auth');
        Route::get('email_auth_send', 'getEmailAuthSend')->name('get.email_auth_send');
        Route::get('email_duplicate', 'getEmailDuplicate')->name('get.email_duplicate');
        Route::get('confirm', 'postConfirm')->name('get.confirm');
        Route::post('confirm', 'postConfirm')->name('post.confirm');
        Route::post('join', 'postJoin')->name('post.join');
    });

// 選手(ログインフロー)
Route::controller(App\Http\Controllers\Auth\LoginController::class)
    ->name('login.')
    ->prefix('login')

    ->group(function () {
        Route::get('attempt', 'getPlayerAttempt')->name('get.attempt');
        Route::post('login', 'postPlayerLogin')->name('post.login');
    });

// 選手(ログイン済み)
Route::controller(App\Http\Controllers\PlayerController::class)
    ->name('player.')
    ->prefix('player')
    ->middleware(App\Http\Middleware\CheckPlayerLogin::class)
    ->group(function () {
        Route::get('info', 'getInfo')->name('get.info');
        Route::get('profile', 'getProfile')->name('get.profile');
        Route::get('profile_edit', 'getProfileEdit')->name('get.profile_edit');
        Route::post('profile_update', 'postProfileUpdate')->name('post.profile_update');
        Route::get('upload', 'postUrl')->name('post.url');
        Route::post('handle', 'postHandleUrl')->name('post.handle');
    });

// 選手(ログアウト) - 認証済み                                                                                             
Route::controller(App\Http\Controllers\Auth\LoginController::class)
    ->name('login.')
    ->prefix('login')
    ->middleware(App\Http\Middleware\CheckPlayerLogin::class)
    ->group(function () {
        Route::post('logout', 'logout')->name('post.logout');
    });


// 選手(新規登録フロー)
Route::controller(App\Http\Controllers\TeamController::class)
    ->name('team.')
    ->prefix('team')
    ->middleware(App\Http\Middleware\CheckNonMember::class)
    ->group(function () {
        Route::get('temporary', 'getTemporary')->name('get.temporary');
        Route::post('email_auth', 'postEmailAuth')->name('post.email_auth');
        Route::get('email_auth_send', 'getEmailAuthSend')->name('get.email_auth_send');
        Route::get('auth', 'getAuth')->name('get.auth');
        Route::get('email_duplicate', 'getEmailDuplicate')->name('get.email_duplicate');
        Route::post('confirm', 'postConfirm')->name('post.confirm');
        Route::post('join', 'postJoin')->name('post.join');
    });
