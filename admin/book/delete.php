<?php
	require_once("../../db_include.php");
	
	$sid = $_POST['book_id'];
	
	$insert = "select imgname from bookstore where b_id=\"$sid\"";
	$results = mysql_query($insert) or die(mysql_error());
	$rows = mysql_fetch_array($results);
	
	$insert = "delete from bookstore where b_id=\"$sid\"";
	$results = mysql_query($insert) or die(mysql_error());
	
	if($rows[0] != "")
	{
		$myFile = "../../images/book/$rows[0]";
		unlink($myFile);
	}
		
?>

<script>
	location.href = "index.php?success=1";
</script>