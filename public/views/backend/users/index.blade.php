@section('content')
	<div class="form-title">
		User List
		<div class="actions btn-group pull-right">
			  <a href="{{ route('users.create') }}" class="btn btn-default">Create</a>
			  <a href="#" class="btn btn-default">Edit</a>
			  <a href="#" class="btn btn-default">Remove</a>
		</div>
		
	</div>
	
	@include('errors.form')

	<div class="form-container">
		<table class="table table-hover">
		      <thead>
			        <tr>
				          <th>Select</th>
				          <th>First Name</th>
				          <th>Last Name</th>
				          <th>Username</th>
				          <th>Email</th>
				          <th>Status</th>
				          <th>Edit</th>
				          <th>Delete</th>
			        </tr>
		      </thead>
		      <tbody>

		      @foreach ($users as $user)
		        <tr>
		        	<td><input type="checkbox" value="1"/></td>
			        <td>{{ $user->first_name }}</td>
			        <td>{{ $user->last_name }}</td>
			        <td>{{ $user->username }}</td>
			        <td>{{ $user->email }}</td>
			        <td>{{ statusToString($user->status) }}</td>
			        <td><a href="{{ route('users.edit', $user->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
</td>
			        <td><a href="{{ route('users.delete', $user->id) }}"><span class="glyphicon glyphicon-remove"></span></a>
</td>
		        </tr>
		        @endforeach

		      </tbody>
		</table>
	</div>
@stop