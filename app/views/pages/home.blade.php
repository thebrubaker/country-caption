@extends('layouts.default')

@section('content')

<header class="jumbotron vertical-center">
	<div class="container">
		<h1><img src="../images/country_caption_logo.png" alt="Country Caption Challenge" class="img-responsive"></h1>
		<p>Post your best meme reaction to <strong>win a Down And Dirty Custom Camo Xbox One</strong></p>
		<img src="../images/xbox_one.png" alt="Xbox One Prize" class="img-responsive">
	</div>
</header>

<section id="caption-content" class="container">
	<div class="row caption-section">
		<div class="col-sm-12">
			<h1>{{ Config::get('memes.triggerCaption') }}</h1>
			<img class="img-responsive" src="{{ $triggerImage }}" alt="Landscape">
		</div>
	</div>
	<div id="reactions" class="row">
		@foreach($memeTemplates as $meme)
        <div class="col-xs-6 col-md-3 meme-item">
			<p>
				<img class="img-responsive" src="{{ '/' . $meme->dirname . '/' . $meme->basename }}" alt="{{ $meme->filename }}">
			</p>
        	<p><a href="memes/create/{{ $meme->filename }}" class="btn btn-primary">Post Your Reaction</a></p>
    	</div><!-- /.col-lg-3 -->
    	@endforeach
    </div><!-- /.row -->
</section>

@stop