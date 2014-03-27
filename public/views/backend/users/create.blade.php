@section('content')
	<div class="form-title">Create User</div>

	<div class="form-container clearfix">

	@include('errors.form')

	<form role="form" action="{{ route('users.store') }}" method="POST">

			<div class="form-group">
			    <label for="name">Name</label>
			    <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{ Input::old('name') }}">
			</div>

			<div class="row">
			<div class="form-group col-md-6">
			    <label for="groups">Groups</label>
				{{ Form::select('groups[]', $groups, Input::old('groups'), array('class' => 'form-control', 'multiple')) }}
			  </div>
				<div class="form-group col-md-6">
				    <label for="status">Status</label>
					{{ Form::select('status', array('1' => 'Enabled', '0' => 'disabled'), Input::old('status'), array('class' => 'form-control')) }}
				</div>
			</div>

			<button type="submit" class="btn btn-primary btn-lg">Submit</button>
			<a href="{{ route('users') }}" class="btn btn-default btn-lg">Cancel</a>
		
	</form>

	</div>
@stop