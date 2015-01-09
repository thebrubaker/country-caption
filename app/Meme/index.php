<?php
/*

Meme Maker, Copyright Devadutta Ghat, 2012

Goal: List all images in templates directory as list items with buttons to create a meme

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

<!--      <h1>Meme Maker</h1>
      <p>Use this document as a way to quick start any new project.<br> All you get is this message and a barebones HTML document.</p> -->

    <?php
    $count = 0;
    // Open directory handle 
    if ($handle = opendir('templates')) {
      // Go through the directory
      while (false !== ($entry = readdir($handle))) {
        $pngl = pathinfo($entry);
    
    if($pngl['extension'] == 'png' || $pngl['extension'] == 'jpg' || $pngl['extension'] == 'gif')
    {   
      $imbasename = $pngl['basename'];
      $imext = $pngl['extension'];
      if(($count == 0)||($count + 1) % 4 == 0)
      {
        print '<div class="row"><ul class="thumbnails">';
      }

      ?>
      <li class="span3">
                <div class="thumbnail">
                  <a href="create.php?t=<?php echo $entry; ?>"><img src="templates/<?php echo $entry; ?>" alt="" ></a>
                  <div class="caption">
          <h4><?php $k = explode(".",str_replace("_"," ",$entry)); echo $k[0];?></h4>
                    <p><a href="create.php?t=<?php echo $entry; ?>" class="btn">Create your own!</a></p>
                  </div>
                </div>
              </li>
      <?php
      if(($count + 1) % 4 == 0)
      {
        print '</ul></div>';
      }
      
      $count++;
      
    }
    }
    
      closedir($handle);
    
    }
    
    if(($count) % 4)
      print '</ul></div>';

    
    ?>

    
  
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
