<!DOCTYPE html>
<html lang="en">
<head>
 
    <title>Tech Shoppe</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all"/>
	<link href="{{ asset('css/slider.css') }}" rel="stylesheet" type="text/css" media="all"/>
	<link href="{{ asset('css/global.css') }}" rel="stylesheet" type="text/css" media="all"/>
	<link href="{{ asset('css/easy-responsive-tabs.css') }}" rel="stylesheet" type="text/css" media="all"/>
	
	<script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery-1.7.2.min.js') }}"></script> 
	<script type="text/javascript" src="{{ asset('js/move-top.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/easing.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/startstop-slider.js') }}"></script>
	<script src="{{ asset('js/easyResponsiveTabs.js') }}" type="text/javascript"></script>

</head>
<body>

    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                            <li><a href="{{ url('/admin/login') }}">Admin</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>


  <div class="wrap">
	<div class="header">
	 <div class="header_top">
		 <div class="logo">
			<a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" alt="" /></a>
		 </div>
		  <div class="cart">
		  	@if (!Auth::user())
		  	    <p>Welcome to our Online Store!
		  	@else 
		  		<p>Welcome to our Online Store! 
		  			<span><a href="{{ url('cart') }}">Cart</a></span></p>
		  		<br>
		  		<p><a href="{{ url('history') }}">Order History</a></p>
		  		
		  	@endif
		  	   	
		  </div>
			  
		  <script type="text/javascript">
		function DropDown(el) {
			this.dd = el;
			this.initEvents();
		}
		DropDown.prototype = {
			initEvents : function() {
				var obj = this;

				obj.dd.on('click', function(event){
					$(this).toggleClass('active');
					event.stopPropagation();
				});	
			}
		}

		$(function() {

			var dd = new DropDown( $('#dd') );

			$(document).click(function() {
				// all dropdowns
				$('.wrapper-dropdown-2').removeClass('active');
			});

		});

	</script>
	<div class="clear"></div>
  </div>
	<div class="header_bottom">
	     	<div class="menu">
	     		<ul>
				@foreach ($mainCategory as $mc)
	     			<li>	
	     				<div class="dropdown">
						  <a class="dropbtn" href=#>{{ $mc->category}}</a></button>
						  <div class="dropdown-content">
						  @foreach ($category as $c)
							@if ($c->main_category == $mc->category_id)
						   	 <a href="{{ url('category', $c->category_id) }}">{{ $c->category}}</a>
						   	@endif
						  @endforeach 
						    
						  </div>
						</div>
					</li>
				@endforeach

			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	<div class="search_box">
	     		<form role="form" method="POST" action="{{ url('/search') }}" >
	     		 {{ csrf_field() }}
	     		 
	     			<input type="text" name="search" placeholder="Search" value="{{ isset($query) ? $query : '' }}">
	     			<input type="submit" value="">
	     		</form>
	     	</div>
	     <div class="clear"></div>
	   </div>			
   </div>
</div>	     
        @yield('content')  
		@extends('layouts.footer')
   
</body>
</html>
