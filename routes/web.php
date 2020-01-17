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



Route::get('/', 'UrlsController@index')
    ->name('home');

Route::post('url_finder', 'UrlsController@finder')
    ->name('url_giver');

Route::post('url_shortened', 'UrlsController@store')
    ->name('url_store');

Route::group(['prefix' => 'reader'], function() {

    Route::get('/show_url/{shortened}','UrlsController@show_details')
        ->name('show_details');
});

Route::group(['prefix' => 'back'], function() {

    Route::group(['prefix'=> 'personne'], function(){

        Route::get('/', 'Back\PersonneController@index')
            ->name('back_personnes');
        
        Route::get('/create', 'Back\PersonneController@create')->name('back_personne_add');

        Route::get('/show/{id}', 'Back\PersonneController@show')->name('back_personne_show');

        Route::post('/store', 'Back\PersonneController@store')->name('back_personne_store');

        Route::group(['prefix'=>'ajax'], function() {
            Route::get('/', 'Back\PersonneController@ajax_index')
                ->name('back_personne_ajax_index');
            Route::get('/{find_by_name?}', 'Back\PersonneController@ajax_index')->name('back_personne_ajax_index_find');
        });
    });

    Route::group(['prefix' => 'contact'], function(){

        Route::get('/', 'Back\ContactController@index')
        ->name('back_mes_contact');
    
        Route::get('/add_contact/{personne?}', 'Back\ContactController@new_contact')
            ->name('add_contact');

        Route::get('/give/{give_personne}/form/{form_entity}', 'Back\PersonneController@index')
            ->name('back_contact_before_add');
        
        Route::post('store_contact', 'Back\ContactController@store')
            ->name('contact_store');

        Route::get('show/contact/{id}', 'Back\ContactController@show')->name('contact_show');
    });

    Route::get('/', 'Back\UrlsController@home')
        ->name('home_url');

    Route::get('/url_add','Back\UrlsController@create')
        ->name('add_url');

    Route::get('/url_edit/{id}','Back\UrlsController@edit')
        ->name('edit_url');

    Route::post('/url_stored','Back\UrlsController@store_after_added')
        ->name('store_url');

    Route::post('/url/{id}/update','Back\UrlsController@update')
        ->name('url_updater');
});

Route::group(['prefix' =>'writer'], function() {

    Route::get('/url/showUrlList', 'UrlsController@showUrlList')
        ->name('show_url_list');
});

// Route::get('/{shortened}','UrlsController@show')->name('shortened');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('document/show/{id}', 'DocumentsController@show')
    ->name('document_show');

Route::group(['prefix' => 'admin', 'auth'], function() {

    Route::get('document/{url_id}/create', 'DocumentsController@create')
    ->name('document_create');

Route::post('document/store', 'DocumentsController@store')
    ->name('document_store');
});

Route::group(['prefix' => 'admin', "middleware"=>'auth'], function() {



});


Auth::routes();

