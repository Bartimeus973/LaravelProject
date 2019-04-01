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

Auth::routes(['verify' => true]);

// le middleware verified est utilisé pour vérifier le mail de l'utilisateur

Route::get('/', 'HomeController@index')->middleware('verified')->name('home');
Route::delete('/delete/{avatarId}', 'HomeController@deleteRow')->middleware('verified')->name('deleteAvatar');

Route::get('/upload', 'ImgController@index')->middleware('verified')->name('imgUpload');
Route::post('/upload', 'ImgController@imgUpload')->middleware('verified')->name('formRoute');

Route::get('/api/{userName?}', 'ApiController@displayAvatars')->name('showApi');
