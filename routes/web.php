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
        Route::get('upload', 'postUpload')->name('post.upload');
    });

// 選手(ログアウト) - 認証済み                                                                                             
Route::controller(App\Http\Controllers\Auth\LoginController::class)
    ->name('login.')
    ->prefix('login')
    ->middleware(App\Http\Middleware\CheckPlayerLogin::class)
    ->group(function () {
        Route::post('logout', 'logout')->name('post.logout');
    });
























// // Authディレクトリに含まれるルーティング設定
// Auth::routes();
// Route::get('/choose-register', [App\Http\Controllers\Auth\RegisterController::class, 'choose'])->name('choose_register');
// Route::get('/completion-register', [App\Http\Controllers\Auth\RegisterController::class, 'completion'])->name('completion_register');
// Route::get('/completion-logout', [LoginController::class, 'completion_logout'])->name('completion_logout');
// Route::get('/completion-success', [App\Http\Controllers\PlayerController::class, 'success'])->name('completion_success');
// Route::get('/completion-update', [App\Http\Controllers\PlayerController::class, 'updateSuccess'])->name('completion_update');
// Route::get('/completion-details', [App\Http\Controllers\TeamDetailsController::class, 'detailsSuccess'])->name('completion_details');
// Route::get('/player/register', [App\Http\Controllers\Auth\RegisterController::class, 'getSportsName'])->name('player_register');
// Route::get('/team/register', [App\Http\Controllers\Auth\TeamRegisterController::class, 'getSportsName'])->name('scout_register');
// Route::get('/player/info', [App\Http\Controllers\PlayerController::class, 'player_register_info'])->name('player_register_info');
// Route::get('/player/video', [App\Http\Controllers\PlayerController::class, 'player_video_post'])->name('player_video');
// Route::get('/player/team-notice', [App\Http\Controllers\PlayerController::class, 'player_teamNotice'])->name('player_teamNotice');
// Route::get('/team/info', [App\Http\Controllers\teamController::class, 'team_register_info'])->name('team_register_info');
// Route::get('/player/video-history', [App\Http\Controllers\playerController::class, 'player_video_history'])->name('player_video_history');
// Route::get('/player/info-edit/{id}', [App\Http\Controllers\playerController::class, 'playerEdit'])->name('player_edit');
// Route::get('/team/players-list', [App\Http\Controllers\TeamController::class, 'players_list'])->name('players_list');
// Route::get('/team/url-point-list/{id}', [App\Http\Controllers\TeamController::class, 'url_point_list'])->name('url_point_list');
// Route::get('/team/team-details', [App\Http\Controllers\TeamDetailsController::class, 'teamDetails'])->name('team_details');
// Route::get('/team/team-details-edit', [App\Http\Controllers\TeamDetailsController::class, 'teamDetailsEdit'])->name('team_detailsEdit');
// Route::get('team/teamId', [TeamDetailsController::class, 'getTeams'])->name('getTeams');

// // postリクエスト
// Route::post('player/register', [RegisterController::class, 'store'])->name('register.store');
// Route::post('/player/video', [PlayerController::class, 'store'])->name('player.store');
// Route::post('/player/info-update/{id}', [PlayerController::class, 'playerUpdate'])->name('player_update');
// Route::post('team/register', [TeamRegisterController::class, 'store'])->name('teamregister.store');
// /*
//     「50-部活動情報を掲載」の実装で、postしてもリダイレクトされる件
//     同じルート(/team)の場合。固定ルートを先に定義し、パラメータルートを後に定義
//     参考:「Laravel ルート定義 順序」で検索。
// */
// Route::post('/team/introduction', [TeamDetailsController::class, 'store'])->name('teamDetails.store');
// Route::post('/team/team-details-update', [TeamDetailsController::class, 'teamDetailsUpdate'])->name('teamDetailsUpdate');
// Route::post('/team/{player_id}', [TeamController::class, 'store'])->name('team.store');
