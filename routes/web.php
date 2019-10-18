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
    [ 'uses' => 'Page\GeneralController@index' , 'as' => 'index' ]
)->where( 'link' , "index|empresa|productos|documentacion|dimensionamiento|contacto|cotizacion|terminos" );
Route::get('productos/{url}/{id}', [ 'uses' => 'Page\GeneralController@familia', 'as' => 'familia' ]);
Route::get('productos/{url}/{url2}/{id}', [ 'uses' => 'Page\GeneralController@producto', 'as' => 'producto' ]);
Route::get('contacto/{url}/{id}', [ 'uses' => 'Page\GeneralController@contacto', 'as' => 'contacto' ]);

Route::get('search', [ 'uses' => 'Page\GeneralController@buscar', 'as' => 'buscar' ]);
Route::post('contacto', [ 'uses' => 'Page\FormController@contacto', 'as' => 'contacto' ]);
Route::post('cotizacion', [ 'uses' => 'Page\FormController@cotizacion', 'as' => 'cotizacion' ]);

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'adm'], function() {
    Route::get('/', 'Auth\AdmController@index')->name('adm');
    Route::get('logout', ['uses' => 'Auth\LoginController@logout' , 'as' => 'adm.logout']);
    
    Route::get('empresa/imagen', ['uses' => 'Auth\AdmController@imagen', 'as' => 'imagen']);
    Route::delete('imagen/delete', ['uses' => 'Auth\AdmController@imagenDestroy', 'as' => 'imagen.delete']);
    Route::post('imagen', ['uses' => 'Auth\AdmController@imagenStore', 'as' => 'imagen.create']);
    
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
     * PRODUCTO
     */
    Route::resource('productos', 'Auth\ProductoController')->except(['index','show','update']);
    Route::match(['get', 'post'], 'productos',['as' => 'productos.index','uses' => 'Auth\ProductoController@index' ]);
    Route::post('productos/update/{id}', ['uses' => 'Auth\ProductoController@update', 'as' => 'productos.update']);
    Route::get('producto/{id}/file',['as' => 'productos.file','uses' => 'Auth\ProductoController@file' ]);
    /**
     * PRODUCTOIMAGE
     */
    Route::get('productoimages/{id}',['as' => 'productoimages.index','uses' => 'Auth\ProductoimageController@index' ]);
    Route::resource('productoimages', 'Auth\ProductoimageController')->except(['update','index']);
    Route::post('productoimages/update/{id}', ['uses' => 'Auth\ProductoimageController@update', 'as' => 'productoimages.update']);
    /**
     * FAMILIA
     */
    Route::resource('familias', 'Auth\FamiliaController')->except(['update']);
    Route::post('familias/update/{id}', ['uses' => 'Auth\FamiliaController@update', 'as' => 'familias.update']);
    Route::get('familias/{id?}/sub',['as' => 'sfamilias.index','uses' => 'Auth\FamiliaController@index' ]);
    /**********************************
            DATOS DE LA EMPRESA        
     ********************************** /
    /** USUARIOS */
    Route::resource('usuarios', 'Auth\UserController')->except(['update']);
    Route::post('usuarios/update/{id}', ['uses' => 'Auth\UserController@update', 'as' => 'usuarios.update']);
    Route::get('usuario/datos', ['uses' => 'Auth\UserController@datos', 'as' => 'usuarios.datos']);

    Route::get('empresa/metadatos', ['uses' => 'Auth\MetadatosController@index', 'as' => 'metadatos.index']);
    Route::post('metadatos/update/{page}', ['uses' => 'Auth\MetadatosController@update', 'as' => 'metadatos.update']);

    //Route::resource('redes', 'Auth\EmpresaController')->except(['index','update']);
    Route::get('empresa/redes', ['uses' => 'Auth\EmpresaController@redes', 'as' => 'empresa.redes']);
    Route::post('redes', ['uses' => 'Auth\EmpresaController@redesStore', 'as' => 'redes.create']);
    Route::get('redes/{id}/edit', ['uses' => 'Auth\EmpresaController@redesEdit', 'as' => 'redes.edit']);
    Route::post('redes/update/{id}', ['uses' => 'Auth\EmpresaController@redesUpdate', 'as' => 'redes.update']);
    Route::delete('redes/delete', ['uses' => 'Auth\EmpresaController@redesDestroy', 'as' => 'redes.delete']);

    Route::group(['prefix' => 'empresa', 'as' => 'empresa'], function() {
        Route::get('datos', ['uses' => 'Auth\EmpresaController@datos', 'as' => '.datos']);
        Route::match(['get', 'post'], 'terminos',['as' => '.terminos','uses' => 'Auth\EmpresaController@terminos' ]);
        Route::match(['get', 'post'], 'form',['as' => '.form','uses' => 'Auth\EmpresaController@form' ]);
        Route::post('update', ['uses' => 'Auth\EmpresaController@update', 'as' => '.update']);
    });
});