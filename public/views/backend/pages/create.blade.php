@section('content')
	<div class="form-title">Create Page</div>

	<div class="form-container clearfix">

	@include('errors.form')

	<form role="form" action="{{ route('pages.store') }}" method="POST">

			<div class="form-group">
			    <label for="title">Title</label>
			    <input type="text" name="title" class="form-control" placeholder="Enter title" value="{{ Input::old('title') }}">
			</div>

			<div class="form-group input-group input-group-md">
				  <span class="input-group-addon">http://smalltimeshop.dev/pages/</span>
				  <input type="text" name="slug" class="form-control" value="{{ Input::old('slug') }}">
			</div>

			<div class="form-group">
			    <label for="content">Content</label>
			    <textarea name="content" id="content" class="form-control">{{ Input::old('content') }}</textarea>
			</div>

			<div class="row">
				<div class="form-group col-md-6">
				    <label for="status">Status</label>
					{{ Form::select('status', array('1' => 'Enabled', '0' => 'disabled'), Input::old('status'), array('class' => 'form-control')) }}
				</div>
			</div>

			<button type="submit" class="btn btn-primary btn-lg">Submit</button>
			<a href="{{ route('categories') }}" class="btn btn-default btn-lg">Cancel</a>
		
	</form>

	</div>
@stop