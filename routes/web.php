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
    return view('welcome');
});

Route::get('/kriteria', 'KriteriaController@index');
Route::post('/kriteria', 'KriteriaController@store');
Route::get('/kriteria/edit/{id}', 'KriteriaController@edit');
Route::post('/kriteria/update', 'KriteriaController@update');
Route::get('/kriteria/delete/{id}', 'KriteriaController@destroy');

// Alternatif Route
Route::get('/alternatif', 'AlternatifController@index');
Route::post('/alternatif', 'AlternatifController@store');
Route::get('/alternatif/edit/{id}', 'AlternatifController@edit');
Route::post('/alternatif/update', 'AlternatifController@update');
Route::get('/alternatif/delete/{id}', 'AlternatifController@destroy');

// Sub Route
Route::get('/sub', 'SubkriteriaController@index');
Route::post('/sub', 'SubkriteriaController@store');
Route::get('/sub/edit/{id}', 'SubkriteriaController@edit');
Route::post('/sub/update', 'SubkriteriaController@update');
Route::get('/sub/delete/{id}', 'SubkriteriaController@destroy');

