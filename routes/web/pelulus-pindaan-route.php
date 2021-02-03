<?php 

Route::group(
	[
		'prefix' => 'pelulus-pindaan',
		'middleware' => [
						'auth',
						'role:9'
						]
					], 
					function () {
	Route::resource('/dashboard','pelulus_pindaan\dashboardController');
	Route::resource('/bantuan','pelulus_pindaan\bantuanController');

});