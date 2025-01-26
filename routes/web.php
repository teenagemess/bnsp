<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\auth\AuthenticatedSessionController;
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

Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/registrasi', RegistrasiController::class);
    Route::get('/registrasi/cetak/{id}', [RegistrasiController::class, 'cetak'])->name('registrasi.cetak');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard'); // Ganti dengan tampilan dashboard admin
    })->name('admin.dashboard');

    Route::resource('/buku', BukuController::class);
    Route::resource('/penulis', PenulisController::class);
});

require __DIR__.'/auth.php';
