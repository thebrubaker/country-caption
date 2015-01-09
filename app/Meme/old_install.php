<?php
/*

Meme Maker, Copyright Devadutta Ghat, 2012

*/
?>
<?php

function generateRandomString($length = 10) {
    $characters = '123456789ABCDEFGHIJKLMNPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}


include_once('memesettings.php');
include_once 'db.php';

print "<h1>Installing Meme Maker</h1>";

if($dbuname == 'vadepa2ysa')
{
	die("Please open memesettings.php and set up your database details. Refer doumentation for details");	
}

$link = mysql_connect($dbhost, $dbuname, $dbpass);

if (!$link) {
	print "<h1>Could not connect to database, check settings</h1>";
	die('Could not connect: ' . mysql_error());
}
echo 'Connected to database successfully..<br>';


$db_selected = mysql_select_db($dbname, $link);
if (!$db_selected) {
	print "<h1></h1>";
	die ("Cannot select database $dbname " . mysql_error());
}
echo 'Selected database..<br>';

$query = "CREATE TABLE IF NOT EXISTS `meme_maker_ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meme_id` varchar(16) NOT NULL,
  `ip_address` varchar(32) NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);";

$result = mysql_query($query) or die(mysql_error());

if($result) {
	print "Meme Maker database installed successfully!<br>";
	print '<p style="padding: 5px; background-color: #EEFF57; border: 2px solid black;"><strong>Important:</strong> Delete install.php to complete installation.</p>';
}
else
{
	die("Please check your settings.");
}

if(!file_exists("memeetc.php"))
{
	$adminUname = "admin";
	$adminPs = generateRandomString(6);
}
else if(isset($_POST['aun']) && $_POST['aun'] != '' && $_POST['aup'] != '')
{	
	$adminUname = $_POST['aun'];
	$adminPs = $_POST['aup'];
}
else
{
	include_once("memeetc.php");
	$adminUname = $adminUser;
	$adminPs = $adminPass;
}	
	
	$fh = fopen("memeetc.php","w+");
	fprintf($fh,'<?php '."\n\t".'$adminUser = "'.$adminUname.'";'."\n\t".'$adminPass = "'.$adminPs.'";'."\n".'?>');
	fclose($fh);

print "Your admin username and password is set as below. If you want to update it, just edit it here and click on save.<br>If you do not want to change the default password, you are done with the install!";
?>
<form method="post" action="">
Username: <input name = "aun" type="text" value="<?php echo $adminUname; ?>"><br>
Username: <input name = "aup" type="text" value="<?php echo $adminPs; ?>"><br>
<input type="submit" value="Save">
<?php
?>