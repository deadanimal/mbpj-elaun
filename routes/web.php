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
|
| Refer app/Http/Providers/RouteServiceProvider.php
|
*/
 
Route::get('/', function () {
	return view('auth.login');
})->name('welcome');

Route::view('inactive', 'inactive-page');

Auth::routes();





