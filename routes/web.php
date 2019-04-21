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

Auth::routes();

Route::group(['prefix'=>'admin','middlware'=>'auth'],function(){

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('ministry','MinistryController');
    Route::resource('nirdeshanalaya','NirdeshanalayaController');
    Route::resource('karyalaya','KaryalayaController');
    Route::resource('taha','TahaController');
    Route::resource('pad','PadController');
    Route::resource('shreni','ShreniController');
    Route::resource('employee','EmployeeController');
     




});



