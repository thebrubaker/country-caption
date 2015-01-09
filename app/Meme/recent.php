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
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

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

    <?php include_once("navbar.php"); ?>
    <div class="container">
	<h1>Recent Memes</h1>
  

<?php

include_once 'db.php';
$memedb = new wpdb($dbuname,$dbpass,$dbname,$dbhost);

$_GET['page'] = isset($_GET['page']) ? $_GET['page'] : 1;
$pageCount = $memesPerPage * ($_GET['page'] - 1);
$count = 0;
$pageStart = 1;
$fileCount = 0;
$pageEnd = 0;
$files = array();

if ($handle = opendir('c')) 
{
	while (false !== ($file = readdir($handle))) 
	{
		if ($file != "." && $file != "..") 
		{
	      		$files[filemtime("c/$file")] = $file;
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
		$res = $memedb->get_row($memedb->prepare("select count(*) as points from $dbtable where meme_id = '%s'",$k[0]));
		
		if(isset($res) && $res->points > 1)
			$cap = "People Love This!";			
		else
			$cap = "Person Loves This!";
		
?>
				<li class="span3">
					<div class="thumbnail">
					  <a href="view.php?c=<?php echo $k[0]; ?>"><img src="c/<?php echo $entry; ?>" alt="" ></a>
					  <div class="caption">
					<?php if(isset($res) && $res->points){ ?>
					<button id="loverate" class="btn btn-mini active disabled"><?php echo $res->points;?></button>  <button id="lovethis" class="btn btn-success btn-mini disabled"><i class="icon-white icon-heart"></i> <?php echo $cap; ?></button>
					<?php } ?>					  
						<a class="btn btn-mini btn-info" href="view.php?c=<?php echo $k[0]; ?>" class="btn">View</a>
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
  <li><a href="recent.php?page=<?php echo $prevPage; ?>">Prev</a></li>
<?php
for($i = 1; $i <= $maxPages; $i++) {
	if($i == $_GET['page'])
		$cln = "class=\"disabled\"";
	else
		$cln = '';
	print   "<li $cln><a href=\"recent.php?page=$i\">$i</a></li>";
}
?>

  <li><a href="recent.php?page=<?php echo $nextPage; ?>">Next</a></li>
  </ul>
</div>
</div>
</div>
	
    </div> <!-- /container -->

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
