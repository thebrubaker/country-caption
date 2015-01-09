<!DOCTYPE html>
<html lang="en">
  <head>
  
<?php include_once("header.php"); ?>

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    
	<link rel='stylesheet' href="css/spectrum.css" />

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

<?php include_once("navbar.php"); 
if(!$enableCustomUpload) { die("Upload function not enabled"); }
?>

    <div class="container">
 
		 <div class="row">
			<div class="span8" >
      <h1>Upload Picture</h1>
	  <p>You can upload a picture and create a meme!</p>
			
<?php
$maxfs = $maxFileSize * 1024;
$allowedExts = array("jpg", "jpeg", "gif", "png","JPG","PNG","JPEG","GIF");

print "Allowed formats: gif/jpeg/png. Maximum file size: $maxFileSize KB<br>.";

if(isset($_FILES["file"]["name"]))
{
	$extension = end(explode(".", $_FILES["file"]["name"]));

	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/png")
	|| ($_FILES["file"]["type"] == "image/pjpeg"))
	&& ($_FILES["file"]["size"] < $maxfs)
	&& in_array($extension, $allowedExts))
	  {
	  if ($_FILES["file"]["error"] > 0)
		{
		echo "Invalid file.";
		}
	  else
		{
			$fn = substr(md5(time() * rand(1,1000)), 0, 5);
		  move_uploaded_file($_FILES["file"]["tmp_name"], "custom/$fn.$extension");
		  echo "<a href=\"create.php?p=$fn.$extension\"><img src=\"custom/$fn.$extension\"></a><h2>Click on the above image to add captions!</h2><p>If you want to change the image, upload another image.";
		}
	  }
}
?>
	  
<form action="" method="post" enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit" class="btn btn-large">
</form>
	  
	  </div>
			
			<div class="span4" >

			</div>
		 </div>
	
    </div> <!-- /container -->

	<div id="heightStage" style="display:none;"></div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
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
