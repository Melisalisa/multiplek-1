<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::middleware(['auth'])->group(function () {
    // Laporan dan Pendapatan
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/laporan', [DashboardController::class, 'laporan'])->name('laporan');
    Route::get('/create-pendapatan',[DashboardController::class, 'createLaporan'])->name('create-pendapatan');
    Route::post('/store-pendapatan', [DashboardController::class, 'storeLaporan'])->name('store-pendapatan');
    Route::get('/kategori', function () {
        return view('dashboard.kategori');
    })->name('kategori');
});

// Penyetor
Route::middleware(['IsAdmin'])->group(function () {
    Route::get('/data', [DashboardController::class, 'searchPenyetor'])->name('search');
    Route::get('/data', [DashboardController::class, 'dataPenyetor'])->name('data');
    Route::get('/create-penyetor', function () {
        return view('dashboard.createPenyetor');
    })->name('create-penyetor');
    Route::post('/store-penyetor', [DashboardController::class, 'storePenyetor'])->name('store-penyetor');
    Route::delete('/delete-penyetor/{id}', [DashboardController::class, 'deletePenyetor'])->name('delete-penyetor');
    Route::get('edit-penyetor/{id}', [DashboardController::class, 'editPenyetor'])->name('edit-penyetor');
    Route::put('update-penyetor/{id}', [DashboardController::class, 'updatePenyetor'])->name('update-penyetor');

});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
