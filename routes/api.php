<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Login Route
Route::post('login', 'App\Http\Controllers\LoginController@cekLogin');
Route::post('login/mobile', 'App\Http\Controllers\ApiMoblieController@cekLogin');
Route::get('data/layanan', 'App\Http\Controllers\ApiMoblieController@layananData');
Route::get('foto/layanan/{id}', 'App\Http\Controllers\ApiMoblieController@DetaillayananData');


//Registrasi route
Route::post('registrasi', 'App\Http\Controllers\UserController@registrasiUser');

// Pesanan pelanggan
Route::post('submit-pesanan', 'App\Http\Controllers\PesananController@tambahPesanan');

Route::get('riwayat-pesanan/{id}', 'App\Http\Controllers\RiwayanPesananController@getData');
Route::get('riwayat-notif/{id}', 'App\Http\Controllers\RiwayanPesananController@getDatanotif');

Route::patch('cancel-pesanan/{id}', 'App\Http\Controllers\RiwayanPesananController@cancelPesanan');

// User
Route::post('submit-user', 'App\Http\Controllers\UserController@tambahUser');
Route::put('submit-update-user/{id}', 'App\Http\Controllers\UserController@editUser');
Route::put('update-pesanan-admin/{id}', 'App\Http\Controllers\UserController@updatePesanAdmin');
Route::get('user/mobile/{id}', 'App\Http\Controllers\ApiMoblieController@UserUpdate');

Route::delete('submit-delete-user/{id}', 'App\Http\Controllers\UserController@deleteUser');

Route::get('nama-elektronik', 'App\Http\Controllers\LayananController@getData');
Route::get('get-usertek', 'App\Http\Controllers\UserController@getUserTek');
Route::get('get-user', 'App\Http\Controllers\UserController@getData');
Route::get('get-pesanan-admin', 'App\Http\Controllers\UserController@PesananAdmin');


// Logout Route
Route::middleware('auth:api')->post('logout', 'App\Http\Controllers\LoginController@logout');

//CRUD layanan Admin
Route::get('data-layanan', 'App\Http\Controllers\LayananController@getData');
Route::get('get-teknisi-role/{id}', 'App\Http\Controllers\LayananController@getUserTek');

Route::post('tambah-layanan', 'App\Http\Controllers\LayananController@Adddata');
Route::post('update-layanan/{id}', 'App\Http\Controllers\LayananController@editLayanan');
Route::delete('delete-layanan/{id}', 'App\Http\Controllers\LayananController@deleteLayanan');
Route::get('riwayat-pesanan-Admin', 'App\Http\Controllers\RiwayanPesananController@getriwayatAdmin');

//Teknisi
Route::get('data-layanan-teknisi/{userID}', 'App\Http\Controllers\TeknisiController@getData');
Route::get('riwayat-pesanan-Teknisi/{userID}', 'App\Http\Controllers\RiwayanPesananController@getriwayatTeknisi');
Route::put('update-pesanan-teknisi/{id}', 'App\Http\Controllers\TeknisiController@updatePesananTeknisi');

// Get User Details
Route::middleware('auth:api')->get('user', function (Request $request) {
    return $request->user();
});
