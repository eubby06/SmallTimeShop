@section('content')
	<div class="form-title">
		Attribute List
		<div class="actions btn-group pull-right">
			  <a href="{{ route('attributes.create') }}" class="btn btn-default">Create</a>
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
				          <th>Manage Items</th>
				          <th>Edit</th>
				          <th>Delete</th>
			        </tr>
		      </thead>
		      <tbody>

		    @foreach($attributes as $attribute) 
		        <tr>
		        	<td><input type="checkbox" value="1"/></td>
			        <td>{{ $attribute->name }}</td>
			        <td><a href="{{ route('attributesItems.create', $attribute->id) }}"><span class="glyphicon glyphicon-plus"></span></a>
</td>
			        <td><a href="{{ route('attributes.edit', $attribute->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
</td>
			        <td><a href="{{ route('attributes.delete', $attribute->id) }}"><span class="glyphicon glyphicon-remove"></span></a>
</td>
		        </tr>
		    @endforeach 

		      </tbody>
		</table>
	</div>
@stop