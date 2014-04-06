@section('content')
	<div class="form-title">
		Attribute List
		<div class="actions btn-group pull-right">
			  <a href="{{ route('attributeItems.create') }}" class="btn btn-default">Create</a>
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
				          <th>Edit</th>
				          <th>Delete</th>
			        </tr>
		      </thead>
		      <tbody>

		    @foreach($attributeItems as $attributeItem) 
		        <tr>
		        	<td><input type="checkbox" value="1"/></td>
			        <td>{{ $attributeItem->name }}</td>
			        <td><a href="{{ route('attributeItems.edit', $attributeItem->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
</td>
			        <td><a href="{{ route('attributeItems.delete', $attributeItem->id) }}"><span class="glyphicon glyphicon-remove"></span></a>
</td>
		        </tr>
		    @endforeach 

		      </tbody>
		</table>
	</div>
@stop