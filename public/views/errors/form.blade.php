@if(Session::has('errors'))
	
	<div class="alert alert-danger alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<ul>
		@foreach($errors->all() as $error)
				<li>{{ $error }}</li>	
			
		@endforeach
		</ul>
	</div>

@endif

@if(Session::has('success'))
	
	<div class="alert alert-success alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		{{ Session::get('success') }}
	</div>

@endif