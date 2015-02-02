<?php
	require_once("db_include.php");
	require_once("inc/myhost.php");
	
	$sun = $_POST['txtun'];
	$sna = $_POST['txtna'];
	$sla = $_POST['txtla'];
	$sem = $_POST['txtem'];
	$sue = $_POST['txtue'];
	$spa = $_POST['txtpa'];
	$suv = $_POST['txtuv'];
	
	$insert = "insert into userlist(name,lname,uname,email,password,university,uemail,imgname,isactive) values(\"$sna\",\"$sla\",\"$sun\",\"$sem\",\"".md5($spa)."\",\"$suv\",\"$sue\",'',0)";
	$results = mysql_query($insert) or die(mysql_error());	
	
	function sendemail($to, $subj, $body)
	{
	  $hostmail="no-reply@host.com";
	  date_default_timezone_set('UTC');
	  error_reporting(0);
	  $headers = "MIME-Version: 1.0" . "\r\n";
	  $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	  $headers .= "From: ".$hostmail." \r\n";
	  $headers .= "Reply-To : ".$hostmail." \r\n";
				
	  return mail($to, $subj, $body, $headers);
	 }
	
	
	$string = "<br />Hi $sna $sla<br />Thank you for sign up";
	
	sendemail($sem,'Member Registration',$string);
		
?>

<script>
	location.href = "success.php";
</script>