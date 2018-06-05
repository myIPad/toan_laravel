<?php

namespace App\http\Controllers\Admin;

use App\Models\product;
use App\Models\category;
use App\Models\Product_image;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Auth;



class ProductController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::select('id','name','keywords','price','cate_id','created_at')->orderBy('id','DESC')->paginate(10);
        return view('backend.product.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent = Category::select('id','name','parent_id')->get()->toArray();
        return view('backend.product.add',compact('parent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( ProductRequest $request)
    {
        $user       = Auth::user()->id;
        $img        = $request->file('image');
        $image_name = $img->getClientOriginalName();
        $product    = new Product;
        $product->name              = $request->name;
        $product->alias             = changeTitle($request->name);
        $product->price             = $request->price;
        $product->intro             = $request->intro;
        $product->content           = $request->content;
        $product->image             = $image_name;
        $product->keywords          = $request->keywords;
        $product->description       = $request->description;
        $product->user_id           = $user;
        $product->cate_id           = $request->parent;
        $img->move('public/uploads/', $image_name);
        $product->save();
         //$product_id = $product->id;
        //  if (Input::hasFile('Productdetail')){
        //     foreach (Input::File('Productdetail') as $value){
        //         $product_img = new Product_image();
        //             if (isset($value)) {
        //             $product_img->fimage = $value->getClientOriginalName();
        //             //$product_img->product_id = $product_id;
        //             $value->move('public/uploads/detail/', $value->getClientOriginalName());
        //             $product_img->save();
        //             }
        //     }
        // }
            return redirect()->route('admin.product.index')->with(['success'=>'Thêm sản phẩm thành công']);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parent = Category::select('id','name','parent_id')->get()->toArray();
        $product = Product::find($id);
        return view('backend.product.edit',compact('product','parent'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $product        = Product::find($id);
        $user           = Auth::user()->id;
        $img            = $request->file('image');
        $image_name     = $img->getClientOriginalName();
        $product->name              = $request->name;
        $product->alias             = changeTitle($request->name);
        $product->price             = $request->price;
        $product->intro             = $request->intro;
        $product->content           = $request->content;
        $product->image             = $image_name;
        $product->keywords          = $request->keywords;
        $product->description       = $request->description;
        $product->user_id           = $user;
        $product->cate_id           = $request->parent;
        $product->save();
        $img->move_uploaded_file('public/uploads/',$image_name);
        return redirect()->route('admin.product.index')->with(['success'=>'Cập nhật sản phẩm thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // $product_detail = Product::find($id)->fimage;
        // foreach ($product_detail as $value) {
        //     File::delete('public/uploads/product/'.$value['fimage']);
        // }
        $product = Product::find($id);
        File::delete('public/uploads/'.$product->image);
        $product->delete($id);
        return redirect()->route('admin.product.index')->with(['success'=>'Xóa sản phẩm thành công']);
    }
}
