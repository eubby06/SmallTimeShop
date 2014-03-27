@section('content')
	<div class="form-title">Create Category</div>

	<div class="form-container clearfix">

	@include('errors.form')

	<form role="form" action="{{ route('categories.store') }}" method="POST">

			<div class="form-group">
			    <label for="name">Name</label>
			    <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{ Input::old('name') }}">
			</div>

			<div class="form-group input-group input-group-md">
				  <span class="input-group-addon">http://smalltimeshop.dev/categories/</span>
				  <input type="text" name="slug" class="form-control" value="{{ Input::old('slug') }}">
			</div>

			<div class="row">
				<div class="form-group col-md-6">
				    <label for="parent">Parent</label>
					{{ Form::select('parent_id', $categories, Input::old('parent'), array('class' => 'form-control')) }}
				</div>

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