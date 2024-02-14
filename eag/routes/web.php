<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siteController;
use App\Http\Controllers\cashoutController;
use App\Http\Middleware\CheckUserRole;

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

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'welcome']);

Auth::routes();

Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('home');

Auth::routes();

Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('home');

// Routes that require role-based access restriction

Route::group(['middleware' => CheckUserRole::class . ':1'], function () {
    /*
|--------------------------------------------------------------------------
| CASHOUT POST
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
    Route::GET('/cashout-create', [cashoutController::class, 'create']);
    Route::POST('/cashout-create', [cashoutController::class, 'store']);
    Route::GET('/cashout-index', [cashoutController::class, 'index']);
    Route::delete('cashout-delete/{id}', [cashoutController::class, 'destroy']);

    /*
|--------------------------------------------------------------------------
| SITES
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    Route::GET('/create-sites', [siteController::class, 'create']);
    Route::POST('/create-sites', [siteController::class, 'store']);
    Route::GET('/list-sites', [siteController::class, 'index']);
    Route::GET('/edit-site/{site}', [siteController::class, 'edit']);
    Route::POST('/edit-site-update/{site}', [siteController::class, 'update']);
    Route::POST('/destroy/{site}', [siteController::class, 'destroy']);
});
