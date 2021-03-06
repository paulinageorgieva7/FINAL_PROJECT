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

		if (isset(Auth::user()->id)) {
 			$user_id = Auth::user()->id;
 		} else {
 			return redirect()->route('login');
 		}		
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
	
		if ($validator->fails()) {
			return redirect('order')
			->withErrors($validator)
			->withInput();
		}
	
		$first_name = Input::get('first_name');
		$last_name = Input::get('last_name');
		$address = Input::get('address');
		$city = Input::get('city');
		$zip = Input::get('zip');
		
		if (isset(Auth::user()->id)) {
			$user_id = Auth::user()->id;
		} else {
			return redirect()->route('login');
		}
	
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
		
		return redirect('history');
	
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
			->orderBy('order_id', 'desc')
			->paginate(10);
		
		foreach ($orders as &$order)	{
			$order->products = DB::table('order_product')
				->join('product', 'product.product_id', '=', 'order_product.product_id')
				->where('order_id', '=', $order->order_id)
				->get();
		}
				
		return view('orderHistory')				
				->with('orders', $orders);
	}
	
}
