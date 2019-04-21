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

// routes concernant l'authetification et l'inscription
Auth::routes(['verify' => true]);

// le middleware verified est utilisé pour vérifier le mail de l'utilisateur

// page d'accueil avec affichage des avatars et route de suppression
Route::get('/', 'HomeController@index')->middleware('verified')->name('home');
Route::delete('/delete/{avatarId}', 'HomeController@deleteRow')->middleware('verified')->name('deleteAvatar');

// route formulaire d'upload d'avatar et ajout en base de données
Route::get('/upload', 'ImgController@index')->middleware('verified')->name('imgUpload');
Route::post('/upload', 'ImgController@imgUpload')->middleware('verified')->name('formRoute');

// route de l'API
Route::get('/api/{userName?}', 'ApiController@displayAvatars')->name('showApi');
