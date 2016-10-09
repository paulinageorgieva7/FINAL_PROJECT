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
        return $this->hasOne('App\Category', 'categosr_id');
    }
    
    public function brand() {
    	return $this->belongsTo('App\Brand');
    }
    
    public static function ProductLocatedAt($product_name) {
    	return static::where(compact('product_name'))->firstOrFail();
    }
    
}
