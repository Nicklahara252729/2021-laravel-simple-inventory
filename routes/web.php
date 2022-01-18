<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Barang\BarangController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\History\HistoryController;
use App\Http\Controllers\HistoryRestock\HistoryRestockController;
use App\Http\Controllers\GudangAtk\GudangAtkController;
use App\Http\Controllers\GudangKimia\GudangKimiaController;
use App\Http\Controllers\GudangDokumen\GudangDokumenController;

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
    Route::get('/view-dashboard/{jenis}', [DashboardController::class, 'viewData'])->name("dashboard.viewData");

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
    Route::post('/save-take-out-barang', [BarangController::class,'saveTakeOutData'])->name("barang.saveTakeOutData");
    Route::post('/save-restock-barang', [BarangController::class,'saveRestock'])->name("barang.saveRestock");

    /**
     * gudang ATK
     */
    Route::get('/gudang-atk', [GudangAtkController::class, 'index'])->name("gudangAtk");
    Route::get('/view-gudang-atk', [GudangAtkController::class, 'viewData'])->name("gudangAtk.viewData");
    Route::get('/get-gudang-atk/{id}', [GudangAtkController::class,'getData'])->name("gudangAtk.getData");
    Route::get('/delete-gudang-atk', [GudangAtkController::class,'deleteData'])->name("gudangAtk.deleteData");
    Route::post('/save-gudang-atk', [GudangAtkController::class,'saveData'])->name("gudangAtk.saveData");
    Route::post('/save-take-out-gudang-atk', [GudangAtkController::class,'saveTakeOutData'])->name("gudangAtk.saveTakeOutData");
    Route::post('/save-restock-gudang-atk', [GudangAtkController::class,'saveRestock'])->name("gudangAtk.saveRestock");

    /**
     * gudang kimia
     */
    Route::get('/gudang-kimia', [GudangKimiaController::class, 'index'])->name("gudangKimia");
    Route::get('/view-gudang-kimia', [GudangKimiaController::class, 'viewData'])->name("gudangKimia.viewData");
    Route::get('/get-gudang-atk/{id}', [GudangKimiaController::class,'getData'])->name("gudangKimia.getData");
    Route::get('/delete-gudang-kimia', [GudangKimiaController::class,'deleteData'])->name("gudangKimia.deleteData");
    Route::post('/save-gudang-kimia', [GudangKimiaController::class,'saveData'])->name("gudangKimia.saveData");
    Route::post('/save-take-out-gudang-kimia', [GudangKimiaController::class,'saveTakeOutData'])->name("gudangKimia.saveTakeOutData");
    Route::post('/save-restock-gudang-kimia', [GudangKimiaController::class,'saveRestock'])->name("gudangKimia.saveRestock");

    /**
     * gudang Dokumentasi
     */
    Route::get('/gudang-dokumen', [GudangDokumenController::class, 'index'])->name("gudangDokumen");
    Route::get('/view-gudang-dokumen', [GudangDokumenController::class, 'viewData'])->name("gudangDokumen.viewData");
    Route::get('/get-gudang-dokumen/{id}', [GudangDokumenController::class,'getData'])->name("gudangDokumen.getData");
    Route::get('/delete-gudang-dokumen', [GudangDokumenController::class,'deleteData'])->name("gudangDokumen.deleteData");
    Route::post('/save-gudang-dokumen', [GudangDokumenController::class,'saveData'])->name("gudangDokumen.saveData");
    Route::post('/save-take-out-gudang-dokumen', [GudangDokumenController::class,'saveTakeOutData'])->name("gudangDokumen.saveTakeOutData");
    Route::post('/save-restock-gudang-dokumen', [GudangDokumenController::class,'saveRestock'])->name("gudangDokumen.saveRestock");

    /**
     * history
     */
    Route::get('/history-restock', [HistoryRestockController::class, 'index'])->name("historyRestock");
    Route::get('/view-history-restock', [HistoryRestockController::class, 'viewData'])->name("historyRestock.viewData");
    Route::get('/get-history-restock/{id}', [HistoryRestockController::class,'getData'])->name("historyRestock.getData");
    Route::post('/save-history-restock', [HistoryRestockController::class,'saveData'])->name("historyRestock.saveData");

    /**
     * history
     */
    Route::get('/history', [HistoryController::class, 'index'])->name("history");
    Route::get('/view-history', [HistoryController::class, 'viewData'])->name("history.viewData");
    Route::get('/get-history/{id}', [HistoryController::class,'getData'])->name("history.getData");
    Route::post('/save-history', [HistoryController::class,'saveData'])->name("history.saveData");
});

