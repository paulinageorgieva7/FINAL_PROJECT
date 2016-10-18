@extends('layouts.app')
@section('content')

<?php  
$mainCategory = Session::get('mainCategory');
$category = Session::get('category')
?> 

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="clear"></div>
    		
    		
		@foreach ($cart_product as $product)
    		<div class="section group">
				<div class="cont-desc span_1_of_2">
				  <div class="product-details">				
						<div class="grid images_3_of_2">
						<div id="container">
						   <div id="products_example">
							   <div id="products">								
									<img src='{{ url("images/$product->product_image") }}' alt='{{ url("images/$product->product_image") }}' 
										width="200px" />					
								</div>
							</div>
						</div>
					</div>
				<div class="desc span_3_of_2">
					<h2>{{ $product->product_name }}</h2>
						
					<div class="price">
				
						<p>Price: <span>${{ $product->total / $product->qty }}</span></p>
						<label>QTY: {{ $product->qty }}</label>  
						<hr>
						<p>Total Price: <span>${{ $product->total }}</span></p>
					<div class="add-cart">	
						<h4><a href="{{ route('cart.delete', $product->cart_id) }}">Delete From Cart</a></h4>
                        				
					</div>				
					<div class="clear"></div>
					</div>
					
					</div>
					
					<div class="clear"></div>
				 	</div>
	 				 
	 				</div>
	 				<hr style="border-width: 3px">
 				
 				@endforeach		
 			
 				<p style="font-size: 1.5em; text-align:center; padding-right: 220px">Order: <span style="color: #CD1F25">$ {{ $cart_total }}</span></p>
 				
 			</div>
 		</div>
    </div>
</div>


@endsection
