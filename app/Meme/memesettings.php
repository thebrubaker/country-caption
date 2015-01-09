<?php
/*

Meme Maker, Copyright Devadutta Ghat, 2012

*/
// Name that appears in logo and title
$sitename = "Meme Maker";
// Name that appears in the watermark
$watermark = "AwesomeMemeMaker.com";

//Number of memes to be shown on "recent" page
$memesPerPage = 20;

//Size in Kb
$maxFileSize = 400;

// Set to false if you do not want users to upload their own images
$enableCustomUpload = true;

// Checks some corner case security issues
$securityChecksEnabled = true;

// No need to edit
$dbtable = 'meme_maker_ratings';

/*********************************
 * Edit Database Settings Below  *
 *********************************/

// Database Settings

// Your MySQL Database username
$dbuname = "root";

// Your MySQL DB Password
$dbpass  = 'root';

// Your MySQL DB Name
$dbname  = 'meme';

// Your MySQL DB Host
$dbhost  = 'localhost:8888';

?>