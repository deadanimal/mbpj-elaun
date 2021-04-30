<?php 

Route::group(
	[
		'prefix' => 'pelulus-pindaan-lulus',
		'middleware' => [
						'auth',
						'role:10'
						]
					], 
					function () {
	Route::resource('/dashboard','pelulus_pindaan_lulus\dashboardController');
	Route::resource('/bantuan','pelulus_pindaan_lulus\bantuanController');

	Route::get('/user/semakan-pekerja/{id}', 'UserController@findUser' );
	Route::put('/tambah-on-call/{id}', 'UserController@addToOnCall' );
	Route::put('/batal-on-call/{id}', 'UserController@removeFromOnCall' );
	Route::get('/ekedatangan/semakan-ekedatangan/{id}', 'EKedatanganController@findEkedatangan' );
	Route::post('/catatan/{id}', 'CatatanController@saveCatatan' ); 
	Route::get('/permohonan-baru/semakan-permohonan/{id}', 'PermohonanBaruController@findPermohonan' );
	Route::post('/permohonan-baru/semakan-kelulusan/{id}', 'PermohonanBaruController@approvedKelulusan' );
	Route::put('/permohonan-baru/tolak-kakitangan/{id}', 'PermohonanBaruController@rejectIndividually' );
	Route::get('/tuntutan-elaun/{id}', 'PermohonanBaruController@findGajiElaun' );
	Route::put('/permohonan-baru/kemaskini/{id}', 'PermohonanBaruController@kemaskiniModal' );
	Route::get('/masa-sebenar/{id}', 'PermohonanBaruController@retrieveMasaSebenar');

});