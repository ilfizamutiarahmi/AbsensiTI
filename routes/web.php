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

// Route::get('/', function () {
//     return view('dashboard');
// });



// Auth::routes();
Route::middleware(['guest'])->group(function(){
//Route Login
Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login.index');
Route::post('/login-proses', 'App\Http\Controllers\LoginController@login_proses')->name('login-proses');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');
Route::get('/register', 'App\Http\Controllers\LoginController@register')->name('register');
Route::post('/register-proses', 'App\Http\Controllers\LoginController@register_proses')->name('register-proses');
Route::get('/dashboard', 'App\Http\Controllers\HomeController@dashboard')->name('dashboard');
});

 //middleware
 Route::middleware(['auth'])->group(function(){
        //Route Kelas
    Route::get('/kelas', 'App\Http\Controllers\KelasController@index')->name('kelas.index');
    Route::get('/kelas/create', 'App\Http\Controllers\KelasController@create')->name('kelas.create');
    Route::get('/kelas/edit/{id}', 'App\Http\Controllers\KelasController@edit')->name('kelas.edit');
    Route::patch('/kelas/{id}', 'App\Http\Controllers\KelasController@update')->name('kelas.update');
    Route::post('/kelas', 'App\Http\Controllers\KelasController@store')->name('kelas.store');
    Route::get('/kelas/destroy/{id}','App\Http\Controllers\KelasController@destroy')->name('kelas.destroy');

    //dosen
    Route::get('/dosen','App\Http\Controllers\DosenController@index')->name('dosen.index');
    Route::get('/dosen/create','App\Http\Controllers\DosenController@create')->name('dosen.create');
    Route::get('/dosen/edit/{id}', 'App\Http\Controllers\DosenController@edit')->name('dosen.edit');
    Route::patch('/dosen/{id}', 'App\Http\Controllers\DosenController@update')->name('dosen.update');
    Route::post('/dosen', 'App\Http\Controllers\DosenController@store')->name('dosen.store');
    Route::get('/dosen/destroy/{id}','App\Http\Controllers\DosenController@destroy')->name('dosen.destroy');

    //mahasiswa
    Route::get('/mahasiswa','App\Http\Controllers\MahasiswaController@index')->name('mahasiswa.index');
    Route::get('/mahasiswa/create','App\Http\Controllers\MahasiswaController@create')->name('mahasiswa.create');
    Route::post('/mahasiswa', 'App\Http\Controllers\MahasiswaController@store')->name('mahasiswa.store');
    Route::get('/mahasiswa/edit/{id}','App\Http\Controllers\MahasiswaController@edit')->name('mahasiswa.edit');
    Route::patch('/mahasiswa/{id}', 'App\Http\Controllers\MahasiswaController@update')->name('mahasiswa.update');
    Route::get('/mahasiswa/destroy/{id}','App\Http\Controllers\MahasiswaController@destroy')->name('mahasiswa.destroy');


    //tahun ajar
    Route::get('/tahun_ajar','App\Http\Controllers\TahunAjarController@index')->name('tahun_ajar.index');
    Route::get('/tahun_ajar/create','App\Http\Controllers\TahunAjarController@create')->name('tahun_ajar.create');
    Route::post('/tahun_ajar', 'App\Http\Controllers\TahunAjarController@store')->name('tahun_ajar.store');
    Route::get('/tahun_ajar/edit/{id}','App\Http\Controllers\TahunAjarController@edit')->name('tahun_ajar.edit');
    Route::patch('/tahun_ajar/{id}', 'App\Http\Controllers\TahunAjarController@update')->name('tahun_ajar.update');
    Route::get('/tahun_ajar/destroy/{id}','App\Http\Controllers\TahunAjarController@destroy')->name('tahun_ajar.destroy');

    //Absensi
    Route::get('/absensi','App\Http\Controllers\AbsensiController@index')->name('absensi.index');
    Route::get('/absensi/create','App\Http\Controllers\AbsensiController@create')->name('absensi.create');
    Route::post('/absensi', 'App\Http\Controllers\AbsensiController@store')->name('absensi.store');

    //Jadwal
    Route::get('/jadwal','App\Http\Controllers\JadwalController@index')->name('jadwal.index');
    Route::get('/jadwal/create','App\Http\Controllers\JadwalController@create')->name('jadwal.create');
    Route::post('/jadwal','App\Http\Controllers\JadwalController@store')->name('jadwal.store');


    //prodi
    Route::get('/prodi','App\Http\Controllers\ProdiController@index')->name('prodi.index');
    Route::get('/prodi/create','App\Http\Controllers\ProdiController@create')->name('prodi.create');
    Route::post('/prodi', 'App\Http\Controllers\ProdiController@store')->name('prodi.store');
    Route::get('/prodi/edit/{id}','App\Http\Controllers\ProdiController@edit')->name('prodi.edit');
    Route::patch('/prodi/{id}', 'App\Http\Controllers\ProdiController@update')->name('prodi.update');
    Route::get('/prodi/destroy/{id}','App\Http\Controllers\ProdiController@destroy')->name('prodi.destroy');

    //matakuliah
    Route::get('/matakuliah','App\Http\Controllers\MatakuliahController@index')->name('matakuliah.index');
    Route::get('/matakuliah/create','App\Http\Controllers\MatakuliahController@create')->name('matakuliah.create');
    Route::post('/matakuliah', 'App\Http\Controllers\MatakuliahController@store')->name('matakuliah.store');
    Route::get('/matakuliah/edit/{id}','App\Http\Controllers\MatakuliahController@edit')->name('matakuliah.edit');
    Route::patch('/matakuliah/{id}', 'App\Http\Controllers\MatakuliahController@update')->name('matakuliah.update');
    Route::get('/matakuliah/destroy/{id}','App\Http\Controllers\MatakuliahController@destroy')->name('matakuliah.destroy');

    //dashboard
    Route::get('/', function () {
        return view('dashboard');
    });

    Route::get('/dashboard', 'App\Http\Controllers\HomeController@dashboard')->name('dashboard');
    Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');

    //rekapabsensi
    Route::get('/rekapabsensi','App\Http\Controllers\AbsensiController@rekapabsensi')->name('rekapabsensi.index');
    Route::get('/rekapabsensi/pdf', 'App\Http\Controllers\AbsensiController@generatePDF')->name('rekapabsensi.pdf');
 });



