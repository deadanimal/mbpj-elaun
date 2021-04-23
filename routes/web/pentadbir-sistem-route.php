<?php 

Route::group([
	'prefix' => 'pentadbir-sistem',
	'middleware' => [
	'auth',
	'role:1'
	]], function () {
	Route::resource('/dashboard','pentadbir_sistem\dashboardController',['except' => ['show','destroy']]);
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

	Route::put('/kemaskini-pengguna/{id}', 'UserController@kemaskiniPenggunaAdmin' );

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::get('profile/{link}',function(){
		return view('profile.index',['link'=>$link]);
	});
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});