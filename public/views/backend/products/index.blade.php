@section('content')
	<div class="form-title">
		Product List
		<div class="actions btn-group pull-right">
			  <a href="{{ route('products.create') }}" class="btn btn-default">Create</a>
			  <a href="#" class="btn btn-default">Edit</a>
			  <a href="#" class="btn btn-default">Remove</a>
		</div>
		
	</div>
	<div class="form-container">
		<table class="table table-hover">
		      <thead>
		        <tr>
		          <th>Select</th>
		          <th>Name</th>
		          <th>Color</th>
		          <th>Size</th>
		          <th>Type</th>
		          <th>Price</th>
		          <th>Discounted Price</th>
		          <th>Status</th>
		          <th>Edit</th>
		          <th>Delete</th>
		        </tr>
		      </thead>
		      <tbody>

		      @foreach ($products as $product)
		        <tr>
		        	<td><input type="checkbox" value="1"/></td>
			        <td>{{ $product->name }}</td>
			        <td>{{ $product->color }}</td>
			        <td>{{ $product->size }}</td>
			        <td>{{ $product->type }}</td>
			        <td>SGD {{ $product->price }}</td>
			        <td>SGD {{ $product->discounted_price }}</td>
			        <td>{{ statusToString($product->status) }}</td>
			        <td><span class="glyphicon glyphicon-edit"></span>
</td>
			        <td><span class="glyphicon glyphicon-remove"></span>
</td>
		        </tr>
		        @endforeach

		      </tbody>
		</table>
	</div>
@stop