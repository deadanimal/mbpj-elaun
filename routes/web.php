<?php

use Illuminate\Support\Facades\Auth;

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
	if (Auth::check()) {
		$roleUserLower = strtolower(Auth::user()->role->name);
		$roleUser = str_replace(" ","-", $roleUserLower);

		return redirect('/'.$roleUser.'/dashboard');
	} else {
		return view('auth.login');
	}
})->name('welcome');

Route::view('inactive', 'inactive-page');

Auth::routes();





