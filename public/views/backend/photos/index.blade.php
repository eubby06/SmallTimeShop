@section('content')
	<div class="form-title">Product Gallery</div>
	<div class="form-container clearfix">

	@include('errors.form')

	<div class="well">	
		<ul class="list-inline">
			@if ($images && count($images))
				@foreach ($images as $image)
					<li><img src="{{ asset($image) }}" class="img-thumbnail" /></li>
				@endforeach
			@else
				<li>No images.</li>
			@endif
		</ul>
	</div>

	<div class="progress hide">
		  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
		    <span class="percentage">40% Complete (success)</span>
		  </div>
	</div>

	<form id="imageUploader" role="form" action="{{ route('photos.upload', $id) }}" method="POST" enctype="multipart/form-data">

		<div class="form-group">
			    <label for="exampleInputFile">Browse Image to upload</label>
			    {{ Form::file('image[]', array('multiple')) }}
			  </div>

			  <button type="submit" class="btn btn-primary btn-lg">Submit</button>
			   <a href="{{ route('products') }}" class="btn btn-default btn-lg">Cancel</a>
		</div>
		
	</form>

	</div>
@stop