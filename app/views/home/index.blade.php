@extends('layouts.default')

@section('content')

<header class="jumbotron vertical-center">
	<div class="container">
		<h1>Country Caption Challenge</h1>
		<p>Post your best reaction to win a Down And Dirty prize pack.</p>
	</div>
</header>

<section id="caption-content" class="container">
	<div class="row caption-section">
		<div class="col-sm-12">
			<h1>That moment when your little brother ruins the hunt.</h1>
			<img class="img-responsive" src="images/landscape.jpg" alt="Landscape">
		</div>
	</div>
	<div id="reactions" class="row">
		@foreach($reactionImages as $reactionImage)
        <div class="col-xs-6 col-md-3">
			<p><img class="img-responsive" src="{{ $reactionImage->dirname . '/' . $reactionImage->basename }}" alt="{{ $reactionImage->filename }}"></p>
        	<p><a href="customize/{{ $reactionImage->filename }}" class="btn btn-primary">Post Your Reaction</a></p>
    	</div><!-- /.col-lg-3 -->
    	@endforeach
    </div><!-- /.row -->
</section>

@stop