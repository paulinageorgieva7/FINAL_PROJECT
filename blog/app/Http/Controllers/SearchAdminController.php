<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class SearchAdminController extends SearchController
{
	public function search()
	{
		$query = Input::get('search');
		
		$categories = DB::table('category')
						->select('category_id', 'category')
						->whereNotNull('main_category')
						->get();
		
		$brands = DB::table('brand')
					->select('brand_id', 'brand_name')
					->get();
		
		$prodOperations = DB::table('product')
								->where('product_name', 'LIKE', '%' . $query . '%')
								->paginate(5);

		return view('admin/productOperation/search', compact('query', 'categories', 'brands', 'prodOperations'));
	}
}