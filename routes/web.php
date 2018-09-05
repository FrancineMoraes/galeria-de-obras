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

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware' => 'auth'], function() {
   
    Route::get('/', function() { 
       return view('admin.index'); 
    });
   
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
    Route::get('carrossite', 'CarroController@index')
        ->name('carrossite.index');

    Route::get('/', 'CarroController@viewdestaque')
        ->name('carrossite.viewdestaque');

    Route::any('/pesquisa', 'CarroController@pesquisar')
        ->name('pesquisa');

    Route::get('/proposta/{id}', 'CarroController@propostaIndex')
        ->name('proposta');

    Route::resource('propostas', 'PropostaController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/promocao', 'EmailControler@enviaEmail');

Route::get('/carros/{id?}', 'CarroController@ws');

Route::get('/xml/{id?}', 'CarroController@wsxml');

Route::get('/lista/{preco?}', 'CarroController@lista');

Route::get('/rel', function(){
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadHTML('<h1>Test</h1>');
    return $pdf->stream();
});

Route::get('/relcarros', 'CarroController@relcarros');
