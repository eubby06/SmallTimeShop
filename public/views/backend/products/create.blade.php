@section('content')
	<div class="form-title">Create Product</div>
	<div class="form-container clearfix">

	@include('errors.form')

	<div class="row">
	<form role="form" action="{{ route('products.store') }}" method="POST">
		<div class="col-md-6">
			  <div class="form-group">
			    <label for="name">Name</label>
			    <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{ Input::old('name') }}">
			  </div>

			  <div class="form-group input-group input-group-md">
				  <span class="input-group-addon">http://smalltimeshop.dev/products/</span>
				  <input type="text" name="slug" class="form-control" value="{{ Input::old('slug') }}">
				</div>

			  <div class="form-group">
			    <label for="description">Description</label>
			    <textarea name="description" rows="4" class="form-control">{{ Input::old('description') }}</textarea>
			  </div>

			  <button type="submit" class="btn btn-primary btn-lg">Submit</button>
			  <button type="submit" class="btn btn-default btn-lg">Cancel</button>
		</div>
		<div class="col-md-6">
			<div class="form-group col-md-6">
			    <label for="categories">Categories</label>
				{{ Form::select('categories', array('1' => 'shirts', '2' => 'pants'), Input::old('categories'), array('class' => 'form-control')) }}
			  </div>

			  <div class="form-group col-md-6">
			    <label for="type">Type</label>
				{{ Form::select('type', array('downloadable' => 'Downloadable', 'physical' => 'Physical'), Input::old('type'), array('class' => 'form-control')) }}
			  </div>

			  <div class="form-group col-md-6">
			    <label for="parent">Parent</label>
				{{ Form::select('parent', array('0' => 'No', '1' => 'Yes'), Input::old('type'), array('class' => 'form-control')) }}
			  </div>

			  <div class="form-group col-md-6">
			    <label for="status">Status</label>
				{{ Form::select('status', array('1' => 'Enabled', '0' => 'disabled'), Input::old('status'), array('class' => 'form-control')) }}
			  </div>

			  <div class="form-group col-md-6">
			    <label for="price">Price</label>
			    <input type="text" name="price" class="form-control" placeholder="Enter price" value="{{ Input::old('price') }}">
			  </div>

			  <div class="form-group col-md-6">
			    <label for="discounted_price">Discounted Price</label>
			    <input type="text" name="discounted_price" class="form-control" placeholder="Enter discounted price" value="{{ Input::old('discounted_price') }}">
			  </div>

			  <div class="form-group col-md-6">
			    <label for="color">Color</label>
			    <input type="text" name="color" class="form-control" placeholder="Enter color" value="{{ Input::old('color') }}">
			  </div>

			  <div class="form-group col-md-6">
			    <label for="size">Size</label>
			    <input type="text" name="size" class="form-control" placeholder="Enter size" value="{{ Input::old('size') }}">
			  </div>
		</div>
		
	</form>
	</div>
	</div>
@stop