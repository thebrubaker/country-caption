<?php
// Copyright, Devadutta Ghat 2013
if(file_exists("../memeetc.php"))
{
	include_once("../memeetc.php");
}
else
{
	die("Inatall not complete: Error: Admin details not found. See Docs.");
}

if(!isset($_COOKIE["memeuser"]) && $_COOKIE["memeuser"] != $adminUser)
{
	header("location:login.php");
}	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
<?php include_once("../header.php"); ?>
    <!-- Le styles -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>

    <?php include_once("adminnavbar.php"); ?>
    <div class="container">
	<h1>Meme Admin</h1>
  

<?php

$_GET['page'] = isset($_GET['page']) ? $_GET['page'] : 1;
$pageCount = $memesPerPage * ($_GET['page'] - 1);
$count = 0;
$pageStart = 1;
$fileCount = 0;
$pageEnd = 0;
$files = array();

if(isset($_GET['d']) && $_GET['d'] == 0)
{
	print "<img src=\"../c/{$_GET['c']}.png\" width=\"200\">";
	print "<br><h3>Are you sure you want to delete this?</h3>";
	print "<form><input type=\"hidden\" name=\"c\" value=\"{$_GET['c']}\"><input type=\"hidden\" name=\"d\" value=\"1\"><input type=\"submit\" value=\"Yes\" class=\"btn btn-danger\" name=\"yes\"><input type=\"submit\" value=\"No\" class=\"btn\" name=\"no\"></form>";
	print "If not, just hit back button";
	return;
}
else if(isset($_GET['d']) && $_GET['d'] == 1 && isset($_GET['yes']))
{
	if(unlink("../c/{$_GET['c']}.png"))	
		print "<strong>Deleted Meme Successfully</strong>";
	else
		print "Cannot delete meme. Check settings.";	
}

if ($handle = opendir('../c')) 
{
	while (false !== ($file = readdir($handle))) 
	{
		if ($file != "." && $file != "..") 
		{
	      		$files[filemtime("../c/$file")] = $file;
	 	}
	}
}

closedir($handle);
krsort($files);

foreach ($files as $key => $entry)
{
	$pngl = pathinfo($entry);
	$res = 0;

	if($pngl['extension'] == 'png' || $pngl['extension'] == 'jpg' || $pngl['extension'] == 'gif')
	{
		$fileCount++;
		if($fileCount < $pageCount || ($fileCount > ($pageCount + $memesPerPage)))
		{
			$fileCount++;					
			continue;
		}

		$imbasename = $pngl['basename'];
		$imext = $pngl['extension'];
		if(($pageStart == 1) || ($count == 0)||($count + 1) % 4 == 0)
		{
			print '<div class="row"><ul class="thumbnails">';
			$pageStart = 0;
			$pageEnd = 0;
		}
		
		$k = explode(".",str_replace("_"," ",$entry));		

?>
		<li class="span3">
			<div class="thumbnail">
				<a href="../view.php?c=<?php echo $k[0]; ?>"><img
					src="../c/<?php echo $entry; ?>" alt=""> </a>
				<div class="caption">
					<a id="lovethis" class="btn btn-danger btn-mini" href="index.php?d=0&c=<?php echo $k[0]; ?>">
						<i class="icon-white icon-remove"></i>Delete
					</a>
					<a class="btn btn-mini btn-info"
						href="view.php?c=<?php echo $k[0]; ?>" class="btn">View</a>
				</div>
			</div>
		</li>
		<?php

		if(($count + 1) % 4 == 0)
		{
			$pageEnd = 1;
			print '</ul></div> <!-- Row end -->';
		}

		$count++;			
	}
}

$maxPages = ceil($fileCount / $memesPerPage);



if($pageEnd == 0)
{
	print '</ul></div> <!-- page end -->';
}

$prevPage = $_GET['page'] > 1 ? ($_GET['page'] - 1) : 1;
$nextPage = $_GET['page'] >= $maxPages ? $maxPages : ($_GET['page'] + 1);
		
?>
<div class = "row">
<div class="span12">
<div class="pagination">
  <ul>
  <li><a href="index.php?page=<?php echo $prevPage; ?>">Prev</a></li>
<?php
for($i = 1; $i <= $maxPages; $i++) {
	if($i == $_GET['page'])
		$cln = "class=\"disabled\"";
	else
		$cln = '';
	print   "<li $cln><a href=\"index.php?page=$i\">$i</a></li>";
}
?>

  <li><a href="index.php?page=<?php echo $nextPage; ?>">Next</a></li>
  </ul>
</div>
</div>
</div>
	
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
  </body>
</html>
