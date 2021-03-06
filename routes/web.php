<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsController;


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


Route::group([
    'middleware' => 'auth'
], function () {
    Route::get('/', [TeamController::class, 'index'])->name('index.teams');
    Route::get('/teams/{team}', [TeamController::class, 'show'])->name('show.teams');

    Route::get('/news', [NewsController::class, 'index']);
    Route::get('/news/{n}', [NewsController::class, 'show'])->name('show.news');
    
    Route::get('/forbidden', [CommentController::class, 'show']);
    Route::post('/teams/{team}/comments', [CommentController::class, 'store'])->name('post.comment');
    
    Route::get('/players/{player}', [PlayerController::class, 'show'])->name('show.players');
    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::get('/email/verify', [AuthController::class, 'getEmailVerificationNotice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->middleware(['signed'])->name('verification.verify');
});


Route::group([
    'middleware' => 'guest'
], function () {
    Route::get('/register', [AuthController::class, 'getRegisterForm']);
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::get('/login', [AuthController::class, 'getLoginForm']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    
});
