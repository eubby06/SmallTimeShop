@section('content')
	<div class="form-title">
		Create Product

		<a href="{{ route('photos', $product->id) }}" class="pull-right btn btn-default btn-md">
  			<span class="glyphicon glyphicon-picture"></span> Manage Photos
		</a>

	</div>

	<div class="form-container clearfix">

	@include('errors.form')

	<div class="row">
	<form role="form" action="{{ route('products.update', $product->id) }}" method="POST">
		<div class="col-md-6">
			  <div class="form-group">
			    <label for="name">Name</label>
			    <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{ $product->name }}">
			  </div>

			  <div class="form-group input-group input-group-md">
				  <span class="input-group-addon">http://smalltimeshop.dev/products/</span>
				  <input type="text" name="slug" class="form-control" value="{{ $product->slug }}">
				</div>

			  <div class="form-group">
			    <label for="description">Description</label>
			    <textarea name="description" rows="4" class="form-control">{{ $product->description }}</textarea>
			  </div>

			  <button type="submit" class="btn btn-primary btn-lg">Submit</button>
			  <a href="{{ route('products') }}" class="btn btn-default btn-lg">Cancel</a>
		</div>
		<div class="col-md-6">
			<div class="form-group col-md-6">
			    <label for="categories">Categories</label>
				{{ Form::select('categories[]', $categories, $product->categoryIds(), array('class' => 'form-control', 'multiple')) }}
			  </div>
			  <div class="form-group col-md-6">
			    <label for="type">Type</label>
				{{ Form::select('type', array('digital' => 'Digital', 'physical' => 'Physical'), $product->type, array('class' => 'form-control')) }}
			  </div>

			  <div class="form-group col-md-6">
			    <label for="parent">Parent</label>
				{{ Form::select('parent', array('0' => 'No', '1' => 'Yes'), $product->parent, array('class' => 'form-control')) }}
			  </div>

			  <div class="form-group col-md-6">
			    <label for="status">Status</label>
				{{ Form::select('status', array('1' => 'Enabled', '0' => 'disabled'), $product->status, array('class' => 'form-control')) }}
			  </div>

			  <div class="form-group col-md-6">
			    <label for="price">Price</label>
			    <input type="text" name="price" class="form-control" placeholder="Enter price" value="{{ $product->price }}">
			  </div>

			  <div class="form-group col-md-6">
			    <label for="discounted_price">Discounted Price</label>
			    <input type="text" name="discounted_price" class="form-control" placeholder="Enter discounted price" value="{{ $product->discounted_price }}">
			  </div>

			  <div class="form-group col-md-6">
			    <label for="color">Color</label>
			    <input type="text" name="color" class="form-control" placeholder="Enter color" value="{{ $product->color }}">
			  </div>

			  <div class="form-group col-md-6">
			    <label for="size">Size</label>
			    <input type="text" name="size" class="form-control" placeholder="Enter size" value="{{ $product->size }}">
			  </div>

			  <div class="form-group col-md-6">
			    <label for="weight">Weight</label>
			    <input type="text" name="weight" class="form-control" placeholder="Enter weight" value="{{ $product->weight }}">
			  </div>
		</div>
		
	</form>
	</div>
	</div>
@stop