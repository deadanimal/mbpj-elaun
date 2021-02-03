<?php

Route::group(
	[
		'prefix' => 'datuk-bandar',
		'middleware' => [
						'auth',
						'role:3'
						]
					], 
					function () {
	Route::resource('/dashboard','datuk_bandar\dashboardController');
	Route::resource('/bantuan','datuk_bandar\bantuanController');

});