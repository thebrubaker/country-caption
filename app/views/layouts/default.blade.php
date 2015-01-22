<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Facebook App ID -->
	<meta property="fb:app_id" content="440103766139228"/>
	
	<title>Country Caption Challenge</title>

	<!-- Bootstrap CSS -->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Main Stylesheet -->
	{{ HTML::style('css/style.css'); }}
	
	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Coda:800' rel='stylesheet' type='text/css'>
	

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>

	{{ HTML::script('js/facebook.js'); }}
	
	@include('layouts.partials.nav')
	<div class="container">
		@include('flash::message')
	</div>
	@yield('content')

	<!-- <footer class="footer">
		<div class="container">
			<div class="row">
				<p>
					This contest is only open to residents of Mississippi. Must be between 13 and 18 years old. <a href="#">Terms and Conditions</a>
				</p>
			</div>
		</div>
	</footer> -->

	<!-- Facebook Auth Login -->
	{{Form::open(['url' => 'sessions/login', 'method' => 'post', 'id' => 'facebook_login'])}}
		<input type="hidden" id="email" name="email">
		<input type="hidden" id="name" name="name">
		<input type="hidden" id="facebook_id" name="facebook_id">
	{{Form::close()}}

	<!-- jQuery -->
	<script src="//code.jquery.com/jquery.js"></script>
	
	<!-- Bootstrap JavaScript -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	
	<!-- Flash Message Modal Element -->
	<script>$('#flash-overlay-modal').modal();</script>

	@yield('scripts')

</body>
</html>