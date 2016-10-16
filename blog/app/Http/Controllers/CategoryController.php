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
        
        $slider = DB::table('product')
        ->whereNotNull('reduced_price')
        ->limit(3)
        ->get();
        
        $session = $request->session()->put('mainCategory', $mainCategory); 
        $session = $request->session()->put('category', $category);
        $session = $request->session()->put('slider', $slider);
        
        return view('layouts.app', ['mainCategory' => $mainCategory, 
        							'category' => $category,
        							'slider' => $slider
      								]);
        
    }
    
    public function show($category_id)
    {
    	$product = DB::table('product')->where('category_id', '=', $category_id)->get();
    	
    	$category_id_DB = DB::table('category')->where('category_id', '=', $category_id)->get();
    	
    	return view('show', ['product' => $product, 'category_DB' => $category_id_DB]);
    	
    }
    
    public function orderByLowest($category_id)
    {
    	$product = DB::table('product')
    		->where('category_id', '=', $category_id)
    		->orderBy('price', 'asc')
    		->get();
    	
    	$category_id_DB = DB::table('category')->where('category_id', '=', $category_id)->get();
    	
    	return view('show', ['product' => $product, 'category_DB' => $category_id_DB]);
    }
    
    public function orderByHighest($category_id)
    {
    	$product = DB::table('product')
    		->where('category_id', '=', $category_id)
    		->orderBy('price', 'desc')
    		->get();
		
    	$category_id_DB = DB::table('category')->where('category_id', '=', $category_id)->get();
    		 
    	return view('show', ['product' => $product, 'category_DB' => $category_id_DB]);
    }

	
}
