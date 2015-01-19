@extends('layouts.default')

@section('content')

<header class="jumbotron vertical-center">
	<div class="container">
		<h1>Country Caption Challenge</h1>
		<p>Post your best meme reaction to win a <a href="#">Down And Dirty Custom Camo Xbox One</a>.</p>
	</div>
</header>

<section id="caption-content" class="container">
	<div class="row caption-section">
		<div class="col-sm-12">
			<h1>When your little brothers think it's a good idea to play with the paint...</h1>
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