<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('contatos');
});

Route::get('/contatos', 'App\Http\Controllers\ContatoController@index')->name('contatos');
Route::get('/contatos/{id}/edit', 'App\Http\Controllers\ContatoController@edit')->name('contatos.edit');
Route::put('/contatos/{id}/update', 'App\Http\Controllers\ContatoController@update')->name('contatos.update');
Route::delete('/contatos/{id}', 'App\Http\Controllers\ContatoController@delete')->name('contatos.delete');
Route::post('/contatos', 'App\Http\Controllers\ContatoController@store')->name('contatos.store');





