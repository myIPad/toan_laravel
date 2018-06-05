<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facedes\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth')->except('logout');
    }
    public function getlogin(){
        return view('backend.layout.login');
    }

    public function postlogin(LoginRequest $request){
        //dd($request->only('username','password'));
        $auth = array(
                    'username'  =>$request->username,
                    'password'  =>$request->passsword
    );
        if(Auth::attempt($auth)){
            return refirect()->route('admin.cate.getlist')->with('success','Đăng nhập thành công');
        }else{
            return redirect()->back()->with('error','Tài khoản hoặc maatk khẩu không đúng, Vui lòng thử lại ');
        }
    }
}
