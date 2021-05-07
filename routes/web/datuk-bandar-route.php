<?php

Route::group(
	[
		'prefix' => 'datuk-bandar',
		'middleware' => [
							'auth',
							'active',
							'role:3'
						]
	], 
	function () {
		Route::get('/', function () {
			$roleUserLower = strtolower(Auth::user()->role->name);
			$roleUser = str_replace(" ","-", $roleUserLower);
	
			return redirect('/'.$roleUser.'/dashboard');
		});
		
		Route::resource('/dashboard','datuk_bandar\dashboardController');
		Route::resource('/bantuan','datuk_bandar\bantuanController');

		Route::get('/user/semakan-pekerja/{id}', 'UserController@findUser');
		Route::get('/ekedatangan/semakan-ekedatangan/{id}', 'EKedatanganController@findEkedatangan');
		Route::post('/permohonan-baru/semakan-kelulusan/{id}', 'PermohonanBaruController@approvedKelulusan');
		Route::put('/catatan/{id}', 'CatatanController@saveCatatan'); 
		Route::get('/permohonan-baru/semakan-permohonan/{id}', 'PermohonanBaruController@findPermohonan');
});