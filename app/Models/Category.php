<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table 	= 'categorys';

    protected $fillable = ['id','name','alias','order','parent_id','keywords','descriptions'];
 	public $timestamps = false;

    public function product(){
    	return $this->hasMany('App\Models\Product');
    }
}
