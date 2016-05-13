<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', ['middleware' => 'auth', 'uses' => 'HomeController@view']);

Route::get('/home', 'HomeController@index');
Route::post('save_detail', 
  ['middleware' => 'auth', 'as' => 'home2', 'uses' => 'HomeController@save_detail']);

Route::get('delete/{id}', [
    'middleware' => 'auth',
    'uses' => 'HomeController@delete'
]);

Route::get('edit/{id}', [
    'middleware' => 'auth',
    'uses' => 'HomeController@edit'
]);
Route::post('update_detail', [
    'middleware' => 'auth',
    'uses' => 'HomeController@update'
]);


Route::get('auth/login', 'LoginController@index');
Route::post('auth/login', 'LoginController@Login');

Route::get('auth/register', function () {
    return view("auth/register");
});
Route::get('/email', function () {
    return view("home/email");
});
Route::post('/email', 'HomeController@email');
Route::post('auth/register', 'LoginController@postRegister');
Route::auth();

Route::get('get/{filename}', [
'as' => 'getentry', 'uses' => 'HomeController@get']);

Route::get('down/{filename}', [
'as' => 'downimage', 'uses' => 'HomeController@download']);

