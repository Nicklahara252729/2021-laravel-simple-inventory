<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Barang\BarangController;

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

    /**
     * barang
     */
    Route::get('/barang', [BarangController::class, 'index'])->name("barang");
    Route::get('/view-barang', [BarangController::class, 'viewData'])->name("barang.viewData");
    Route::get('/get-barang/{id}', [BarangController::class,'getData'])->name("barang.getData");
    Route::get('/delete-barang', [BarangController::class,'deleteData'])->name("barang.deleteData");
    Route::post('/save-barang', [BarangController::class,'saveData'])->name("barang.saveData");
});

