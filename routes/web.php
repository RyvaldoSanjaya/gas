<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\KembaliController;
use App\Http\Controllers\PinjamController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profil', function () {
    return view('profil');
});
//menu total Gas
Route::get('/alumni', [AlumniController::class, 'index'])->name('alumni');
Route::get('/alumni/create', [AlumniController::class, 'create'])->name('alumni.create');
Route::put('/alumni/store', [AlumniController::class, 'store'])->name('alumni.store');

Route::get('/alumni/edit/{id}', [AlumniController::class, 'edit'])->name('alumni.edit');
Route::put('/alumni/update/{id}', [AlumniController::class, 'update'])->name('alumni.update');

Route::get('/alumni/hapus/{id}', [AlumniController::class, 'destroy'])->name('alumni.hapus');
//menu kembalikan gas
Route::get('/kembali', [KembaliController::class, 'index'])->name('kembali');
Route::get('/kembali/create', [KembaliController::class, 'create'])->name('kembali.create');
Route::put('/kembali/store', [KembaliController::class, 'store'])->name('kembali.store');

Route::get('/kembali/edit/{id}', [KembaliController::class, 'edit'])->name('kembali.edit');
Route::put('/kembali/update/{id}', [KembaliController::class, 'update'])->name('kembali.update');

Route::get('/kembali/hapus/{id}', [KembaliController::class, 'destroy'])->name('kembali.hapus');
//menu pinjam gas
Route::get('/pinjam', [PinjamController::class, 'index'])->name('pinjam');
Route::get('/pinjam/create', [PinjamController::class, 'create'])->name('pinjam.create');
Route::put('/pinjam/store', [PinjamController::class, 'store'])->name('pinjam.store');

Route::get('/pinjam/edit/{id}', [PinjamController::class, 'edit'])->name('pinjam.edit');
Route::put('/pinjam/update/{id}', [PinjamController::class, 'update'])->name('pinjam.update');

Route::get('/pinjam/hapus/{id}', [PinjamController::class, 'destroy'])->name('pinjam.hapus');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
