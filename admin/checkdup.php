<?php
	require_once("../db_include.php");

	$snm = $_GET['name'];
	$sty = $_GET['type'];
	if($sty == "1")
		$query = "select count(*) from category where name=\"$snm\"";
	else if($sty == "2")
		$query = "select count(*) from team where name=\"$snm\"";
	else if($sty == "3")
		$query = "select count(*) from album where name=\"$snm\"";
	else if($sty == "4")
		$query = "select count(*) from cohort where cohort_name=\"$snm\"";
	else if($sty == "5")
		$query = "select count(*) from theme_bpractice where theme_name=\"$snm\"";
	else if($sty == "6")
		$query = "select count(*) from theme_project where theme_name=\"$snm\"";
	
	$results = mysql_query($query) or die(mysql_error());
	$rows = mysql_fetch_assoc($results);
	foreach($rows as $value)
	{
		echo $value;
	}
?>