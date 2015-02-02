<?php
session_start();

require_once("db_include.php");

$sid = $_GET['txtun'];
$spw = $_GET['txtpw'];

$query = "select count(*) from userlist where uname=\"$sid\"";
$results = mysql_query($query) or die(mysql_error());
$rows = mysql_fetch_assoc($results);
foreach($rows as $value)
{
	if($value == 0)
	{
		echo "1";
		exit();
	}
}

$query = "select count(*) from userlist where uname=\"$sid\" and password=\"".md5($spw)."\"";
$results = mysql_query($query) or die(mysql_error());
$rows = mysql_fetch_assoc($results);
foreach($rows as $value)
{
	if($value == 0)
	{
		echo "2";
		exit();
	}
}

$query = "select isactive from userlist where uname=\"$sid\"";
$results = mysql_query($query) or die(mysql_error());
$rows = mysql_fetch_assoc($results);
foreach($rows as $value)
{
	if($value == '0')
	{
		echo "";
	}
}

echo "0";

$query = "select u_id from userlist where uname=\"$sid\"";
$results = mysql_query($query) or die(mysql_error());
$rows = mysql_fetch_array($results);

$_SESSION['busername'] = $sid;
$_SESSION['buserid'] = $rows[0];
?>