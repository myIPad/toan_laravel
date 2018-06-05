<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{
	protected $table = 'product_images';

    protected $fillable = ['id','fimage','product_id'];
    public $timestamps = false;

    public function product(){
    	return $this->belongTo('App\Models\Product');
    }

}
