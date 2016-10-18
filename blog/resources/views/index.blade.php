<?php  
$mainCategory = Session::get('mainCategory');
$category = Session::get('category');
/* $count = Session::get('count');
$cart_total = Session::get('cart_total'); */
?> 

@extends('layouts.app')
@section('content')

<div class="main">
  <div class="content">  
  	 <div class="header_slide">			 
				 <div class="header_bottom_right">					 
				 	 <div class="slider">		
				 				     
						 <div id="slider">
						 	 @foreach ($slider as $slider)
			                    <div id="mover">
			                   
			                    	<div id="slide-1" class="slide">			                    
									 <div class="slider-img">
									     <a href="{{ url('product', $slider->product_id) }}"><img src= '{{ url("images/$slider->product_image") }}' height="400px"/></a>									    
									  </div>
						              <div class="slider-text">
		                                 <h1>Clearance<br><span>SALE</span></h1>
		                                 <p style="text-decoration: line-through; color: #CD1F25; font-size: 1.5em"><span style="color: #999;">${{ $slider->price }}</span></p>
		                                 <h2>${{ $slider->reduced_price }}</h2>
									  	 <div class="features_list">
									   	 <h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>							               
							           </div>
							           <a href="{{ url('product', $slider->product_id) }}" class="button">Shop Now</a>
					                  </div>				                  	              
									  <div class="clear"></div>										   		
				                  </div>				                  
					           @endforeach	  			                  									
		               			</div>		             
	              	 		</div>
						<div class="clear"></div>					       
	       		 	</div>
	     	 	</div>
	  	 	<div class="clear"></div>
		</div>	
	</div>
</div>

@endsection
