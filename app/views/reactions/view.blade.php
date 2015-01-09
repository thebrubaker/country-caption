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
			<img src="../images/reactions/active/Forever_Alone.jpg" alt="This" class="img-responsive">
		</div>
		<div class="col-sm-3 col-xs-12">
			<h3>Link</h3>
			<p><input type="text" value="{{url()}}" id="share-link"></p>
			<p><button class="btn btn-primary">Copy and Share Link</button></p>
			<h3>Rate This Reaction</h3>
			<a href="" class="btn btn-primary">Like</a>
			<span><span class="badge">42</span> people like this</span>
		</div>
	</div>
</section>

@stop