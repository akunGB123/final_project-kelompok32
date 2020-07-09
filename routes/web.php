<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pertanyaan/create', 'PertanyaanController@create');
Route::post('/home', 'PertanyaanController@store');

Route::get('pertanyaan/{id}', 'PertanyaanController@show');
Route::post('pertanyaan/{id}', 'JawabanController@store');

//Route::get('pertanyaan/{id}', '');

Route::get('/pertanyaan/{id}/edit','PertanyaanController@edit');
