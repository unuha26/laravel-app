<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Part;
use App\Http\Controllers\Laporan;
// use App\Http\Controllers\LogIn;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [Dashboard::class, 'home']);
// Route::get('LogIn', [Dashboard::class, 'login'])->name('LogIn');
Route::controller(Dashboard::class)->group(function () {
    Route::get('LogIn', 'login')->name('LogIn');
    Route::post('LogIn/proses', 'proses');
});
Route::controller(Dashboard::class)->group(function () {
    Route::get('/dashboard', 'home');
    Route::get('/dashboard/login', 'login');
    Route::get('/dashboard/home', 'home');
});
Route::controller(User::class)->group(function () {
    Route::get('/user', 'index');
    Route::get('/user/index', 'index');
    Route::get('/user/tambah', 'add');
    Route::post('/user/simpan', 'save');
    Route::get('/user/edit/{id}', 'edit');
    Route::put('/user/update', 'update');
    Route::delete('/user/delete/{id}', 'delete');
});
Route::controller(Part::class)->group(function () {
    Route::get('/part', 'index');
    Route::get('/part/index', 'index');
    Route::get('/part/tambah', 'add');
    Route::get('/part/minta', 'minta');
    Route::post('/part/simpan', 'save');
    Route::get('/part/edit/{id}', 'edit');
    Route::put('/part/update', 'update');
    Route::delete('/part/delete/{id}', 'delete');
});
Route::controller(Laporan::class)->group(function () {
    Route::get('/laporan', 'index');
    Route::get('/laporan/index', 'index');
    Route::get('/laporan/tambah', 'add');
    Route::post('/laporan/simpan', 'save');
    Route::get('/laporan/edit/{id}', 'edit');
    Route::put('/laporan/update', 'update');
    Route::delete('/laporan/delete/{id}', 'delete');
});
