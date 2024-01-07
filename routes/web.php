<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

//dosen
Route::get('/dosen','App\Http\Controllers\DosenController@index')->name('dosen.index');
Route::get('/dosen/create','App\Http\Controllers\DosenController@create')->name('dosen.create');
Route::post('/dosen', 'App\Http\Controllers\DosenController@store')->name('dosen.store');

//mahasiswa
Route::get('/mahasiswa','App\Http\Controllers\MahasiswaController@index')->name('mahasiswa.index');
Route::get('/mahasiswa/create','App\Http\Controllers\MahasiswaController@create')->name('mahasiswa.create');
Route::post('/mahasiswa', 'App\Http\Controllers\MahasiswaController@store')->name('mahasiswa.store');
Route::get('/mahasiswa/edit/{id}','App\Http\Controllers\MahasiswaController@edit')->name('mahasiswa.edit');
Route::post('/mahasiswa/$id', 'App\Http\Controllers\MahasiswaController@update')->name('mahasiswa.update');

// Route::get('dashboard',HomeController::class,'dashboard');
