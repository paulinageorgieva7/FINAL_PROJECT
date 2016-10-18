<?php  
$mainCategory = Session::get('mainCategory');
$category = Session::get('category');
$slider = Session::get('slider');
/* $count = Session::get('count');
$cart_total = Session::get('cart_total'); */
?> 

@extends('layouts.app')
@section('content')

		<div class="main">
		    <div class="content">		    
		    @if (!isset($query))
		   	 <div class="dropdown">
		        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Sort By
		        <span class="caret"></span></button>
		                
		        <ul class="dropdown-menu">               
		             <li><a href="{{ route('category.lowest', $category_DB[0]->category_id) }}">Price Lowest</a></li>
		             <li><a href="{{ route('category.highest', $category_DB[0]->category_id) }}"> Price Highest</a></li>              
		        </ul>
		     </div>
		     @endif       
			      <div class="section group">			  
			 <div>
				@if(isset($query))
				 	@if(count($product) == 0)
				 		{{ 'No search results found!' }}
				 	@else
				 		{{ 'Search results for: ' . $query}}
				 	@endif 	
				 @endif
			 </div>			 	    
			      @foreach ($product as $products)
		
						<div class="grid_1_of_4 images_1_of_4">
						
							 <a href="{{ url('product', $products->product_id) }}"><img src= '{{ url("images/$products->product_image") }}' /></a>
							 <h2>{{ $products->product_name }}</h2>
								<div class="price-details">
						       		<div class="price-number">
						       			@if(!$products->reduced_price)
											<p><span class="rupees">${{ $products->price }} </span></p>
										@endif
										@if($products->reduced_price)
											<p style="text-decoration: line-through; color:red"><span class="rupees" style="color:black">${{ $products->price }}</span></p>
											<p><span class="rupees">${{ $products->reduced_price }}</span></p>
										@endif
							   		</div>
							       	<div class="add-cart">								
										<h4><a href="{{ url('product', $products->product_id) }}">Add to Cart</a></h4>
									</div>
									<div class="clear"></div>
								</div>			 
							</div>
						@endforeach	
					
					</div>
					
				</div>
					{!! $product->links() !!}
			</div>
			
		@endsection
