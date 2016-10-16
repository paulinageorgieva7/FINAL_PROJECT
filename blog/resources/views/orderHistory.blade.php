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
    	<div class="content_top">
    		<div class="clear"></div>

    			@if (isset ($success))
    				<p style="font-size: 1.5em; text-align:center;">Your order was processed successfully!</p>
				@endif
				
				
				@foreach ($order_products as $order_products)
		    		<div class="section group">
						<div class="cont-desc span_1_of_2">
						  <div class="product-details">				
							<div class="grid images_3_of_2">
								<div id="container">
								   <div id="products_example">
									   <div id="products">								
											<p>Date: {{ $order_products->created_at }}</p>
											<p>Ordered By: {{ $order_products->first_name }} {{ $order_products->last_name }}</p>					
											<p>Shipped To: {{ $order_products->city}}, {{ $order_products->address}}</p>																
										</div>
									</div>
								</div>
							</div>
							
					
						
						<div class="desc span_3_of_2">
							<div class="grid images_3_of_2">
								<div id="container">
									<div id="products_example">
							  			<div id="products">								
											<img src= '{{ url("images/$order_products->product_image") }}' alt="{{ $order_products->product_name }}" 
												width="200px" />					
										</div>
									</div>
								</div>
							</div>
							<h4>{{ $order_products->product_name }}</h4>
									
								<div class="price">
							
									<p>Price: 
										@if ($order_products->reduced_price)
											<span>${{ $order_products->reduced_price }}</span></p>
										@else <span>${{ $order_products->price }}</span></p>
										@endif
									<label>QTY: {{ $order_products->qty }}</label>  
									<hr>
									<p>Total Price: 
										@if ($order_products->total_reduced)
											<span>${{ $order_products->total_reduced }}</span></p>
										@else <span>${{ $order_products->total }}</span></p>	
										@endif				
									<div class="clear"></div>
								</div>
								
						</div>
								
						<div class="clear"></div>


				 <hr style="border-width: 3px">
 				
 				
					
 				

					</div>
				</div>
			 	@endforeach	
		 				
			 	</div>	
				
 			</div>

</div>
</div>


@endsection

