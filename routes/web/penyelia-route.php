<?php

Route::group([
	'prefix' => 'penyelia',
	'middleware' => [
	'auth',
	'role:2'
	]], function () {
	Route::resource('/dashboard','kakitangan\dashboardController',['except' => ['show','destroy']]);
	Route::resource('/category', 'CategoryController', ['except' => ['show']]);
	Route::resource('/tag', 'TagController', ['except' => ['show']]);
	Route::resource('/item', 'ItemController', ['except' => ['show']]);
	Route::resource('/role', 'RoleController', ['except' => ['show', 'destroy']]);
	Route::resource('/user', 'UserController', ['except' => ['show']]);
	Route::resource('/semakan','kakitangan\semakanController',['except' => ['show','destroy']]);
	Route::group(['prefix' => 'semakan'], function () {
		Route::get('/{user_id}', [
			'uses' => 'kakitangan\semakanController@show',
			'as'   => 'semakan.show',
		]);
		Route::get('/semak-permohonan/{user_id}', [
			'uses' => 'kakitangan\semakanController@showModal',
			'as'   => 'semakan.showModal',
		]);
		Route::put('/hantar-permohonan/{user_id}', [
			'uses' => 'kakitangan\semakanController@update',
			'as'   => 'semakan.update',
		]);
		Route::put('/delete-permohonan/{id}',[
			'uses' => 'kakitangan\semakanController@destroy',
			'as' => 'semakan.destroy',
		]);
	});
	Route::resource('/bantuan','kakitangan\bantuanController',['except' => ['show','destroy']]);
	Route::resource('/tuntutan','kakitangan\tuntutanController',['except' => ['show','destroy']]);
	Route::group(['prefix' => 'tuntutan'], function () {
		Route::put('/hantar-tuntutan/{user_id}', [
			'uses' => 'kakitangan\tuntutanController@update',
			'as'   => 'tuntutan.update',
		]);
		Route::put('/delete-permohonan/{id}',[
			'uses' => 'kakitangan\tuntutanController@destroy',
			'as' => 'tuntutan.destroy',
		]);
	});
	Route::resource('/laporan','kakitangan\laporanController',['except' => ['show','destroy']]);
	Route::resource('/permohonan-baru','kakitangan\permohonanController',['except' => ['store']]);
	Route::group(['prefix' => 'permohonan-baru'], function () {
		Route::get('/{user_id}', [
			'uses' => 'kakitangan\permohonanController@show',
			'as'   => 'permohonan-baru.show',
		]);
		Route::get('/semak-permohonan/{id}',[
			'uses' => 'kakitangan\permohonanController@findPermohonan',
			'as' => 'permohonan-baru.findPermohonan',
		]);
		Route::post('/hantar-permohonan',[
			'uses' => 'kakitangan\permohonanController@store',
			'as' => 'permohonan-baru.store',
		]);
		Route::put('/delete-permohonan/{id}',[
			'uses' => 'kakitangan\permohonanController@destroy',
			'as' => 'permohonan-baru.destroy',
		]);
	});

	Route::resource('penyelia-dashboard','penyelia\penyeliaController',['except' => ['show','destroy']]);
	Route::resource('penyelia-semakan','penyelia\semakanController',['except' => ['destroy']]);
	Route::resource('penyelia-laporan','penyelia\laporanController',['except' => ['show','destroy']]);
	Route::resource('penyelia-bantuan','penyelia\bantuanController',['except' => ['show','destroy']]);

	Route::resource('/bantuan/aduan', 'AduanController' );
	
	Route::get('/user/semakan-pekerja/{id}', 'UserController@findUser' );
	Route::get('/ekedatangan/semakan-ekedatangan/{id}', 'EKedatanganController@findEkedatangan' );
	Route::post('/permohonan-baru/semakan-kelulusan/{id}', 'PermohonanBaruController@approvedKelulusan' );
	Route::post('/catatan/{id}', 'CatatanController@saveCatatan' ); 
	Route::get('/permohonan-baru/semakan-permohonan/{id}', 'PermohonanBaruController@findPermohonan' );

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::get('profile/{link}',function(){
		return view('profile.index',['link'=>$link]);
	});
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});