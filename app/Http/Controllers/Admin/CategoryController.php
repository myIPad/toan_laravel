<?php

namespace App\http\controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getlist()
    {
        $data = Category::select('id','name','parent_id')->orderBy('id','ASC')->get();
        return view('backend.category.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getadd()
    {
        $parent = Category::select('id','name','parent_id')->get()->toArray();
        return view('backend.category.add',compact('parent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postadd(CategoryRequest $request)
    {

        $data               = new Category;
        $data->name         = $request->name;
        $data->alias        = changeTitle($request->name);
        $data->order        = $request->order;
        $data->parent_id    = $request->parent_id;
        $data->keywords     = $request->keywords;
        $data->descriptions = $request->descriptions;
        $data->save();
        return redirect()->route('admin.cate.getlist')->with(['success'=>'Thêm thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = Category::findOrFail($id)->toArray();
        $parent = Category::select('id','name','parent_id')->get()->toArray();
        return view('backend.category.edit',compact('parent','data','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function postedit($id, Request $request)
    {
        $data = Category::find($id);
        $data->name         = $request->name;
        $data->alias        = changeTitle($request->name);
        $data->order        = $request->order;
        $data->parent_id    = $request->parent_id;
        $data->keywords     = $request->keywords;
        $data->descriptions = $request->descriptions;
        $data->save();
        return redirect()->route('admin.cate.getlist')->with(['success'=>"Cập nhật thành công"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $parent = Category::where('parent_id',$id)->count();
        if ($parent == 0) {
        $data = Category::find($id);
        $data->delete();
        return redirect()->route('admin.cate.getlist')->with(['success'=>"Xóa thành công"]);
        }else{
            return redirect()->route('admin.cate.getlist')->with(['error'=>"Bạn không xóa được mục này"]);
        }
        
    }

}
