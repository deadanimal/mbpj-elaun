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

});