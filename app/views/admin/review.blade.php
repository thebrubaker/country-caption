@extends('layouts.default')

@section('content')

<div id="caption-content" class="container">
	<div id="reactions-list">
		<div class="row">
			<div class="col-xs-12">
				<h2>Review Memes</h2>
			</div>
		</div>
		<div class="row">
			@foreach($memes as $meme)
			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="reaction-entry">
					<img src="{{ url($meme->file_path) }}" class="img-responsive">
					<a href="{{ url('memes/show/' . $meme->slug) }}" class="btn btn-primary">View</a>
					@if($meme->approved)
						<a href="{{ url('admin/deny/' . $meme->slug) }}" class="btn btn-danger">Deny</a>
					@else
						<a href="{{ url('admin/approve/' . $meme->slug) }}" class="btn btn-success">Approve</a>
					@endif
					<span>Week {{$meme->week}}</span>
				</div>
			</div>
			@endforeach
		</div>
		<div class="row pagination-row">
			<nav>
				{{ $memes->links() }}
			</nav>
		</div>
	</div>
	@include('layouts.partials.video')
</div>

@stop