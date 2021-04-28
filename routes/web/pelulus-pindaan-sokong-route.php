<?php 

Route::group(
	[
		'prefix' => 'pelulus-pindaan-sokong',
		'middleware' => [
						'auth',
						'role:9'
						]
					], 
					function () {
	Route::resource('/dashboard','pelulus_pindaan_sokong\dashboardController');
	Route::resource('/bantuan','pelulus_pindaan_sokong\bantuanController');

});