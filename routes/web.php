<?php

use Illuminate\Auth\Middleware\EnsureEmailIsVerified;

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

Auth::routes(['verify' => true]);

// le middleware verified est utilisé pour vérifier le mail de l'utilisateur
// n'étant pas parvenu à le configurer, le mail est envoyé dans les logs

Route::get('/home', 'HomeController@index')/*->middleware('verified')*/->name('home');

Route::get('/upload', 'ImgController@index')/*->middleware('verified')*/->name('imgUpload');

Route::post('/upload', 'ImgController@imgUpload')->name('formRoute');

Route::get('/api/{userName?}', 'ApiController@displayAvatars')->name('showApi');

