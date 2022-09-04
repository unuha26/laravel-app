<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;

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

Route::get('/', function () {
    return view('welcome');
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