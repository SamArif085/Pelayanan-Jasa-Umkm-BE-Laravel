<?php

use App\Http\Controllers\web\LoginWebController;
use App\Http\Controllers\web\LandingPageController;
use App\Http\Controllers\web\DashboardController;
use App\Http\Controllers\web\LayananWebController;
use App\Http\Controllers\web\MasterUserWebController;
use App\Http\Controllers\web\PesananWebController;
use App\Http\Controllers\web\RiwayatWebController;
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
// HALAMAN LANDING PAGE
Route::get('/', [LandingPageController::class, 'Home'])->name('/')->middleware('guest');

// HALAMN LOGIN
Route::get('/login', [LoginWebController::class, 'index'])->name('web-login');
Route::post('/login-cek', [LoginWebController::class, 'cekLogin'])->name('login-cek');
Route::post('/logout', [LoginWebController::class, 'logout'])->name('logout');
Route::get('/registrasi-web', [LoginWebController::class, 'registrasiWeb'])->name('registrasi-web');
Route::post('/registrasi-submit', [LoginWebController::class, 'registrasiUser'])->name('registrasi-submit');

//HALAMAN DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// HALAMAN PESAN
Route::get('/pesanan-web', [PesananWebController::class, 'index'])->name('pesanan-web');
Route::post('/submit-pesanan-web-user', [PesananWebController::class, 'tambahPesananuser'])->name('submit-pesanan-web-user');
Route::put('/submit-pesanan-web-admin/{id}', [PesananWebController::class, 'ProsesPesananAdmin'])->name('submit-pesanan-web-admin');
Route::put('/submit-pesanan-web-teknisi/{id}', [PesananWebController::class, 'ProsesPesananTeknisi'])->name('submit-pesanan-web-teknisi');

// HALAMAN lAYANAN
Route::get('/layanan-web', [LayananWebController::class, 'index'])->name('layanan-web');
Route::post('/submit-layanan-web-tambah', [LayananWebController::class, 'tambahLayanan'])->name('submit-layanan-web-tambah');
Route::put('/submit-layanan-web-update', [LayananWebController::class, 'updateLayanan'])->name('submit-layanan-web-update');

// HALAMAN RIWAYAT
Route::get('/riwayat-web', [RiwayatWebController::class, 'index'])->name('riwayat-web');
Route::post('/submit-pesanan-web-cancel', [RiwayatWebController::class, 'cancelpesan'])->name('submit-pesanan-web-cancel');


// HALAMAN MASTER USER
Route::get('/master-user-web', [MasterUserWebController::class, 'index'])->name('master-user-web');
Route::post('/master-user-add-web', [MasterUserWebController::class, 'tambahUser'])->name('master-user-add-web');
Route::put('/master-user-update-web', [MasterUserWebController::class, 'updateUser'])->name('master-user-update-web');
