<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Login Route
Route::post('login', 'App\Http\Controllers\LoginController@cekLogin');

// Pesanan Route
Route::post('submit-pesanan', 'App\Http\Controllers\PesananController@tambahPesanan');

//user
Route::post('submit-user', 'App\Http\Controllers\UserController@tambahUser');
Route::put('submit-update-user/{id}', 'App\Http\Controllers\UserController@editUser');
Route::delete('submit-delete-user/{id}', 'App\Http\Controllers\UserController@deleteUser');

Route::get('nama-elektronik', 'App\Http\Controllers\LayananController@getData');
Route::get('get-user', 'App\Http\Controllers\UserController@getData');

Route::get('riwayat-pesanan', 'App\Http\Controllers\RiwayanPesananController@getData');

// Logout Route
Route::middleware('auth:api')->post('logout', 'App\Http\Controllers\LoginController@logout');  

//CRUD layanan Admin
Route::get('data-layanan', 'App\Http\Controllers\LayananController@getData');
Route::post('tambah-layanan', 'App\Http\Controllers\LayananController@Adddata');

// Get User Details
Route::middleware('auth:api')->get('user', function (Request $request) {
    return $request->user();
});
