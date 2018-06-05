<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('frontend.page.home');
    //return view('welcome');
});
Route::get('demo',function (){
	return view('backend.login.login');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'login'],function(){
		
require_once 	'category/CategoryRoute.php';
require_once 	'product/ProductRoute.php';
require_once 	'user/UserRoute.php';

});
require_once 	'login/LoginRoute.php';

Route::get('/',['as'=>'index','uses'=>'Admin\WellcomeController@index']);
Route::get('loai-san-pham/{id}/{loaisanpham}',['as'=>'loaisanpham','uses'=>'Admin\WellcomeController@loaisanpham']);
Route::any('{all?}',function(){
	return redirect('/');
})->where('all','(.*)');