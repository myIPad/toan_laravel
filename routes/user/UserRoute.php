<?php
		Route::group(['prefix'=>'user'],function(){
			Route::get('list',['as'=>'admin.user.index','uses'=>'UserController@index']);
			Route::get('add',['as'=>'admin.user.getstore','uses'=>'UserController@create']);
			Route::post('add',['as'=>'admin.user.poststore','uses'=>'UserController@store']);
			Route::get('edit/{id}',['as'=>'admin.user.getedit','uses'=>'UserController@getedit']);
			Route::post('edit/{id}',['as'=>'admin.user.postedit','uses'=>'UserController@update']);
			Route::get('delete/{id}',['as'=>'admin.user.destroy','uses'=>'UserController@destroy']);
		});

