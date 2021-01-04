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
    return view('layouts.app');
});

Auth::routes();

Route::get('/home', function () {
    return view('layouts.app');
});



Route::get('/home', 'StudentController@index')->name('home');
Route::get('/create','StudentController@create')->name('create');
Route::post('/store','StudentController@store')->name('store');
route::get('/show','StudentController@show')->name('show');
route::get('/search','StudentController@search')->name('search');
route::get('/grade','StudentController@grade')->name('grade');
route::get('/gradestore','StudentController@gradestore')->name('gradestore');


Route::get('store_image', 'StoreImageController@index');

Route::post('store_image', 'StoreImageController@insert_image')->name('store.image');

// Route::get('store_image/fetch_image/{id}', 'StoreImageController@fetch_image');
