<?php
Route::group([
	'prefix' => 'kerani-pemeriksa',
	'middleware' => [
	'auth',
	'role:7'
	]], function () {
	Route::resource('/dashboard','kakitangan\dashboardController',['except' => ['destroy']]);
	Route::resource('/user', 'UserController', ['except' => ['show']]);
	Route::resource('/semakan','kakitangan\semakanController',['except' => ['show','destroy']]);
	Route::group(['prefix' => 'permohonan-baru'], function () {
		Route::get('/get-permohonan/{user_id}', [
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
		Route::put('/kemaskini-permohonan/{id}',[
			'uses' => 'kakitangan\permohonanController@update',
			'as' => 'permohonan-baru.update',
		]);
		Route::put('/delete-permohonan/{id}',[
			'uses' => 'kakitangan\permohonanController@destroy',
			'as' => 'permohonan-baru.destroy',
		]);
		Route::post('/pegawai',[
			'uses' 	=> 'kakitangan\permohonanController@pegawai',
			'as'	=> 'permohonan-baru.pegawai',
		]);
	});
	Route::resource('/bantuan','kakitangan\bantuanController',['except' => ['show','destroy']]);
	Route::resource('/tuntutan','kakitangan\tuntutanController',['except' => ['show','destroy']]);
	Route::group(['prefix' => 'tuntutan'], function () {
		Route::put('/hantar-tuntutan/{user_id}', [
			'uses' => 'kakitangan\tuntutanController@update',
			'as'   => 'tuntutan.update',
		]);
	});
	Route::resource('/laporan','kakitangan\laporanController',['except' => ['show','destroy']]);
	Route::resource('/permohonan-baru','kakitangan\permohonanController',['except' => ['store','destroy']]);
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
	});

	Route::put('/semakan/masa-sebenar/{id}', 'PermohonanBaruController@saveMasaSebenar');

	Route::resource('kerani-pemeriksa-dashboard','kerani_pemeriksa\keraniPemeriksaController',['except' => ['destroy']]);
	Route::resource('kerani-pemeriksa-semakan','kerani_pemeriksa\semakanController',['except' => ['destroy']]);
	Route::resource('kerani-pemeriksa-laporan','kerani_pemeriksa\laporanController',['except' => ['show','destroy']]);
	Route::resource('kerani-pemeriksa-bantuan','kerani_pemeriksa\bantuanController',['except' => ['show','destroy']]);

	Route::get('/user/semakan-pekerja/{id}', 'UserController@findUser' );
	Route::get('/ekedatangan/semakan-ekedatangan/{id}', 'EKedatanganController@findEkedatangan' );
	Route::put('/catatan/{id}', 'CatatanController@saveCatatan' ); 
	Route::get('/permohonan-baru/semakan-permohonan/{id}', 'PermohonanBaruController@findPermohonan' );
	Route::post('/permohonan-baru/semakan-kelulusan/{id}', 'PermohonanBaruController@approvedKelulusan' );
	Route::put('/permohonan-baru/tolak-kakitangan/{id}', 'PermohonanBaruController@rejectIndividually' );
	Route::get('/tuntutan-elaun/{id}', 'PermohonanBaruController@findGajiElaun' );
	Route::put('/permohonan-baru/kemaskini/{id}', 'PermohonanBaruController@kemaskiniModal' );
	Route::get('/masa-sebenar/{id}', 'PermohonanBaruController@retrieveMasaSebenar');

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::get('profile/{link}',function(){
		return view('profile.index',['link'=>$link]);
	});
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});