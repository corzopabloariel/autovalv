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

Route::get( '{link?}' ,
    [ 'uses' => 'page\GeneralController@index' , 'as' => 'index' ]
)->where( 'link' , "index|empresa|productos|documentacion|dimensionamiento|contacto|cotizacion" );

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'adm'], function() {
    Route::get('/', 'Auth\AdmController@index')->name('adm');
    Route::get('logout', ['uses' => 'Auth\LoginController@logout' , 'as' => 'adm.logout']);
    
    /**
     * SLIDERS
     */
    Route::resource('slider', 'Auth\SliderController')->except(['index','update','show']);
    Route::get('slider/{seccion}', ['uses' => 'Auth\SliderController@index', 'as' => 'slider.index']);
    Route::post('slider/update/{id}', ['uses' => 'Auth\SliderController@update', 'as' => 'slider.update']);
    /**
     * CONTENIDO
     */
    Route::group(['prefix' => 'contenido', 'as' => 'contenido'], function() {
        Route::get('{seccion}/edit', ['uses' => 'Auth\ContenidoController@edit', 'as' => '.edit']);
        Route::post('{seccion}/update', ['uses' => 'Auth\ContenidoController@update', 'as' => 'update']);
    });
    /**
     * DOCUMENTACION
     */
    Route::resource('documentacion', 'Auth\DocumentacionController')->except(['update']);
    Route::post('documentacion/update/{id}', ['uses' => 'Auth\DocumentacionController@update', 'as' => 'documentacion.update']);
    /**
     * DATOS
     */
    //Route::match( [ 'get' , 'post' ] , 'empresa.usuarios.datos', ['uses' => 'Auth\UserController@datos', 'as' => 'empresa.usuarios.datos']);
    Route::group(['prefix' => 'empresa', 'as' => 'empresa'], function() {
        Route::get('datos', ['uses' => 'Auth\EmpresaController@datos', 'as' => '.datos']);
        Route::match(['get', 'post'], 'terminos',['as' => '.terminos','uses' => 'Auth\EmpresaController@terminos' ]);
        Route::match(['get', 'post'], 'form',['as' => '.form','uses' => 'Auth\EmpresaController@form' ]);
        Route::post('update', ['uses' => 'Auth\EmpresaController@update', 'as' => '.update']);

        Route::group(['prefix' => 'metadatos', 'as' => '.metadatos'], function() {
            Route::get('/', ['uses' => 'Auth\MetadatosController@index', 'as' => '.index']);
            Route::get('edit/{page}', ['uses' => 'Auth\MetadatosController@edit', 'as' => '.edit']);
            Route::post('update/{page}', ['uses' => 'Auth\MetadatosController@update', 'as' => '.update']);
            Route::post('store', ['uses' => 'Auth\MetadatosController@store', 'as' => '.store']);
            Route::get('delete/{page}', ['uses' => 'Auth\MetadatosController@destroy', 'as' => '.destroy']);
        });
        
        Route::group(['prefix' => 'usuarios', 'as' => '.usuarios'], function() {
            Route::get('/', ['uses' => 'Auth\UserController@index', 'as' => '.index']);
            Route::get('datos', ['uses' => 'Auth\UserController@datos', 'as' => '.datos']);
            Route::get('edit/{id}', ['uses' => 'Auth\UserController@edit', 'as' => '.edit']);
            Route::post('update/{id}', ['uses' => 'Auth\UserController@update', 'as' => '.update']);
            Route::post('store', ['uses' => 'Auth\UserController@store', 'as' => '.store']);
            Route::get('delete/{id}', ['uses' => 'Auth\UserController@destroy', 'as' => '.destroy']);
        });
        
        Route::group(['prefix' => 'redes', 'as' => '.redes'], function() {
            Route::get('/', ['uses' => 'Auth\EmpresaController@redes', 'as' => '.index']);
            Route::post('update/{id}', ['uses' => 'Auth\EmpresaController@redesUpdate', 'as' => '.update']);
            Route::post('/', ['uses' => 'Auth\EmpresaController@redesStore', 'as' => '.store']);
            Route::delete('delete', ['uses' => 'Auth\EmpresaController@redesDestroy', 'as' => '.destroy']);
        });
    });
});