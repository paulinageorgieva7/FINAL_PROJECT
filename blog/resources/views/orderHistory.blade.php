@extends('layouts.app')
@section('content')

<?php  
$mainCategory = Session::get('mainCategory');
$category = Session::get('category');
$slider = Session::get('slider');
/* $count = Session::get('count');
$cart_total = Session::get('cart_total'); */
?> 

 <div class="main">
    <div class="content">
	    <h2>Order History</h2>	
	    
    	<div class="content_top">   	
    		<div class="clear"></div>
    		@foreach ($orders as $order) 
    			<div class="section group"> 		
					<div class="cont-desc span_1_of_2">
					  <div class="product-details">				
						<div class="grid images_3_of_2">
							<div id="container">
							   <div id="products_example">
								   <div id="products">								
										<p>Date: {{ $order->created_at }}</p>
										<p>Ordered By: {{ $order->first_name }} {{ $order->last_name }}</p>					
										<p>Shipped To: {{ $order->city}}, {{ $order->address}}</p>																
									
									</div>
								</div>
							</div>
							</div>
						</div>					
					<div class="desc span_3_of_2">
					@foreach($order->products as $product)			
						<div class="grid images_3_of_2">										
							<div id="container">														
								<div id="products_example">								
						  			<div id="products">							  								
										<img src= '{{ url("images/$product->product_image") }}' alt="{{ $product->product_name }}" 
											width="100px" />					
									</div>
								</div>
							</div>
						</div>
						
						<h4>{{ $product->product_name }}</h4>								
							<div class="price">						
								<p>Price: 
									@if ($product->reduced_price)
										<span>${{ $product->reduced_price }}</span></p>
									@else <span>${{ $product->price }}</span></p>
									@endif
								<label>QTY: {{ $product->qty }}</label>  
								<hr>	
								@endforeach							
								<div class="clear"></div>
								
								<p>Total Price: 									
								<span>${{ $order->total }}</span></p>																												
							</div>									
						</div>							
					</div>			
				</div>								
		 	</div>	
		 	@endforeach	
		 	{!! $orders->links() !!}		 					
 		</div>			 	
	

</div>


@endsection

