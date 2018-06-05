<?php
Route::group(['prefix'=>'login','namespace'=>'Admin'],function(){
			Route::get('auth',['as'=>'admin.login.getlogin','uses'=>'AuthController@getlogin']);
			Route::post('auth',['as'=>'admin.login.postlogin','uses'=>'AuthController@postlogin']);
			Route::get('logout',['as'=>'admin.login.getlogout','uses'=>'AuthController@getlogout']);

	});