@extends('layouts.default')

@section('content')

<div id="caption-content" class="container">
	<div class="row caption-section">
		<div class="col-sm-12">
			<h1>That moment when your little brother ruins the hunt.</h1>
			<img class="img-responsive" src="../images/landscape.jpg" alt="Landscape">
		</div>
	</div>
	<div id="reactions-list">
		<div class="row">
			<div class="col-xs-12">
				<h2>Popular Reactions</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 col-xs-6">
				<div class="reaction-entry">
					<img src="../images/reactions/active/Forever_Alone.jpg" class="img-responsive">
					<a href="../reactions/view" class="btn btn-primary">View</a>
					<a href="../reactions/view" class="btn btn-primary">Like</a>
					<span><span class="badge">42</span> people like this</span>
				</div>
			</div>
			<div class="col-sm-4 col-xs-6">
				<div class="reaction-entry">
					<img src="../images/reactions/active/Forever_Alone.jpg" class="img-responsive">
					<a href="../reactions/view" class="btn btn-primary">View</a>
					<a href="../reactions/view" class="btn btn-primary">Like</a>
					<span><span class="badge">42</span> people like this</span>
				</div>
			</div>
			<div class="col-sm-4 col-xs-6">
				<div class="reaction-entry">
					<img src="../images/reactions/active/Forever_Alone.jpg" class="img-responsive">
					<a href="../reactions/view" class="btn btn-primary">View</a>
					<a href="../reactions/view" class="btn btn-primary">Like</a>
					<span><span class="badge">42</span> people like this</span>
				</div>
			</div>
			<div class="col-sm-4 col-xs-6">
				<div class="reaction-entry">
					<img src="../images/reactions/active/Forever_Alone.jpg" class="img-responsive">
					<a href="../reactions/view" class="btn btn-primary">View</a>
					<a href="../reactions/view" class="btn btn-primary">Like</a>
					<span><span class="badge">42</span> people like this</span>
				</div>
			</div>
			<div class="col-sm-4 col-xs-6">
				<div class="reaction-entry">
					<img src="../images/reactions/active/Forever_Alone.jpg" class="img-responsive">
					<a href="../reactions/view" class="btn btn-primary">View</a>
					<a href="../reactions/view" class="btn btn-primary">Like</a>
					<span><span class="badge">42</span> people like this</span>
				</div>
			</div>
			<div class="col-sm-4 col-xs-6">
				<div class="reaction-entry">
					<img src="../images/reactions/active/Forever_Alone.jpg" class="img-responsive">
					<a href="../reactions/view" class="btn btn-primary">View</a>
					<a href="../reactions/view" class="btn btn-primary">Like</a>
					<span><span class="badge">42</span> people like this</span>
				</div>
			</div>
		</div>
		<div class="row pagination-row">
			<nav>
			  <ul class="pagination">
			    <li>
			      <a href="#" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			      </a>
			    </li>
			    <li><a href="#">1</a></li>
			    <li><a href="#">2</a></li>
			    <li><a href="#">3</a></li>
			    <li><a href="#">4</a></li>
			    <li><a href="#">5</a></li>
			    <li>
			      <a href="#" aria-label="Next">
			        <span aria-hidden="true">&raquo;</span>
			      </a>
			    </li>
			  </ul>
			</nav>
		</div>
	</div>
	@include('layouts.partials.video')
</div>



@stop