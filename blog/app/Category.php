<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
 	protected $table = 'category';
	
	protected $fillable = ['category'];
	
/* 	public function parent() {
		return $this->belongsTo('App\Category', 'main_category');
	}
	
	public function children() {
		return $this->hasMany('App\Category', 'main_category');
	}
	
 	public function product() {
        return $this->hasMany('App\Product', 'id');
    } */
}
