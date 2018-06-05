<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class WellcomeController extends Controller
{
	public function index(){
		$data = DB::table('products')->select('id','name','image','price','alias','keywords')->orderBy('id', 'DESC')->paginate(16);
		return view('frontend.page.home',compact('data'));
	}

    public function loaisanpham($id){
    	$product_cate = DB::table('products')->select('id','name','image','price','alias','keywords','cate_id')->where('cate_id', $id)->paginate(16);
    	return view('frontend.page.cate',compact('product_cate'));
    }
}
