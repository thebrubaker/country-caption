@extends('layouts.default')

@section('content')

<div id="caption-content" class="container">
	<div id="reactions-list">
		<div class="row">
			<div class="col-xs-12">
				<h2>My Memes</h2>
			</div>
		</div>
		<div class="row">
			@foreach($memes as $meme)
			<div class="col-sm-4 col-xs-6">
				<div class="reaction-entry">
					<img src="{{ url($meme->file_path) }}" class="img-responsive">
					<a href="{{ url('memes/show/' . $meme->slug) }}" class="btn btn-primary">View</a>
					@if(!Auth::user())
						<a href="{{ url('memes/like/' . $meme->slug) }}" class="btn btn-primary" id="like">Like</a>
					@elseif(!$meme->users->find(Auth::user()->id))
						<a href="{{ url('memes/like/' . $meme->slug) }}" class="btn btn-primary" id="like">Like</a>
					@else
						<a href="{{ url('memes/unlike/' . $meme->slug) }}" class="btn btn-primary">Unlike</a>
					@endif
					<span><span class="badge">{{$meme->users()->count()}}</span> people like this</span>
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