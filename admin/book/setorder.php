<?php
	require_once("../../db_include.php");
	
	$sid = $_GET['id'];
	$sva = $_GET['val'];
	
	$insert = "update mosaic_images set avail=\"$sva\" where m_id=\"$sid\"";
	$results = mysql_query($insert) or die(mysql_error());
?>