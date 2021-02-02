<?php 

Route::group([
	'prefix' => 'kakitangan',
	'middleware' => [
	'auth',
	'role:8'
	]], function () {
	Route::resource('/dashboard','kakitangan\dashboardController',['except' => ['show','destroy']]);
	Route::resource('/category', 'CategoryController', ['except' => ['show']]);
	Route::resource('/tag', 'TagController', ['except' => ['show']]);
	Route::resource('/item', 'ItemController', ['except' => ['show']]);
	Route::resource('/role', 'RoleController', ['except' => ['show', 'destroy']]);
	Route::resource('/user', 'UserController', ['except' => ['show']]);
	Route::resource('/semakan','kakitangan\semakanController',['except' => ['show','destroy']]);
	Route::resource('/bantuan','kakitangan\bantuanController',['except' => ['show','destroy']]);
	Route::resource('/tuntutan','kakitangan\tuntutanController',['except' => ['show','destroy']]);
	Route::resource('/laporan','kakitangan\laporanController',['except' => ['show','destroy']]);
	Route::resource('/permohonan-baru','kakitangan\permohonanController',['except' => ['show','destroy']]);
	Route::group(['prefix' => 'permohonan-baru'], function () {
		Route::get('/{user_id}', [
			'uses' => 'kakitangan\permohonanController@show',
			'as'   => 'permohonan-baru.show',
		]);
		Route::get('#permohonan-individu',[
			'uses' => 'kakitangan\permohonanController@getPermohonanIndividu',
			'as'   => 'permohonanbaru.individu'
		]);
		Route::get('#permohonan-berkumpulan',[
			'uses' => 'kakitangan\permohonanController@getPermohonanBerkumpulan',
			'as'   => 'permohonanbaru.berkumpulan'
		]);
	});

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::get('profile/{link}',function(){
		return view('profile.index',['link'=>$link]);
	});
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});