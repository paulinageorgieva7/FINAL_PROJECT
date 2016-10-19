	<div class="row">
        <div class="col-md-8">
        	<h1>Product Operation</h1>
        </div>
    </div>
    <div class="row">
     	<form class="navbar-form navbar-left" role="search" method="POST" action="{{ url('/admin/productOperation/search') }}" >
     		 {{ csrf_field() }}
 			<div class="form-group">
 				<input type="text" class="form-control" name="search" placeholder="Search" value="{{ isset($query) ? $query : '' }}">
 			</div> 
 			<button type="submit" class="btn btn-default">Submit</button>   
     	</form>
     	<ul class="list-group" style="margin: 0">
     		<li style="list-style-type: none">
     			<a href="" class="btn btn-info pull-right">Send Email to Users</a>
        	</li>
     		<li style="list-style-type: none">
     			<a href="{{ route('productOperation.create') }}" class="btn btn-info pull-right">Create New Product</a>
        	</li>
        </ul>
        <table class="table table-striped">
        	<tr>
        		<th>No.</th>
        		<th>Image</th>
        		<th>Name</th>
        		<th>Brand</th>
        		<th>Category</th>
        		<th>Quantity</th>
        		<th>Price</th>
        		<th>Reduced price</th>
        		<th>Description</th>
        		<th>Actions</th>
        	</tr>
        	<?php $no=1; ?>
        	
        	@foreach ($prodOperations as $product)
	        		<tr>
	        			<td>{{ $no++ }}</td>
	        			<td><img src='{{ url("images/$product->product_image") }}' width="90px" alt='{{ url("images/$product->product_image") }}' /></td>
	        			<td>{{ $product->product_name }}</td>
	        	@foreach ($brands as $brand)
	        		@if ($product->brand_id == $brand->brand_id)
	        			<td>{{ $brand->brand_name }}</td>
	        			<?php break; ?>
        		@endif
        	@endforeach
        	@foreach ($categories as $category)
        		@if ($product->category_id == $category->category_id)
        			<td>{{ $category->category }}</td>
        			<?php break; ?>
        		@endif
        	@endforeach
        			<td>{{ $product->product_qty }}</td>
        			<td>{{ $product->price }}</td>
        			<td>{{ $product->reduced_price }}</td>
        			<td>{{ $product->product_desc }}</td>
        			<td>
        				<form action="{{ route('productOperation.destroy', $product->product_id) }}" method="post">
        					<input type="hidden" name="_method" value="delete" />
        					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
        					<a href="{{ route('productOperation.edit', $product->product_id) }}" class="btn btn-primary">Edit</a>
        					<br /><br />
        					<input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data!!')" name="button" value="Delete" />
	        				</form>
	        			</td>
	        		</tr>
        	@endforeach
        </table>
        {!! $prodOperations->links() !!}
    </div>