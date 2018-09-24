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

Route::get('/', 'SiteController@index');

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware' => 'auth'], function() {
   
    Route::get('/', function() { 
       return view('admin.index'); 
    });
   
    Route::get('config', ['as' => 'admin.config.index', 'uses' => 'ConfigController@index']);
    Route::get('config/edit/{id}', ['as' => 'admin.config.edit', 'uses' => 'ConfigController@edit']);
	Route::post('config/update/{id}', ['as' => 'admin.config.update', 'uses' => 'ConfigController@update']);

	Route::get('galeria', ['as' => 'admin.galeria.index', 'uses' => 'GaleriaController@index']);
	Route::post('galeria/store', ['as' => 'admin.galeria.store', 'uses' => 'GaleriaController@store']);
	Route::get('galeria/create', ['as' => 'admin.galeria.create', 'uses' => 'GaleriaController@create']);
	Route::get('galeria/edit/{id}', ['as' => 'admin.galeria.edit', 'uses' => 'GaleriaController@edit']);
	Route::post('galeria/update/{id}', ['as' => 'admin.galeria.update', 'uses' => 'GaleriaController@update']);
	Route::get('galeria/destroy/{id}', ['as' => 'admin.galeria.destroy', 'uses' => 'GaleriaController@destroy']);

    Route::get('contato', ['as' => 'admin.formulario.index', 'uses' => 'ContatoController@index']);
    Route::post('contato/store', ['as' => 'admin.formulario.store', 'uses' => 'ContatoController@store']);
	Route::get('contato/create', ['as' => 'admin.formulario.create', 'uses' => 'ContatoController@create']);
	Route::get('contato/edit/{id}', ['as' => 'admin.formulario.edit', 'uses' => 'ContatoController@edit']);
	Route::post('contato/update/{id}', ['as' => 'admin.formulario.update', 'uses' => 'ContatoController@update']);
	Route::get('contato/destroy/{id}', ['as' => 'admin.formulario.destroy', 'uses' => 'ContatoController@destroy']);
});


Route::group(['namespace' => 'Site'], function() {
    Route::get('galeria-de-obras', 'GaleriaController@index')
        ->name('site.galeria.index');

    Route::post('galeria-de-obras', 'GaleriaController@store')
        ->name('site.galeria.store');
    
});

Auth::routes();

