<?php
Route::group(['prefix'=>'category'],function(){
			Route::get('list',['as'=>'admin.cate.getlist','uses'=>'CategoryController@getlist']);

			Route::get('delete/{id}',['as'=>'admin.cate.getdelete','uses'=>'CategoryController@delete']);

			Route::get('edit/{id}',['as'=>'admin.cate.getedit','uses'=>'CategoryController@edit']);

			Route::post('edit/{id}',['as'=>'admin.cate.postedit','uses'=>'CategoryController@postedit']);

			Route::get('add',['as'=>'admin.cate.getadd','uses'=>'CategoryController@getadd']);
			
			Route::post('add',['as'=>'admin.cate.postadd','uses'=>'CategoryController@postadd']);
		});