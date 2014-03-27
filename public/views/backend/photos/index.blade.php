@section('content')
	<div class="form-title">Product Gallery

		<form class="pull-right" id="imageUploader" role="form" action="{{ route('photos.upload', $productId) }}" method="POST" enctype="multipart/form-data">

			<button class="fileInput btn btn-default"/><span class="glyphicon glyphicon-cloud-upload"></span>Upload Images</button>
			{{ Form::file('image[]', array('multiple', 'class' => 'file')) }}
			{{ Form::hidden('productId', $productId) }}
			
		</form>
	</div>
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

	</div>
@stop