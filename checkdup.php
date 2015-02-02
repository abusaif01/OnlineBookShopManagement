<?php
	require_once("db_include.php");

	$sem = $_GET['em'];
	$sun = $_GET['un'];
			
		$query = "select count(*) from userlist where uname=\"$sun\"";
		$results = mysql_query($query) or die(mysql_error());
		$rows = mysql_fetch_array($results);
		if($rows[0] != "0")
		{
			echo "1";
			exit();
		}
		
		$query = "select count(*) from userlist where email=\"$sem\"";
		$results = mysql_query($query) or die(mysql_error());
		$rows = mysql_fetch_array($results);
		if($rows[0] != "0")
		{
			echo "2";
			exit();
		}
		echo "0";
?>