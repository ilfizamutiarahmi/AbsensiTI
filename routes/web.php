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



// Auth::routes();
# Route Kelas
Route::get('/kelas', 'App\Http\Controllers\KelasController@index')->name('kelas.index');
Route::get('/kelas/create', 'App\Http\Controllers\KelasController@create')->name('kelas.create');
Route::post('/kelas', 'App\Http\Controllers\KelasController@store')->name('kelas.store');


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

//tahun ajar
Route::get('/tahun_ajar','App\Http\Controllers\TahunAjarController@index')->name('tahun_ajar.index');
Route::get('/tahun_ajar/create','App\Http\Controllers\TahunAjarController@create')->name('tahun_ajar.create');
Route::post('/tahun_ajar', 'App\Http\Controllers\TahunAjarController@store')->name('tahun_ajar.store');

//Absensi
Route::get('/absensi','App\Http\Controllers\AbsensiController@index')->name('absensi.index');
Route::post('/absensi', 'App\Http\Controllers\AbsensiController@store')->name('absensi.store');

//Jadwal
Route::get('/jadwal','App\Http\Controllers\JadwalController@index')->name('jadwal.index');
Route::get('/jadwal/create','App\Http\Controllers\JadwalController@create')->name('jadwal.create');
Route::post('/jadwal','App\Http\Controllers\JadwalController@store')->name('jadwal.store');

