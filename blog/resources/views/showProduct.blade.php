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

    	<div class="section group">
				<div class="cont-desc span_1_of_2">
				  <div class="product-details">				
					
					@foreach ($product as $product)
					
					<div class="grid images_3_of_2">
						<div id="container">
						   <div id="products_example">
							   <div id="products">								
									<img src= '{{ url("images/$product->product_image") }}' alt="{{ $product->product_name }}" />													</div>
							</div>
						</div>
					</div>
				<div class="desc span_3_of_2">
					<h2>{{ $product->product_name }}</h2>
					<h2 style="font-size: 1em">Product Details</h2>
					<p>{{ $product->product_desc }}</p>					
					<div class="price">
					
					@if (!$product->reduced_price)
						<p>Price: <span>${{ $product->price }}</span></p>
					@endif
					@if ($product->reduced_price)
						<p>Price: <span style="text-decoration: line-through;">${{ $product->price }}</span></p>
						<p>New Price: <span>${{ $product->reduced_price }}</span></p>
					@endif
					<div class="add-cart">	
						@if ($product->product_qty <= 0)
	                        <h5 class="text-center red-text" style="color: #CD1F25; font-size:2em">Sold Out</h5>
	                        <p class="text-center"><b>This product could not added to your cart!</b></p>
	                    @else
		                    
	                        <form action="{{ route('cart.add')}}" method="post" name="add_to_cart">
	                            {!! csrf_field() !!}
	                            <input type="hidden" name="product" value="{{$product->product_id}}" />
	                            <label>QTY</label>
	                            <select name="qty" class="form-control" id="Product_QTY" title="Product Quantity">
	                                <option value="1">1</option>
	                                <option value="2">2</option>
	                                <option value="3">3</option>
	                                <option value="4">4</option>
	                                <option value="5">5</option>
	                            </select>
                            	<p><b>Available: {{ $product->product_qty }}</b></p>
                            	<button class="btn btn-default waves-effect waves-light" style="background-color: #CD1F25; color:#fff">Add to Cart</button>		                 
		                    </form>
	                    @endif							
					</div>				
					<div class="clear"></div>
				</div>				 
				</div>				
				<div class="clear"></div>
				
				@endforeach
 				
 				</div>
 			</div>
 		</div>

				<h2 style="font-size: 1.3em; color: black">COMMENTS</h2>
				@foreach($comments as $comment)				
					<div class="content_top">   	  		
			    			<div class="section group">   			
								<div class="cont-desc span_1_of_2">					  		
									<div class="grid images_3_of_2">
										<div id="container">	
																	   
											   <div id="products">								
													<p>Date: {{ $comment->created_at }}</p>
													<p>Post By: {{ $comment->name }}</p>																									
												</div>					
										</div>
										
									</div>					
									<div class="desc span_3_of_2">					
										<h4>{{ $comment->comment }}</h4>								
									</div>							
								</div>			
							</div>								
						 </div>							
			 		
		 		@endforeach
		 		
		 		{!! $comments->links() !!}
		 		
		 		<br>
			 @if (Auth::user())
			 
			 	@if($isComment) 
			 		<h4>You already left a comment for this product</h4>
			 	@else	
			 		 	
			 	<div class="container" >
				    <div class="row">
				        <div class="col-md-8 col-md-offset-2">
				            <div class="panel panel-default">
				                <div class="panel-heading">Leave Comment</div>
				                <div class="panel-body">
				                    <form class="form-horizontal" role="form" method="POST">
				                        {{ csrf_field() }}
				                        <div class="col-md-6">
				                        	<textarea rows="4" cols="50" id="comment" class="form-control" 
				                        		placeholder="Leave your comment here..." name="comment"> 
				                        	</textarea>   
				                        	@if ($errors->has('comment'))
                                   				<span class="help-block">
                                       				<strong>{{ $errors->first('comment') }}</strong>
                                    			</span>
                               				@endif                       
				                       	<br>
				                       	</div>         	
				                      	<div class="form-group">
				                           	<div class="col-md-6 col-md-offset-4">
				                           		<button type="submit" class="btn btn-primary">Leave Comment</button>
				                            </div>
				                       	</div>
				                    </form>					                   			                		
				                </div>
				            </div>
				        </div>
				    </div>
				</div>
			 @endif	
			@endif	
		</div>	
    </div>
</div>
@endsection
