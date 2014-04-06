@section('content')
	<div class="form-title">Create User</div>

	<div class="form-container clearfix">

	@include('errors.form')

	<form role="form" action="{{ route('users.update') }}" method="POST">
		<div class="col-md-6">
			<div class="form-group">
			    <label for="first_name">First Name</label>
			    <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" value="{{ $user->first_name }}">
			</div>

			<div class="form-group">
			    <label for="last_name">Last Name</label>
			    <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" value="{{ $user->last_name }}">
			</div>

			<div class="form-group">
			    <label for="username">Username</label>
			    <input type="text" name="username" class="form-control" placeholder="Enter Username" value="{{ $user->username }}">
			</div>

			<div class="form-group">
			    <label for="email">Email</label>
			    <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{ $user->email }}">
			</div>

			<button type="submit" class="btn btn-primary btn-lg">Submit</button>
			<a href="{{ route('users') }}" class="btn btn-default btn-lg">Cancel</a>

		</div>
		<div class="col-md-6">
			
			<div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" name="password" class="form-control" />
			</div>

			<div class="form-group">
			    <label for="password_confirmation">Confirm Password</label>
			    <input type="password" name="password_confirmation" class="form-control" />
			</div>

			<div class="form-group col-md-6">
			    <label for="groups">Groups</label>
		
				{{ Form::select('groups[]', $groups, $user->groupIds(), array('class' => 'form-control', 'multiple')) }}
			  </div>
				<div class="form-group col-md-6">
				    <label for="status">Status</label>
					{{ Form::select('status', array('1' => 'Enabled', '0' => 'disabled'), $user->status, array('class' => 'form-control')) }}
				</div>
		</div>
		
	</form>

	</div>
@stop