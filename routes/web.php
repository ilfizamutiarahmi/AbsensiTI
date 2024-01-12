<?php

use App\Models\MatakuliahModel;
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

//prodi
Route::get('/prodi','App\Http\Controllers\ProdiController@index')->name('prodi.index');
Route::get('/prodi/create','App\Http\Controllers\ProdiController@create')->name('prodi.create');
Route::post('/prodi', 'App\Http\Controllers\ProdiController@store')->name('prodi.store');
Route::get('/prodi/edit/{id}','App\Http\Controllers\ProdiController@edit')->name('prodi.edit');
Route::post('/prodi/$id', 'App\Http\Controllers\ProdiController@update')->name('prodi.update');

//matakuliah
Route::get('/matakuliah','App\Http\Controllers\MatakuliahController@index')->name('matakuliah.index');
Route::get('/matakuliah/create','App\Http\Controllers\MatakuliahController@create')->name('matakuliah.create');
Route::post('/matakuliah', 'App\Http\Controllers\MatakuliahController@store')->name('matakuliah.store');
Route::get('/matakuliah/edit/{id}','App\Http\Controllers\MatakuliahController@edit')->name('matakuliah.edit');
Route::post('/matakuliah/$id', 'App\Http\Controllers\MatakuliahController@update')->name('matakuliah.update');

// Route::get('dashboard',HomeController::class,'dashboard');
