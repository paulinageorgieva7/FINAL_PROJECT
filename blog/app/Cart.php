<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cart extends Model
{
	protected $table = 'carts';

	protected $fillable = [
			'user_id', 'product_id', 'qty', 'total',
	];
	
	
	/**
	 * A Product belongs to a Cart
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function Product() {
		return $this->belongsTo('App\Product', 'product_id');
	}
	
	
	/**
	 * A Cart belongs to a User
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function User() {
		return $this->belongsTo('App\User', 'user_id');
	}
}