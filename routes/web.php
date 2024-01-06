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


// Route::get('dashboard',HomeController::class,'dashboard');
