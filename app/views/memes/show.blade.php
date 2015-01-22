@extends('layouts.default')

@section('content')

<section id="view-reaction" class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1>Share Meme</h1>
		</div>
	</div>
	<div class="row">
		<div id="memestage" class="col-md-6">
			<img src="{{ url($meme->file_path) }}" alt="This" class="img-responsive">
		</div>
		<div class="col-md-6 col-xs-12">
			<h2>To enter the Custom Camo Xbox One Giveaway, follow these steps:
			<h3>Step 1. Copy the link to your meme</h3>
			<p><input type="text" value="{{url('memes/show/' . $meme->slug)}}" id="share-link" onclick="this.select()"></p>
			<h3>Step 2. Paste the link in the comments of this Facebook post:</h3>
			<a href="{{Config::get('memes.facebook_post')}}" target="_blank">Down and Dirty Facebook Post Giveaway</a>
			<h3>Rate This Reaction</h3>
			@if(Auth::user())
				@if(Auth::user()->isAdmin())
					@if($meme->approved)
						<a href="{{ url('admin/deny/' . $meme->slug) }}" class="btn btn-danger">Deny</a>
					@else
						<a href="{{ url('admin/approve/' . $meme->slug) }}" class="btn btn-success">Approve</a>
					@endif
				@endif
			@endif
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
	@include('layouts.partials.tobacco')
</section>


@stop