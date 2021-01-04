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
	return view('pages.welcome');
})->name('welcome');

Auth::routes();

Route::get('dashboard', 'HomeController@index')->name('home');
Route::get('pricing', 'PageController@pricing')->name('page.pricing');
Route::get('lock', 'PageController@lock')->name('page.lock');
Route::get('charts',function(){
	return view('pages.charts');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('category', 'CategoryController', ['except' => ['show']]);
	Route::resource('tag', 'TagController', ['except' => ['show']]);
	Route::resource('item', 'ItemController', ['except' => ['show']]);
	Route::resource('role', 'RoleController', ['except' => ['show', 'destroy']]);
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::resource('semakan','semakanController',['except' => ['show','destroy']]);
	Route::resource('bantuan','bantuanController',['except' => ['show','destroy']]);
	Route::resource('tuntutan','tuntutanController',['except' => ['show','destroy']]);
	Route::resource('laporan','laporanController',['except' => ['show','destroy']]);
	Route::resource('permohonan-baru','permohonanController',['except' => ['show','destroy']]);
	Route::group(['prefix' => 'permohonan-baru'], function () {
		Route::get('/{user_id}', [
			'uses' => 'permohonanbaruController@show',
			'as'   => 'permohonanbaru.show',
		]);
	});
	Route::resource('penyelia-dashboard','penyeliaController',['except' => ['show','destroy']]);
	Route::get('penyelia-semakan',['as' => 'penyelia.semakan', 'uses' => 'penyeliaController@index2']);

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::get('profile/{link}',function(){
		return view('profile.index',['link'=>$link]);
	});
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});




