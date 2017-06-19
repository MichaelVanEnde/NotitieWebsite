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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/notitie/{user}','NotitieController@store');				//voegt notitie toe aan database
Route::get('/notitie/{notitie}','NotitieController@edit');				//laat pagina zien voor een specifieke notitie die geedit kan worden {id}= id van notitie
Route::patch('/notitie/{notitie}/update','NotitieController@update');	//update een specifieke notitie
Route::get('/notitie/{notitie}/remove','NotitieController@delete');		//verwijderd een bepaalde notitie
Route::get('/notities/user/{user}','NotitieController@show');			//laat alle notities zien van een bepaalde user