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


Route::get('/','GameController@home');
Route::get('/jogar','GameController@jogar');
Route::get('/historico','GameController@historico');
Route::get('/jogo/{id}','GameController@jogo');
Route::post('/jogada','GameController@jogada');
Route::get('/detalhes/{id}','GameController@detalhes');
Route::post('/criar','GameController@criar');
