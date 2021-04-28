<?php 

Route::group(
	[
		'prefix' => 'pelulus-pindaan-sah',
		'middleware' => [
						'auth',
						'role:9'
						]
					], 
					function () {
	Route::resource('/dashboard','pelulus_pindaan_sah\dashboardController');
	Route::resource('/bantuan','pelulus_pindaan_sah\bantuanController');

});