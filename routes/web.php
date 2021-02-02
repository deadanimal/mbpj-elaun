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

Auth::routes();

Route::group([
	'prefix' => 'pentadbir-sistem',
	'middleware' => [
	'auth',
	'role:1'
	]], function () {
	Route::resource('/dashboard','pentadbir_sistem\dashboardController',['except' => ['show','destroy']]);
	Route::resource('/category', 'CategoryController', ['except' => ['show']]);
	Route::resource('/tag', 'TagController', ['except' => ['show']]);
	Route::resource('/item', 'ItemController', ['except' => ['show']]);
	Route::resource('/role', 'RoleController', ['except' => ['show', 'destroy']]);
	Route::resource('/user', 'UserController', ['except' => ['show']]);
	Route::resource('/semakan','kakitangan\semakanController',['except' => ['show','destroy']]);
	Route::resource('/modul-aduan','pentadbir_sistem\modulAduanController',['except' => ['show','destroy']]);
	Route::resource('/tuntutan','kakitangan\tuntutanController',['except' => ['show','destroy']]);
	Route::resource('/modul-laporan','pentadbir_sistem\modulLaporanController',['except' => ['show','destroy']]);
	Route::resource('/pengurusan-pengguna','pentadbir_sistem\pengurusanPenggunaController',['except' => ['show','destroy']]);
	Route::group(['prefix' => 'permohonan-baru'], function () {
		Route::get('/{user_id}', [
			'uses' => 'kakitangan\permohonanController@show',
			'as'   => 'permohonan-baru.show',
		]);
	});
	// Route::resource('penyelia-dashboard','penyelia\penyeliaController',['except' => ['show','destroy']]);
	// Route::resource('penyelia-semakan','penyelia\semakanController',['except' => ['show','destroy']]);
	// Route::resource('penyelia-laporan','penyelia\laporanController',['except' => ['show','destroy']]);
	// Route::resource('penyelia-bantuan','penyelia\bantuanController',['except' => ['show','destroy']]);

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::get('profile/{link}',function(){
		return view('profile.index',['link'=>$link]);
	});
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});

Route::group([
	'prefix' => 'kakitangan',
	'middleware' => [
	'auth',
	'role:8'
	]], function () {
	Route::resource('/dashboard','kakitangan\dashboardController',['except' => ['show','destroy']]);
	Route::resource('/category', 'CategoryController', ['except' => ['show']]);
	Route::resource('/tag', 'TagController', ['except' => ['show']]);
	Route::resource('/item', 'ItemController', ['except' => ['show']]);
	Route::resource('/role', 'RoleController', ['except' => ['show', 'destroy']]);
	Route::resource('/user', 'UserController', ['except' => ['show']]);
	Route::resource('/semakan','kakitangan\semakanController',['except' => ['show','destroy']]);
	Route::resource('/bantuan','kakitangan\bantuanController',['except' => ['show','destroy']]);
	Route::resource('/tuntutan','kakitangan\tuntutanController',['except' => ['show','destroy']]);
	Route::resource('/laporan','kakitangan\laporanController',['except' => ['show','destroy']]);
	Route::resource('/permohonan-baru','kakitangan\permohonanController',['except' => ['show','destroy']]);
	Route::group(['prefix' => 'permohonan-baru'], function () {
		Route::get('/{user_id}', [
			'uses' => 'kakitangan\permohonanController@show',
			'as'   => 'permohonan-baru.show',
		]);
		Route::get('#permohonan-individu',[
			'uses' => 'kakitangan\permohonanController@getPermohonanIndividu',
			'as'   => 'permohonanbaru.individu'
		]);
		Route::get('#permohonan-berkumpulan',[
			'uses' => 'kakitangan\permohonanController@getPermohonanBerkumpulan',
			'as'   => 'permohonanbaru.berkumpulan'
		]);
	});

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::get('profile/{link}',function(){
		return view('profile.index',['link'=>$link]);
	});
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});


Route::group(
	[
		'prefix' => 'datuk-bandar',
		'middleware' => [
						'auth',
						'role:3'
						]
					], 
					function () {
	Route::resource('/dashboard','datuk_bandar\dashboardController');
	Route::resource('/bantuan','datuk_bandar\bantuanController');

});

Route::group(
	[
		'prefix' => 'pelulus-pindaan',
		'middleware' => [
						'auth',
						'role:9'
						]
					], 
					function () {
	Route::resource('/dashboard','pelulus_pindaan\dashboardController');
	Route::resource('/bantuan','pelulus_pindaan\bantuanController');

});




