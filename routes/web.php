<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PeminjamanController;
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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/listbuku', [WelcomeController::class, 'bukufrontend'])->name('buku-frontend');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/registrasi/cetak/{id}', [RegistrasiController::class, 'cetak'])->name('registrasi.cetak');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::post('/pinjam/{id}', [WelcomeController::class, 'pinjamBuku'])->name('pinjam.buku');
    Route::get('/buku-dipinjam', [PeminjamanController::class, 'index'])->name('buku.dipinjam');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard'); // Ganti dengan tampilan dashboard admin
    })->name('admin.dashboard');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::resource('/registrasi', RegistrasiController::class);
    Route::resource('/buku', BukuController::class);
    Route::resource('/penulis', PenulisController::class);



    Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
});

require __DIR__.'/auth.php';
