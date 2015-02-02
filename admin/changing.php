<?php
	session_start();
	require_once("../db_include.php");
	
	$spw = $_POST['newpw'];
	
	$insert = "update admin set admin_password=\"$spw\" where admin_id=\"".$_SESSION['adminid']."\"";
	$results = mysql_query($insert) or die(mysql_error());
		
?>

<script>
	location.href = "changepassword.php?success=8";
</script>