@extends('layouts.app')
@section('content')

<?php  
$mainCategory = Session::get('mainCategory');
$category = Session::get('category')
?> 


<div class="main">
    <div class="content">
	      <div class="section group">
	      @foreach ($product as $product)
				<div class="grid_1_of_4 images_1_of_4">
				
					 <a href="{{ url('product', $product->product_id) }}"><img src="images/{{ $product->product_image }}" alt="{{ $product->product_name }}" /></a>
					 <h2>{{ $product->product_name }}</h2>
						<div class="price-details">
				       		<div class="price-number">
				       			@if(!$product->reduced_price)
									<p><span class="rupees">{{ $product->price }}</span></p>
								@endif
								@if($product->reduced_price)
									<p style="text-decoration: line-through; color:red"><span class="rupees" style="color:black">{{ $product->price }}</span></p>
									<p><span class="rupees">{{ $product->reduced_price }}</span></p>
								@endif
					   		</div>
					       	<div class="add-cart">								
								<h4><a href="preview.php">Add to Cart</a></h4>
							</div>
							<div class="clear"></div>
						</div>			 
							
				</div>
				@endforeach	
			</div>
		</div>
	</div>
@endsection