<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\Order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class OrderController extends Controller
{
	public function index()
	{
		$user_id = Auth::user()->id;
		
		$cart_total = Cart::with('total')->where('user_id', '=', $user_id)->sum('total');
		
		return view('order', compact('cart_total'));
	}
	
	public function postOrder(Request $request) {
	
		$validator = Validator::make($request->all(), [
				'first_name' => 'required|max:30|min:2',
				'last_name'  => 'required|max:30|min:2',
				'address'    => 'required|max:50|min:4',
				'city'       => 'required|max:50|min:3',
				'zip'        => 'required|max:11|min:4',
		]);
	
		
		// If error occurs, display it
		if ($validator->fails()) {
			return redirect('/cart')
			->withErrors($validator)
			->withInput();
		}
	
		$first_name = Input::get('first_name');
		$last_name = Input::get('last_name');
		$address = Input::get('address');
		$city = Input::get('city');
		$zip = Input::get('zip');
		
		$user_id = Auth::user()->id;
	
		$cart_products = Cart::where('user_id', '=', $user_id)
			->join('product', 'carts.product_id', '=', 'product.product_id')
			->get();
		 
		$cart_total = Cart::with('total')->where('user_id', '=', $user_id)->sum('total');
	
		
  		$order = Order::create (
				array(
						'user_id'    => $user_id,
						'first_name' => $first_name,
						'last_name'  => $last_name,
						'address'    => $address,
						'city'       => $city,
						'zip'        => $zip,
						'total'      => $cart_total,
				));

  		foreach ($cart_products as $order_products) {
 		 			
			$order->orderItems()->attach($order_products->product_id, array(
					'qty'    => $order_products->qty,
					'price'  => $order_products->price,
					'reduced_price'  => $order_products->reduced_price,
					'total'  => $order_products->price * $order_products->qty,
					'total_reduced'  => $order_products->reduced_price * $order_products->qty,
			));
  						
		}
		
		Cart::where('user_id', '=', $user_id)->delete();
	
		$success = true;
		
		return view('orderHistory', compact('success'));
	
	}
	
	public function showHistory () 
	{
		if (isset(Auth::user()->id)) {
			$user_id = Auth::user()->id;
		} else {
			return redirect()->route('login');
		}
		
		$orders = DB::table('orders')
			->where('user_id', '=', $user_id)			
			->get();
	
		
			
		$order_products = DB::table('order_product')
			->where('user_id', '=', $user_id)
			->join('product', 'product.product_id', '=', 'order_product.product_id')
			->leftJoin('orders', 'order_product.order_id', '=', 'orders.order_id')
			->get();
		

		return view('orderHistory')
				->with('order_products', $order_products)
				->with('orders', $orders);
	}
	
}
