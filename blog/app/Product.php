<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'product';
	
	protected $fillable = [
			'category_id',
			'product_name',
			'product_qty',
			'price',
			'reduced_price',			
			'brand_id',
			'product_desc',
			'product_image',
	];
	
	
 	public function category() {
        return $this->hasOne('App\Category', 'category_id');
    }
    
    public function brand() {
    	return $this->belongsTo('App\Brand');
    }
    
}
