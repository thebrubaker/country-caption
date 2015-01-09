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
			<form id="customize-form" method="post" action="/customize/{{$imageFile->filename}}">
				<div class="form-group">
					<label for="top-caption">Top Caption</label>
					<textarea id="top-caption" class="form-control" rows="2" placeholder="Top Caption"></textarea>
				</div>
				<div class="form-group">
					<label for="bottom-caption">Bottom Caption</label>
					<textarea id="bottom-caption" class="form-control" rows="2" placeholder="Bottom Caption"></textarea>
				</div>
				<input type="hidden" id="imagedata" name="imagedata">
				<button id="submit-form" class="btn btn-large btn-primary" type="submit">Create and Share</button>
			</form>
			
		</div>
	</div>
</section>

@stop

@section('scripts')
<!-- Meme Creator -->
<script src="../js/meme.js"></script>

<script>
$.fn.ready(function() {

	Meme('../{{ $imageFile->dirname . '/' . $imageFile->basename }}', 'canvas');

	$('#top-caption, #bottom-caption').keyup(function() {
		Meme('../{{ $imageFile->dirname . '/' . $imageFile->basename }}', 'canvas', $('#top-caption').val(), $('#bottom-caption').val());
	});

	$('#submit-form').click(function() {
		var canvas = document.getElementById('canvas');
		var url = canvas.toDataURL('image/jpeg');
		$('#imagedata').val(url);
	});

});
</script>
@stop