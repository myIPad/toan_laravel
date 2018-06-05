<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                    'name'        =>'required|unique:products,name',
                    'parent'      =>'required',
                    'price'       =>'required|integer',
                    'image'       =>'required|image',
                    'keywords'    => 'required',
                    'description' => 'required'
        ];
    }
    public function messages(){
        return [
                    'name.required'   =>'Bạn chưa nhập tên sản phẩm',
                    'parent.required' =>'Bạn chưa nhập danh mục sản phẩm',
                    'name.unique'     =>'Tên sản phẩm đã tồn tại',
                    'price.required'  =>'Bạn chưa nhập giá của sản phẩm',
                    'price.integer'  =>'Không đúng định dạng, vui lòng nhập lại giá sản phẩm',
                    'image.required'  =>'Bạn chưa đăng hình ảnh của sản phẩm',
                    'image.image'     =>'Đây không phải format ảnh, Vui lòng chọn lại',
                    'keywords.required'=> 'Bạn chưa nhập dữ ở keywords',
                    'description.required'=> 'Bạn chưa nhập dữ liệu ở description'
        ];
    }
}
