<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::namespace('App\Http\Controllers\Api_Grupos')->group(function(){

    Route::get('/grupos', 'GrupoController@index')->name('api.index_grupos');
    Route::get('/grupos/{id}', 'GrupoController@show')->name('api.show_grupos');
    Route::post('/grupos', 'GrupoController@store')->name('api.store_grupos');
    Route::put('/grupos', 'GrupoController@update')->name('api.update_grupos');
    Route::delete('/grupos', 'GrupoController@delete')->name('api.delete_grupos');

});


Route::namespace('App\Http\Controllers\Api_Pessoas')->group(function(){

    Route::get('/pessoas', 'PessoaController@index')->name('api.index_pessoas');
    Route::get('/pessoas/{id}', 'PessoaController@show')->name('api.show_pessoas');
    Route::post('/pessoas', 'PessoaController@store')->name('api.store_pessoas');
    Route::put('/pessoas', 'PessoaController@update')->name('api.update_pessoas');
    Route::delete('/pessoas', 'PessoaController@delete')->name('api.delete_pessoas');
    
});