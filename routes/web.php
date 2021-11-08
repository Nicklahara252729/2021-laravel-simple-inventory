<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Barang\BarangController;
use App\Http\Controllers\User\UserController;

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

    /**
     * user
     */
    Route::get('/user', [UserController::class, 'index'])->name("user");
    Route::get('/view-user', [UserController::class, 'viewData'])->name("user.viewData");
    Route::get('/get-user/{id}', [UserController::class,'getData'])->name("user.getData");
    Route::get('/delete-user', [UserController::class,'deleteData'])->name("user.deleteData");
    Route::post('/save-user', [UserController::class,'saveData'])->name("user.saveData");

    /**
     * barang
     */
    Route::get('/barang', [BarangController::class, 'index'])->name("barang");
    Route::get('/view-barang', [BarangController::class, 'viewData'])->name("barang.viewData");
    Route::get('/get-barang/{id}', [BarangController::class,'getData'])->name("barang.getData");
    Route::get('/delete-barang', [BarangController::class,'deleteData'])->name("barang.deleteData");
    Route::post('/save-barang', [BarangController::class,'saveData'])->name("barang.saveData");
});

