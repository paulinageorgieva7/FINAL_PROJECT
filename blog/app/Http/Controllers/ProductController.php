<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

class ProductController extends Controller
{
	public function show($product_id)
	{
		$product = DB::table('product')->where('product_id', '=', $product_id)->get();
		return view('showProduct', ['product' => $product]);
		 
	}
	
	
	
}
