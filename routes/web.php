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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::namespace('Admin')->group(function () {

    Route::get('/index', 'adminController@index')->name('index');
    Route::delete('/seni/delete/{seni}', 'seniController@delete')->name('seni.delete');
    Route::get('/seni', 'seniController@index')->name('seni');
    Route::get('/seni/create', 'seniController@create')->name('seni.create');
    Route::post('/seni/store', 'seniController@store')->name('seni.store');
    Route::get('/seni/edit/{id}', 'seniController@edit')->name('seni.edit');
    Route::post('/seni/update/{seni}', 'seniController@update')->name('seni.update');
    
});