<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Cart;
use Illuminate\Support\Facades\View;


class CartController extends Controller
{
	public function addCart(Request $request)
	{
	
		if (isset(Auth::user()->id)) {
			$user_id = Auth::user()->id;
		} else {
			return redirect()->route('login');
		}

		$product_id = (int)Input::get('product');

		$qty = (int)Input::get('qty');

		$product = DB::table('product')->where('product_id', '=', $product_id)->get();


		if ($product[0]->reduced_price == 0) {
			$total = $qty * $product[0]->price;
		} else {
			$total = $qty * $product[0]->reduced_price;
		}

		$product_qty = $product[0]->product_qty;
	
		if ($product_qty >= $qty) {
			
			$product = DB::table('product')
				->where('product_id', $product_id)
				->update(['product_qty' => $product_qty - $qty]);
		
			Cart::create(
				array (
						'user_id'    => $user_id,
						'product_id' => $product_id,
						'qty'        => $qty,
						'total'      => $total
				)
			);
		}
		
		$carts = DB::table('carts')->get();

		return redirect('cart');		
	}
	
	public function showCart() {
	
		$user_id = Auth::user()->id;
	
		$cart_product = Cart::where('user_id', '=', $user_id)
			->join('product', 'carts.product_id', '=', 'product.product_id')
			->get();
			
		$cart_sum = Cart::where('user_id', '=', $user_id)
			->selectRaw('sum(total) as sum_total')
			->selectRaw('sum(qty) as sum_qty')
			->join('product', 'carts.product_id', '=', 'product.product_id')
			->groupBy('carts.product_id')
			->get();
		
		$count = Cart::where('user_id', '=', $user_id)->count();
		
		$cart_total = Cart::with('total')->where('user_id', '=', $user_id)->sum('total');
		
		$category_DB = DB::table('category')->get();
		
	       
		return view('showCart', compact('count', 'cart_total'))
				->with('cart_product', $cart_product)
				->with('category_DB', $category_DB);
	}
	
	public function deleteCart($cart_id)
	{

		$cart_qty = DB::table('carts')
			->select('qty')
			->where('cart_id', '=', $cart_id)
			->get();
			
		$cart_product = DB::table('carts')
			->select('product_id')
			->where('cart_id', '=', $cart_id)
			->get();

		
		$product_qty = DB::table('product')
			->select('product_qty')
			->where('product_id', $cart_product[0]->product_id)
			->get();

		$sumQty = $product_qty[0]->product_qty + $cart_qty[0]->qty;
		$product = DB::table('product')
			->where('product_id', $cart_product[0]->product_id)
			->update(['product_qty' => $sumQty]);
		  

		$cart_product_del = Cart::where('cart_id', '=', $cart_id)
			->delete();
		
		return redirect()->back();
	}
	
/* 	public function cartInfo(Request $request)
	{		
		if (isset(Auth::user()->id)) {
			$user_id = Auth::user()->id;
		} else {
			return redirect()->route('login');
		}
		
		$count = Cart::where('user_id', '=', $user_id)->count();
		
		$cart_total = Cart::with('total')->where('user_id', '=', $user_id)->sum('total');
		
		$session = $request->session()->put('count', $count);
		$session = $request->session()->put('cart_total', $cart_total);
		
		return view('layouts.app', compact('count', 'cart_total'));
	} */
}