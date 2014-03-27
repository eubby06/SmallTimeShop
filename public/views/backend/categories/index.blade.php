@section('content')
	<div class="form-title">
		Category List
		<div class="actions btn-group pull-right">
			  <a href="{{ route('categories.create') }}" class="btn btn-default">Create</a>
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
				          <th>Parent</th>
				          <th>Status</th>
				          <th>Edit</th>
				          <th>Delete</th>
			        </tr>
		      </thead>
		      <tbody>

		    @foreach($categories as $category) 
		        <tr>
		        	<td><input type="checkbox" value="1"/></td>
			        <td>{{ $category->name }}</td>
			        <td>{{ $category->slug }}</td>
			        <td>{{ ($category->parent) ? $category->parent->name : 'none' }}</td>
			        <td>{{ statusToString($category->status) }}</td>
			        <td><a href="{{ route('categories.edit', $category->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
</td>
			        <td><a href="{{ route('categories.delete', $category->id) }}"><span class="glyphicon glyphicon-remove"></span></a>
</td>
		        </tr>
		    @endforeach 

		      </tbody>
		</table>
	</div>
@stop