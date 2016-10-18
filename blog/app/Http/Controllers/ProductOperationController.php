<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ProductOperation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductOperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show products
        $prodOperations = DB::table('product')
        					->paginate(10);
        $categories = DB::table('category')
        				->select('category_id', 'category')
						->whereNotNull('main_category')
        				->get();
        $brands = DB::table('brand')
        			->select('brand_id', 'brand_name')
        			->get();
        
        return view('admin.productOperation.index', [
        		'prodOperations' => $prodOperations,
        		'categories' => $categories,
        		'brands' => $brands
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$categories = DB::table('category')
				    	->select('category_id', 'category')
				    	->whereNotNull('main_category')
				    	->get();
    	$brands = DB::table('brand')
			    	->select('brand_id', 'brand_name')
			    	->get();
    	
        //create new product
        return view('admin.productOperation.create',[
        		'categories' => $categories,
        		'brands' => $brands
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $this->validate($request, [
        	'product_image' => 'required',
        	'product_name' => 'required',
        	'brand_id' => 'required',
        	'category_id' => 'required',
        	'product_qty' => 'required',
			'price' => 'required',
        	'product_desc' => 'required'
        ]);
        
        // create new product
        $product = new ProductOperation();
        
        $product->product_image = $request->product_image;
        $product->product_name = $request->product_name;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->product_qty = $request->product_qty;
        $product->price = $request->price;
        $product->reduced_price = ($request->reduced_price ? $request->reduced_price : NULL);
        $product->product_desc = $request->product_desc;
        
        $product->save();
        
        return redirect()->route('productOperation.index')->with('alert-success', 'Product has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    	$value = $request->session()->get('key');
    	var_dump($value);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$categories = DB::table('category')
				    	->select('category_id', 'category')
				    	->whereNotNull('main_category')
				    	->get();
    	$brands = DB::table('brand')
			    	->select('brand_id', 'brand_name')
			    	->get();
    	$request = DB::table('product')
    				->where('product_id', $id)
    				->get();
    	$product = $request[0];
    	
    	//return to the edit views
    	return view('admin.productOperation.edit', [
    			'product' => $product,
        		'categories' => $categories,
        		'brands' => $brands
    	]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	// validation
    	$this->validate($request, [
    			'product_image' => 'required',
    			'product_name' => 'required',
    			'brand_id' => 'required',
    			'category_id' => 'required',
    			'product_qty' => 'required',
    			'price' => 'required',
    			'product_desc' => 'required'
    	]);
    	    	
    	DB::table('product')
            ->where('product_id', $id)
            ->update([
            		'product_image' => $request->product_image,
            		'product_name' => $request->product_name,
            		'brand_id' => $request->brand_id,
            		'category_id' => $request->category_id,
            		'product_qty' => $request->product_qty,
            		'price' => $request->price,
            		'reduced_price' => ($request->reduced_price ? $request->reduced_price : NULL),
            		'product_desc' => $request->product_desc
            ]);
    	
    	return redirect()->route('productOperation.index')->with('alert-success', 'Product has been saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete product
    	DB::table('product')
    		->where('product_id', $id)
    		->delete();
    	
    	return redirect()->route('productOperation.index')->with('alert-success', 'Product has been saved!');
    }
}
