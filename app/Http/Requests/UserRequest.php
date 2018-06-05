<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username'      =>'required|unique:users,username',
            'email'         =>'required|regex:/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/',
            'password'      =>'required|',
            'repassword'    =>'required|same:password',
            'level'         =>'required|'
        ];
    }

    public function messages(){
        return [
                    'username.required'         =>'Vui lòng nhập username',
                    'username.unique'           =>'Têm đăng nhập đã được đăng ký',
                    'email.required'            =>'Vui lòng nhập email',
                    'email.unique'              =>'Têm email đã được đăng ký',
                    'password.required'         =>'Bạn chưa nhập mật khẩu đăng nhập',
                    'repassword.same'           =>'Mật khẩu xác nhận không trùng, Vui lòng nhập lại',
                    'repassword.required'       =>'Bạn chưa xác nhận lại mật khẩu'
    
                ];
    }
}
