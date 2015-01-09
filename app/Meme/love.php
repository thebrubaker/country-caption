<?php
include_once 'db.php';
include_once 'memesettings.php';
include_once("db.php");

$memedb = new wpdb($dbuname,$dbpass,$dbname,$dbhost);
$ip = $_SERVER['REMOTE_ADDR'];
$memeid = $_GET['meme'];
$cr = $_GET['cr'];

$flag = 0;

if($handle = opendir('c'))
{
	while (false !== ($file = readdir($handle)))
	{
		if ($file != "." && $file != "..")
		{
			$pngl = pathinfo($file);
			$k = explode('.',$pngl['basename']);
			if($k[0] == $memeid)
				$flag = 1;
		}
	}
}

closedir($handle);
if($flag == 0)
	die("$memeid -2");

$rowCrCheck = $memedb->get_row($memedb->prepare("select count(*) as points from $dbtable where `meme_id` = '%s'",$memeid));
$rowIpCheck = $memedb->get_row($memedb->prepare("select * from $dbtable where `meme_id`='%s' and `ip_address`='%s'",$memeid,$ip));

if($cr == 1)
{
	echo json_encode(array("points" => $rowCrCheck->points, "rated" => isset($rowIpCheck)));
	return ;
}


// Check if this meme has already been rated by this IP Address
if($rowIpCheck)
{
	die("-1");
} 
else
{
	$memedb->insert($dbtable,array('ip_address' => $ip, 'rating' => 1, 'meme_id' => $memeid));
}

echo intval($rowCrCheck->points) + 1;

?>