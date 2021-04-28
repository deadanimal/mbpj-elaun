<?php 

Route::group(
	[
		'prefix' => 'pelulus-pindaan-pelulus',
		'middleware' => [
						'auth',
						'role:10'
						]
					], 
					function () {
	Route::resource('/dashboard','pelulus_pindaan_pelulus\dashboardController');
	Route::resource('/bantuan','pelulus_pindaan_pelulus\bantuanController');

});