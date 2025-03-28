<?php

Route::group([
	'prefix' => 'penyelia',
	'middleware' => [
	'auth',
	'active',
	'role:2'
	]], function () {
	Route::get('/', function () {
		$roleUserLower = strtolower(Auth::user()->role->name);
		$roleUser = str_replace(" ","-", $roleUserLower);

		return redirect('/'.$roleUser.'/dashboard');
	});
	
	Route::resource('/dashboard','kakitangan\dashboardController',['except' => ['destroy']]);
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
		Route::post('/statistics',[
			'uses' => 'kakitangan\tuntutanController@getStatistics',
			'as' => 'tuntutan.statistics',
		]);
	});
	Route::resource('/laporan','kakitangan\laporanController',['except' => ['show','destroy']]);
	Route::resource('/permohonan-baru','kakitangan\permohonanController',['except' => ['show','store']]);
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
		Route::post('/init-date',[
			'uses' => 'kakitangan\permohonanController@getOncall',
			'as' => 'permohonan-baru.getOncall',
		]);
		Route::post('/pegawai',[
			'uses' 	=> 'kakitangan\permohonanController@pegawai',
			'as'	=> 'permohonan-baru.pegawai',
		]);
	});

	Route::put('/semakan/masa-sebenar/{id}', 'PermohonanBaruController@saveMasaSebenar');

	Route::resource('penyelia-dashboard','penyelia\penyeliaController',['except' => ['destroy']]);
	Route::resource('penyelia-semakan','penyelia\semakanController',['except' => ['destroy']]);
	Route::resource('penyelia-laporan','penyelia\laporanController',['except' => ['show','destroy']]);
	Route::resource('penyelia-bantuan','penyelia\bantuanController',['except' => ['show','destroy']]);
	Route::resource('penyelia-on-call','penyelia\senaraiOnCallController', ['except' => ['destroy']]);

	Route::resource('/bantuan/aduan', 'AduanController' );
	
	Route::get('/user/semakan-pekerja/{id}', 'UserController@findUser' );
	Route::put('/tambah-on-call/{id}', 'UserController@addToOnCall' );
	Route::put('/batal-on-call/{id}', 'UserController@removeFromOnCall' );
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