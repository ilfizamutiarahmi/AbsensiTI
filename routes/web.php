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
Route::get('/kelas/edit/{id}', 'App\Http\Controllers\KelasController@edit')->name('kelas.edit');
Route::post('/kelas/$id', 'App\Http\Controllers\KelasController@update')->name('kelas.update');
Route::post('/kelas', 'App\Http\Controllers\KelasController@store')->name('kelas.store');
Route::get('/kelas/destroy/{id}','App\Http\Controllers\KelasController@destroy')->name('kelas.destroy');

//dosen
Route::get('/dosen','App\Http\Controllers\DosenController@index')->name('dosen.index');
Route::get('/dosen/create','App\Http\Controllers\DosenController@create')->name('dosen.create');
Route::post('/dosen', 'App\Http\Controllers\DosenController@store')->name('dosen.store');
Route::get('/dosen/destroy/{id}','App\Http\Controllers\DosenController@destroy')->name('dosen.destroy');

//mahasiswa
Route::get('/mahasiswa','App\Http\Controllers\MahasiswaController@index')->name('mahasiswa.index');
Route::get('/mahasiswa/create','App\Http\Controllers\MahasiswaController@create')->name('mahasiswa.create');
Route::post('/mahasiswa', 'App\Http\Controllers\MahasiswaController@store')->name('mahasiswa.store');
Route::get('/mahasiswa/edit/{id}','App\Http\Controllers\MahasiswaController@edit')->name('mahasiswa.edit');
Route::post('/mahasiswa/$id', 'App\Http\Controllers\MahasiswaController@update')->name('mahasiswa.update');
Route::get('/mahasiswa/destroy/{id}','App\Http\Controllers\MahasiswaController@destroy')->name('mahasiswa.destroy');


//tahun ajar
Route::get('/tahun_ajar','App\Http\Controllers\TahunAjarController@index')->name('tahun_ajar.index');
Route::get('/tahun_ajar/create','App\Http\Controllers\TahunAjarController@create')->name('tahun_ajar.create');
Route::post('/tahun_ajar', 'App\Http\Controllers\TahunAjarController@store')->name('tahun_ajar.store');


//prodi
Route::get('/prodi','App\Http\Controllers\ProdiController@index')->name('prodi.index');
Route::get('/prodi/create','App\Http\Controllers\ProdiController@create')->name('prodi.create');
Route::post('/prodi', 'App\Http\Controllers\ProdiController@store')->name('prodi.store');
Route::get('/prodi/edit/{id}','App\Http\Controllers\ProdiController@edit')->name('prodi.edit');
Route::post('/prodi/$id', 'App\Http\Controllers\ProdiController@update')->name('prodi.update');
Route::get('/prodi/destroy/{id}','App\Http\Controllers\ProdiController@destroy')->name('prodi.destroy');

//matakuliah
Route::get('/matakuliah','App\Http\Controllers\MatakuliahController@index')->name('matakuliah.index');
Route::get('/matakuliah/create','App\Http\Controllers\MatakuliahController@create')->name('matakuliah.create');
Route::post('/matakuliah', 'App\Http\Controllers\MatakuliahController@store')->name('matakuliah.store');
Route::get('/matakuliah/edit/{id}','App\Http\Controllers\MatakuliahController@edit')->name('matakuliah.edit');
Route::post('/matakuliah/$id', 'App\Http\Controllers\MatakuliahController@update')->name('matakuliah.update');
Route::get('/matakuliah/destroy/{id}','App\Http\Controllers\MatakuliahController@destroy')->name('matakuliah.destroy');


// Route::get('dashboard',HomeController::class,'dashboard');
