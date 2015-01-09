<?php
/*

Meme Maker, Copyright Devadutta Ghat, 2012

*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once("header.php"); ?>
<!-- Le styles -->
<link href="css/bootstrap.css" rel="stylesheet">
<style>
body {
	padding-top: 60px;
	/* 60px to make the container go all the way to the bottom of the topbar */
}
</style>

<link rel='stylesheet' href="css/spectrum.css" />
<link rel='stylesheet' href="css/ajaxupload.css" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<!-- Fav and touch icons -->
<link rel="shortcut icon" href="ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144"
	href="ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114"
	href="ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72"
	href="ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed"
	href="ico/apple-touch-icon-57-precomposed.png">
</head>

<body>

	<?php include_once("navbar.php"); ?>

	<div class="container">

		<h1>Create Meme</h1>


		<div class="row">
			<!-- Span 4 start -->
			<div class="span4">
				<h4>Add Caption</h4>

				<form>
					<br>Font Size<br> <select id="fontsizesel">
						<option value="24">24pt</option>
						<option value="32" selected>32pt</option>
						<option value="48">48pt</option>
						<option value="72">72pt</option>
						<option value="144">144pt</option>
					</select> <br> <br> Font Color <br> <input type='text' id="custom"
						value="#ffffff" /><br> Outline Color<br> <input type='text'
						id="strokesel" value="#000000" /><br>
					<hr>
					<br>Caption 1 <br>

					<textarea id="tc1">[Insert Caption]</textarea>
					<br>
					<button type="button" class="btn btn-success" id="cap1">Update</button>
					<button type="button" class="btn btn-danger" id="rcap1">Remove</button>
					<br> <br>Caption 2 <br>
					<textarea id="tc2">[Insert Caption]</textarea>
					<br>
					<button type="button" class="btn btn-success" id="cap2">Update</button>
					<button type="button" class="btn btn-danger" id="rcap2">Remove</button>
					<hr>
					<br>
				</form>

				<form id="createimg" action="view.php" method="post">
					<p>
						<button id="cands" class="btn btn-large btn-primary" type="button">Create
							and Share</button>
						<input type="hidden" id="imgdata" name="imgdata">
					</p>
				</form>
			</div>
			<!-- Span 4 start -->
			<div class="span8">
				<div id="memestage"></div>
			</div>
		</div>
	</div>
	<!-- /container -->

	<div id="heightStage" style="display: none;"></div>
	<!-- Le javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script>
	<?php
	
		include_once("memesettings.php");
		
		if(isset($_GET['p']))
		{
			$templateName = isset($_GET['p']) ? $_GET['p'] : 'null.jpg'; 

			if(file_exists("custom/$templatName"))
				$imgname = "custom/$templateName";
			else
				$imgname = 'templates/int.jpg';
				
			print "var gblImgName = \"$imgname\";";
			
		}
		else
		{		
			$templateName = isset($_GET['t']) ? $_GET['t'] : 'null.jpg'; 

			if(file_exists("templates/$templatName"))
				$imgname = "templates/$templateName";
			else
				$imgname = 'templates/int.jpg';
				
			//$imgname = 'templates/int.jpg';
			print "var gblImgName = \"$imgname\";";
		}
		
		print "var watermark =\"$watermark\";";
	
	?>
	</script>
	<script src="js/jquery.js"></script>
	<script src="js/kinetic.min.js"></script>
	<script src="js/meme.min.js"></script>
	<script src="js/spectrum.js"></script>
	<script src="js/bootstrap-transition.js"></script>
	<script src="js/bootstrap-alert.js"></script>
	<script src="js/bootstrap-modal.js"></script>
	<script src="js/bootstrap-dropdown.js"></script>
	<script src="js/bootstrap-scrollspy.js"></script>
	<script src="js/bootstrap-tab.js"></script>
	<script src="js/bootstrap-tooltip.js"></script>
	<script src="js/bootstrap-popover.js"></script>
	<script src="js/bootstrap-button.js"></script>
	<script src="js/bootstrap-collapse.js"></script>
	<script src="js/bootstrap-carousel.js"></script>
	<script src="js/bootstrap-typeahead.js"></script>

</body>
</html>
