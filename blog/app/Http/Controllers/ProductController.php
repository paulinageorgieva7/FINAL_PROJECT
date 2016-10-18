<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


use App\Http\Requests;
use App\Comment;

class ProductController extends Controller
{
	private $isAlreadyComment = false;
	
	public function show($product_id)
	{
		$product = DB::table('product')
			->where('product_id', '=', $product_id)
			->get();
		
		$showComment = DB::table('users')
			->leftJoin('comments', 'users.id', '=', 'comments.user_id')
			->where('product_id', '=', $product_id)
			->orderBy('comment_id', 'desc')
			->paginate(10);
		
		if (isset(Auth::user()->id)) {
			$user_id = Auth::user()->id;
			$isComment = DB::table('comments')
				->where('product_id', '=', $product_id)
				->where('user_id', '=', $user_id)
				->exists();			
		} 
		
		
		
		return view('showProduct', compact('isComment'))
				->with('product', $product)
				->with('comments', $showComment);				 
	}
	
	public function comment($product_id, Request $request)
	{

		$validator = Validator::make($request->all(), [
				'comment' => 'required|min:2',
		]);
		
		if ($validator->fails()) {
			return redirect()->back()
				->withErrors($validator)
				->withInput();
		}
		
		$comment = Input::get('comment');
		
		if (isset(Auth::user()->id)) {
			$user_id = Auth::user()->id;
		} else {
			return redirect()->route('login');
		}
		
		$comments = DB::table('comments')->insert([
				'user_id' => $user_id, 
				'product_id' => $product_id,
				'comment' => $comment,
		]);
		
		return redirect()->back();
	}
	
}
