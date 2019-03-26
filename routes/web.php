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
/*
Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/inscription')->uses('Inscription@entree')->name('inscription');
Route::get('/accueil')->uses('Accueil@entree')->name('accueil');
Route::get('/identification')->uses('Identification@entree')->name('identification');
Route::get('/gestion')->uses('Gestion@entree')->name('gestion');

Route::post('/inscription', 'Inscription@sortie')->name('inscriptionPost');
Route::post('/identification', 'Identification@sortie')->name('identificationPost');