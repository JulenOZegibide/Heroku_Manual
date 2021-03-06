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
Route::get('/', 'CircuitoController@index')->name('index');

Route::get('paginaajax/{id}', 'PaginaController@ajaxshow')->name('paginaajax');
Route::get('pagina/{id}', 'PaginaController@show')->name('pagina');
