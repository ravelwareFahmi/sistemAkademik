<?php

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
    return view('home');
});

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postLogin', 'AuthController@postLogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth','CheckRole:admin']], function () {
    Route::get('/siswa', 'SiswaController@index');
    Route::post('/siswa/create', 'SiswaController@create');
    Route::get('/siswa/profile/{siswa}', 'SiswaController@siswaProfile');
    Route::post('/siswa/updateProfile/{id}', 'SiswaController@updateProfile');
    Route::post('/siswa/addMapel/{siswa}', 'SiswaController@addMapel');
    Route::get('/siswa/edit/{siswa}','SiswaController@edit');
    Route::post('/siswa/update/{siswa}','SiswaController@update');
    Route::get('/siswa/delete/{siswa}','SiswaController@destroy');

    Route::get('/guru/profile/{guru}', 'GuruController@index');

});
    Route::group(['middleware' => ['auth','CheckRole:admin,siswa']], function () {
    Route::get('/dashboard', 'DashboardController@index');
});
