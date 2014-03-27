@section('content')
	<div class="form-title">
		Page List
		<div class="actions btn-group pull-right">
			  <a href="{{ route('pages.create') }}" class="btn btn-default">Create</a>
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
				          <th>Name</th>
				          <th>Slug</th>
				          <th>Status</th>
				          <th>Edit</th>
				          <th>Delete</th>
			        </tr>
		      </thead>
		      <tbody>

		    @foreach($pages as $page) 
		        <tr>
		        	<td><input type="checkbox" value="1"/></td>
			        <td>{{ $page->title }}</td>
			        <td>{{ $page->slug }}</td>
			        <td>{{ statusToString($page->status) }}</td>
			        <td><a href="{{ route('pages.edit', $page->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
</td>
			        <td><a href="{{ route('pages.delete', $page->id) }}"><span class="glyphicon glyphicon-remove"></span></a>
</td>
		        </tr>
		    @endforeach 

		      </tbody>
		</table>
	</div>
@stop