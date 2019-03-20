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
Route::get('/inscription')->uses('Navigation@inscription')->name('inscription');
Route::get('/accueil')->uses('Navigation@accueil')->name('accueil');
Route::get('/gestion')->uses('Navigation@gestion')->name('gestion');
