<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Category;
use App\Product;

class CategoryController extends Controller
{
	 public function index(Request $request)
    {
	 	$mainCategory = DB::table('category')->whereNull('main_category')->get();
        $category = DB::table('category')->whereNotNull('main_category')->get();
        $session = $request->session()->put('mainCategory', $mainCategory); 
        $session = $request->session()->put('category', $category);
        return view('layouts.app', ['mainCategory' => $mainCategory, 'category' => $category]);
        
    }
    
    public function show($category_id)
    {
    	$product = DB::table('product')->where('category_id', '=', $category_id)->get();
    	return view('show', ['product' => $product]);
    	
    }
    
    public function orderByLowest($category_id)
    {
    	$product = DB::table('product')
    		->where('category_id', '=', $category_id)
    		->orderBy('price', 'asc')
    		->get();
    	return view('show', ['product' => $product]);
    }
    
    public function orderByHighest($category_id)
    {
    	$product = DB::table('product')
    		->where('category_id', '=', $category_id)
    		->orderBy('price', 'desc')
    		->get();
    		var_dump(Route::currentRouteName());
    	return view('show', ['product' => $product]);
    }

	
}
