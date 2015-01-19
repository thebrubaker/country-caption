@extends('layouts.default')

@section('content')

<section id="view-reaction" class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1>Share Reaction</h1>
		</div>
	</div>
	<div class="row">
		<div id="memestage" class="col-sm-6">
			<img src="{{ url($meme->file_path) }}" alt="This" class="img-responsive">
		</div>
		<div class="col-sm-6 col-xs-12">
			<h2>To enter the Custom Camo Xbox One Giveaway, follow these steps:
			<h3>Step 1. Copy the link to your meme</h3>
			<p><input type="text" value="{{url()}}" id="share-link"></p>
			<h3>Step 2. Paste the link in the comments of this Facebook post:</h3>
			<a href="#" >Down and Dirty Facebook Post Giveaway</a>
			<h3>Rate This Reaction</h3>
			@if(!Auth::user())
				<a href="{{ url('memes/like/' . $meme->slug) }}" class="btn btn-primary">Like</a>
			@elseif(!$meme->users->find(Auth::user()->id))
				<a href="{{ url('memes/like/' . $meme->slug) }}" class="btn btn-primary">Like</a>
			@else
				<a href="{{ url('memes/unlike/' . $meme->slug) }}" class="btn btn-primary">Unlike</a>
			@endif
			<span><span class="badge">{{$meme->users()->count()}}</span> people like this</span>

			@if(Auth::user()->isAdmin())
				@if($meme->approved)
					<a href="{{ url('admin/deny/' . $meme->slug) }}" class="btn btn-danger">Deny</a>
				@else
					<a href="{{ url('admin/approve/' . $meme->slug) }}" class="btn btn-success">Approve</a>
				@endif
			@endif
		</div>
	</div>
</section>


@stop