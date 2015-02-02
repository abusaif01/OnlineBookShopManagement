<?php
	session_start();
	require_once("../../db_include.php");
	
	$sid = $_POST['book_id'];
	
	$insert = "select imgname from bookstore where b_id=\"$sid\"";
	$results = mysql_query($insert) or die(mysql_error());
	$rows = mysql_fetch_array($results);
	
	$myFile = "../../images/book/$rows[0]";
	unlink($myFile);
	
	
	$insert = "update bookstore set imgname=\"\" where b_id=\"$sid\"";
	$results = mysql_query($insert) or die(mysql_error());
		
?>

<script>
	location.href = "detail.php?success=5&id=<?php echo $sid;?>";
</script>