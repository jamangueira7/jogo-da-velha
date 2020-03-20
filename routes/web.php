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

//Rotas jogo
Route::get('/','GameController@home')->middleware('checklogin');
Route::get('/jogar','GameController@jogar')->middleware('checklogin');
Route::get('/historico','GameController@historico')->middleware('checklogin');
Route::get('/jogo/{id}','GameController@jogo')->middleware('checklogin');
Route::post('/jogada','GameController@jogada')->middleware('checklogin');
Route::get('/detalhes/{id}','GameController@detalhes')->middleware('checklogin');
Route::post('/criar','GameController@criar')->middleware('checklogin');

//Rotas usuario
Route::get('/cadastro','UserController@cadastro')->middleware('checklogin');
Route::post('/criar-user','UserController@criar')->middleware('checklogin');
Route::get('/login','UserController@login')->middleware('checklogin');
Route::get('/logout','UserController@logout')->middleware('checklogin');
Route::post('/logar','UserController@logar')->middleware('checklogin');
Route::get('/info','UserController@info')->middleware('checklogin');
Route::post('/update/{id}','UserController@update')->middleware('checklogin');
