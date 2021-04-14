<?php 

Route::group([
	'prefix' => 'kakitangan',
	'middleware' => [
	'auth',
	'role:8'
	]], function () {
	Route::resource('/dashboard','kakitangan\dashboardController',['except' => ['destroy']]);
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
	});
	Route::resource('/bantuan','kakitangan\bantuanController',['except' => ['show','destroy']]);
	Route::resource('/tuntutan','kakitangan\tuntutanController',['except' => ['show','destroy']]);
	Route::group(['prefix' => 'tuntutan'], function () {
		Route::put('/hantar-tuntutan/{user_id}', [
			'uses' => 'kakitangan\tuntutanController@update',
			'as'   => 'tuntutan.update',
		]);
		Route::get('/kemaskini-tuntutan/{user_id}', [
			'uses' => 'kakitangan\tuntutanController@show',
			'as'   => 'tuntutan.show',
		]);
	});
	Route::resource('/laporan','kakitangan\laporanController',['except' => ['show','destroy']]);
	Route::group(['prefix' => 'laporan'], function () {
		Route::post('/statistics',[
			'uses' => 'kakitangan\laporanController@getStatistics',
			'as' => 'laporan.getStatistics'
		]);
	});
	Route::resource('/permohonan-baru','kakitangan\permohonanController',['except' => ['store','destroy']]);
	Route::group(['prefix' => 'permohonan-baru'], function () {
		Route::get('/get-permohonan/{user_id}', [
			'uses' => 'kakitangan\permohonanController@show',
			'as'   => 'permohonan-baru.show',
		]);
		Route::get('/semak-permohonan/{id}',[
			'uses' => 'kakitangan\permohonanController@findPermohonan',
			'as' => 'permohonan-baru.findPermohonan',
		]);
		Route::put('/delete-permohonan/{user_id}', [
			'uses' => 'kakitangan\permohonanController@destroy',
			'as'   => 'permohonan-baru.delete',
		]);
		Route::put('/kemaskini-permohonan/{user_id}', [
			'uses' => 'kakitangan\permohonanController@update',
			'as'   => 'permohonan-baru.update',
		]);
		Route::post('/hantar-permohonan',[
			'uses' => 'kakitangan\permohonanController@store',
			'as' => 'permohonan-baru.store',
		]);
		Route::post('/pegawai',[
			'uses' 	=> 'kakitangan\permohonanController@pegawai',
			'as'	=> 'permohonan-baru.pegawai',
		]);
	});

	Route::get('/ekedatangan/semakan-ekedatangan/{id}', 'EKedatanganController@findEkedatangan' );
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::get('profile/{link}',function(){
		return view('profile.index',['link'=>$link]);
	});
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});