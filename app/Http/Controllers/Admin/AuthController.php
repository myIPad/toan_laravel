<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Auth;

class AuthController extends Controller
{

    public function getlogin(){
    	return view('backend.login.login');
    }
    public function postlogin( LoginRequest $request){
    	$auth = array(
    		'username'=>$request->username,
    		'password'=>$request->password
    	);
    	if(Auth::attempt($auth)){
    		return redirect()->route('admin.user.index')->with('success','Đăng nhập thành công');
    	}else{
    		return redirect()->back();
    	}
    }
    public function getlogout(){
    	Auth::logout();
    	return redirect()->route('admin.login.getlogin');
    }
}
