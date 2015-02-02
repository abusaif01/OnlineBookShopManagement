
<?php
	include("config.php");
	$link = mysql_connect($hostname, $username, $password);
	mysql_select_db("$databasename");
?>