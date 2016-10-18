@extends('admin.layout.auth')
@section('content')

		<div class="row">
	        <div class="col-md-8 col-md-offset-5">
	        	<h1>Create Product</h1>
	        </div>
	    </div>
	    <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('productOperation.store') }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('product_image') ? ' has-error' : '' }}">
                            <label for="product_image" class="col-md-4 control-label">Image</label>
                            <div class="col-md-6">
                                <input id="product_image" type="text" class="form-control" name="product_image" value="{{ old('product_image') }}" placeholder="Input name of image fail">
                                
                                @if ($errors->has('product_image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
                            <label for="product_name" class="col-md-4 control-label">Product Name</label>
                            <div class="col-md-6">
                                <input id="product_name" type="text" class="form-control" name="product_name" value="{{ old('product_name') }}">
                                
								@if ($errors->has('product_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						<div class="form-group{{ $errors->has('brand_id') ? ' has-error' : '' }}">
                            <label for="brand_id" class="col-md-4 control-label">Brand Name</label>
                            <div class="col-md-6">
                           		<select name="brand_id" class="form-control" id="brand_id">
	                            	<option disabled="disabled" selected="selected" >--select--</option>
	                                @foreach ($brands as $brand)
						        		<option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
						        	@endforeach
	                            </select>
	                            
                           		@if ($errors->has('brand_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('brand_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                            <label for="category_id" class="col-md-4 control-label">Category Name</label>
                            <div class="col-md-6">
                                <select name="category_id" class="form-control" id="category_id">
	                            	<option disabled="disabled" selected="selected" >--select--</option>
	                                @foreach ($categories as $category)
						        		<option value="{{ $category->category_id }}">{{ $category->category }}</option>
						        	@endforeach
	                            </select>
                                
                           		@if ($errors->has('category_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('product_qty') ? ' has-error' : '' }}">
                            <label for="product_qty" class="col-md-4 control-label">Product Quantity</label>
                            <div class="col-md-6">
                                <input id="product_qty" type="text" class="form-control" name="product_qty" value="{{ old('product_qty') }}">
                                
                           		@if ($errors->has('product_qty'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_qty') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Price</label>
                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}">
                                
                           		@if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="reduced_price" class="col-md-4 control-label">Reduced Price</label>
                            <div class="col-md-6">
                                <input id="reduced_price" type="text" class="form-control" name="reduced_price" value="{{ old('reduced_price') }}" placeholder="The field does not necessarily.">
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('product_desc') ? ' has-error' : '' }}">
                            <label for="product_desc" class="col-md-4 control-label">Description</label>
                            <div class="col-md-6">
                                <textarea id="product_desc" rows="5" class="form-control" style="resize: vertical" name="product_desc" value="{{ old('product_desc') }}"></textarea>
                                
                           		@if ($errors->has('product_desc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_desc') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection