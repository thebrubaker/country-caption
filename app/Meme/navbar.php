<?php
if(file_exists("install.php"))
{
	die('<p style="padding: 5px; background-color: #EEFF57; border: 2px solid black;"><strong>Important:</strong> Delete install.php to complete installation.</p>');
}
 
include_once("memesettings.php"); 
?>
<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php"><?php echo $sitename; ?></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="index.php">Home</a></li>
			  <li><a href="popular.php">Popular</a></li>
              <li><a href="recent.php">Recent</a></li>
			  <?php if($enableCustomUpload) { ?>
			  <li><a href="upload.php">Upload</a></li>
			  <?php } ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
