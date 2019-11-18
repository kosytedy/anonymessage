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

//Auth::routes();

Route::get('/authenticate', 'Auth\LoginController@authenticate')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

//Socialite
Route::get('/login/{service}', 'Auth\LoginController@redirectToProvider')->where('service', 'facebook|twitter|google')->name('social-login');
Route::get('/auth/callback/{service}', 'Auth\LoginController@handleProviderCallback')->where('service', 'facebook|twitter|google');

//Private link
Route::get('/message-to/{user_private_link}', 'MessageController@sendMessage')->name('private-link');
Route::post('/message-to/{user_private_link}', 'MessageController@postMessage')->name('send-message');
Route::get('/message/success', 'MessageController@success')->name('message-success');

//Dashboard
Route::get('/dashboard', 'HomeController@index')->name('dashboard');