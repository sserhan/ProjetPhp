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

Route::resource('user','UserController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('user/mail/{n}',['as'=>'envoi','uses'=>'UserController@mail']);
Route::post('user/mail/{n}',['as'=>'mail','uses'=>'UserController@post']);
Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');
Route::get('importExport', 'ImportExportController@importExport');
Route::get('downloadExcel/{type}', 'ImportExportController@downloadExcel');
Route::post('importExport', 'ImportExportController@readCsv');