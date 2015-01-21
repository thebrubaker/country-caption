<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{url()}}">
				<img src="{{url('images/dd_logo.png')}}" alt="Down and Dirty South" class="img-responsive">
			</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li>{{ link_to_route('home', 'Home') }}</li>
				<li>{{ link_to_route('memes.popular', 'Popular') }}</li>
				@if(Auth::user())
					<li>{{ link_to_route('memes.owned', 'My Memes') }}</li>
					@if(Auth::user()->isAdmin())
						<li>{{ link_to_route('admin.review', 'Review Memes') }}</li>
						<li>{{ link_to_route('admin.all', 'All Memes') }}</li>
					@endif
				@endif
			</ul>
			<div class="nav navbar-nav navbar-right">
				<span class="navbar-brand hidden-sm">Keep It Country. Keep It Tobacco Free.</span>
			</div>
		</div>
	</div>
</nav>