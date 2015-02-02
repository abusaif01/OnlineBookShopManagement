<?php
session_start();

require_once("../db_include.php");

$sid = $_GET['txtun'];
$spw = $_GET['txtpw'];

$query = "select count(*) from admin where admin_name=\"$sid\"";
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

$query = "select count(*) from admin where admin_name=\"$sid\" and admin_password=\"$spw\"";
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

$query = "select admin_id from admin where admin_name=\"$sid\" and admin_password=\"$spw\"";
$results = mysql_query($query) or die(mysql_error());
$rows = mysql_fetch_array($results);

echo "0";
$_SESSION['adminname'] = $sid;
$_SESSION['adminid'] = $rows[0];
?>