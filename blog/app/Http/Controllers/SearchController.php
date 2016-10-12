<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class SearchController extends Controller
{
	public function search()
	{
		$category_DB = DB::table('category')->get();
		
		$query = Input::get('search');
		
		$product = DB::table('product')
			->where('product_name', 'LIKE', '%' . $query . '%')
			->get();
		
		/* if ($search->isEmpty()) {
			flash()->info('Not Found', 'No search results found.');
			return redirect('/');
		} */
		return view('show', compact('query', 'category_DB', 'product'));
	}
}