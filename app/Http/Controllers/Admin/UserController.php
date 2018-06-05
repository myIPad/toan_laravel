<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= User::select()->orderBy('id','ASC')->get();
        return view('backend.user.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $product = new User;
        $product->username          = $request->username;
        $product->email             = $request->email;
        $product->password          = Hash::make($request->password);
        $product->level             = $request->level;
        $product->remember_token    = $request->_token;
        $product->save();
        return redirect()->route('admin.login.getlogin')->with(['success'=>'Tạo tài khoản thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * Ngăn người dùng tăng cấp và hạ cấp
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function getedit($id)
    {
        $data = User::find($id);
        if((Auth::user()->id !=1) && ($id == 1 || ($data['level']==1 && Auth::user()->id !=$id))){
            return redirect()->route('admin.user.index')->with(['error'=>'You can\'t Edit this user']);
        }
        return view('backend.user.edit',compact('data','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {

        $user = User::find($id);
       if($request->input('password')){
        $this->validate($request,
        [
            'password'          =>'required',
            'repassword'        =>'same:password'
        ],
        [   
            'password'          =>"Vui lòng nhập mật khẩu mới",
            'repassword.same'   =>'Xác nhận mật khẩu không đúng'
        ]);
        $pass = $request ->input('password');
        $user->password = Hash::make($pass);
       }
        $user->email            = $request->email;
        $user->level            = ($user_current_login= Auth::user())->level;
        $user->remember_token   = $request->input('_token');
        $user->save();
        return redirect()->route('admin.user.index')->with(['success'=>'Cập nhật thành công']);
    }

    /**
     * Remove the specified resource from storage.
     * Ngăn người dùng xóa vượt cấp.
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_current_login= Auth::user()->id;
        $user = User::find($id);
        if(($id==1) ||($user_current_login !=1 && ($user['level'] ==1) || $user['level']==2) ){
                return redirect()->route('admin.user.index')->with(['error'=>'You can\'t Access']);
        }else{
            $user->delete($id);
            return redirect()->route('admin.user.index')->with(['success'=>'Deleted Success']);
        }
    }
}
