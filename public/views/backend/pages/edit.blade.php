@section('content')
	<div class="form-title">Edit Page</div>

	<div class="form-container clearfix">

	@include('errors.form')

	<form role="form" action="{{ route('pages.update', $page->id) }}" method="POST">

			<div class="form-group">
			    <label for="title">Name</label>
			    <input type="text" name="title" class="form-control" placeholder="Enter title" value="{{ $page->title }}">
			</div>

			<div class="form-group input-group input-group-md">
				  <span class="input-group-addon">http://smalltimeshop.dev/pages/</span>
				  <input type="text" name="slug" class="form-control" value="{{ $page->slug }}">
			</div>

			<div class="form-group">
			    <label for="content">Content</label>
			    <textarea name="content" id="content" class="form-control">{{ $page->content }}</textarea>
			</div>

			<div class="row">
				<div class="form-group col-md-6">
				    <label for="status">Status</label>
					{{ Form::select('status', array('1' => 'Enabled', '0' => 'disabled'), $page->status, array('class' => 'form-control')) }}
				</div>
			</div>

			<button type="submit" class="btn btn-primary btn-lg">Submit</button>
			<a href="{{ route('pages') }}" class="btn btn-default btn-lg">Cancel</a>
		
	</form>

	</div>
@stop