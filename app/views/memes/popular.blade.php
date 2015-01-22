@extends('layouts.default')

@section('content')

<div id="caption-content" class="container nav-fix">
	<div class="row caption-section">
		<div class="col-sm-12">
			<h1>{{ Config::get('memes.triggerCaption') }}</h1>
			<img class="img-responsive" src="{{ $triggerImage }}" alt="Landscape">
		</div>
	</div>
	<div id="reactions-list">
		<div class="row">
			<div class="col-xs-12">
				<h2>Popular Memes</h2>
			</div>
		</div>
		<div class="row">
			@foreach($memes as $meme)
			<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
				<div class="reaction-entry">
					<img src="{{ url($meme->file_path) }}" class="img-responsive">
					@if(Auth::user())
						@if(Auth::user()->isAdmin())
							@if($meme->approved)
								<a href="{{ url('admin/deny/' . $meme->slug) }}" class="btn btn-danger">Deny</a>
							@else
								<a href="{{ url('admin/approve/' . $meme->slug) }}" class="btn btn-success">Approve</a>
							@endif
						@endif
					@endif
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
	@include('layouts.partials.tobacco')
</div>



@stop