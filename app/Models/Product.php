<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name','alias','price','intro','content','image','keywords','description','user_id','cate_id'];
     // public $timestamps = false;

    public function cate(){

    	return $this->belongTo('App\Category');

    }

    public function product_image(){

    	return $this->hasMany('App\Models\Product_image');
    }

    public function user(){
    	return $this->belongTo('App\Models\User');
    }
}
