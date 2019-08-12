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

Route::get('/', 'UrlsController@index');

Route::post('url_shortened', 'UrlsController@store')->name('url_store');

Route::get('/{shortened}','UrlsController@show')->name('shortened');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
