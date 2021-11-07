<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Dashboard\DashboardController;

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

Route::get('/', [LoginController::class, 'index']);

Route::middleware(['web'])->group(function () {
    /**
     * auth
     */
    Route::get('/reset-password', [ResetPasswordController::class, 'index']);
    Route::post('/proses-login', [LoginController::class,'prosesLogin'])->name('prosesLogin');
    Route::post('/logout', [LogoutController::class, 'prosesLogout'])->name('prosesLogout');

    /**
     * dashboard
     */
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

