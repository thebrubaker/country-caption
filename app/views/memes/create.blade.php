@extends('layouts.default')

@section('content')

<section id="create" class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1>Create Reaction</h1>
		</div>
	</div>
	<div class="row">
		<div id="memestage" class="col-sm-6">
			<canvas id="canvas"></canvas>
		</div>
		<div class="col-sm-3">
			<form id="customize-form" method="post" action="">
				<div class="form-group">
					<label for="top-caption">Top Caption</label>
					<textarea id="top-caption" class="form-control" rows="2" placeholder="Top Caption"></textarea>
				</div>
				<div class="form-group">
					<label for="bottom-caption">Bottom Caption</label>
					<textarea id="bottom-caption" class="form-control" rows="2" placeholder="Bottom Caption"></textarea>
				</div>
				<input type="hidden" id="imagedata" name="imagedata">
				<input type="hidden" id="email" name="email">
				<input type="hidden" id="name" name="name">
				<input type="hidden" id="facebook_id" name="facebook_id">
			</form>
			<div id="status" class="alert alert-danger hidden" role="alert"></div>
			<button id="submit-form" class="btn btn-large btn-primary" type="submit">Create and Share</button>
		</div>
	</div>
</section>

@stop

@section('scripts')
<!-- Meme Creator -->
<script src="/js/meme.js"></script>

<script>
$.fn.ready(function() {
	// Create canvas elements
	Meme('{{$meme}}', 'canvas');
	// Update canvas on key up
	$('#top-caption, #bottom-caption').keyup(function() {
		Meme('{{$meme}}', 'canvas', $('#top-caption').val(), $('#bottom-caption').val());
	});
});
</script>
@stop