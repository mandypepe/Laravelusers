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

Route::get('/', 'UserController@index');

Route::get('/usuarioas/{user}','UserController@detail_user')->name('user.details')
    ->where('user','[0-9]+');
// where para definir expreciones regulares en base al tipo del parametro


Route::get('/usuarioas/nuevo','UserController@new_user')
    ->name('user.new');

Route::post('/usuarios/crear/','UserController@store')->name('user.create');


Route::get('/usuarioas/{name}/','WelcomeUserController@welcomeu')
    ->where(['name'=>'[A-Za-z]+'])->name('user.welcome');

Route::get('/usuarioas/{user}/edit','UserController@edit')->name('user.edit');
Route::post('/usuarioas/{user}','UserController@update')->name('user.update');


Route::get('/usuarioas/{name}/{nickname?}/','WelcomeUserController@welcome')->where(['name'=>'[A-Za-z]+','nickname'=>'[\w]+']);
#Route::get('/usuarioas/{name}/{nickname?}/','WelcomeUserController')->where(['name'=>'[A-Za-z]+','nickname'=>'[\w]+']);
# esto es para controller de un solo metodo y usas en el controller __invoke
Route::get('/lista/','UserController@index')->name('user.list');
Route::delete('/usuarioas/{user}','UserController@destroy')->name('user.delete');