<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="css/style.css" rel="stylesheet">
	<style>
	
	</style>
	<script>
	function fgo()
	{
		document.getElementById("frmgo").submit();
	}
	</script>
</head>
<body>
<form id="frmgo" action="main.php" method="post">
<div style="text-align:center;margin:auto;margin-top:220px">
	<img src="images/logo.gif" /><br />
	<div style="margin-top:25px;color:#4776C7;font-size:22px;text-shadow:1px 1px 1px #FFF">Please select your University
	
	<select name="selun" style="border:2px solid #093E98;margin-bottom:20px;">
		<option value="Manchester">University of Manchester</option>
		<option value="Leeds">University of Leeds</option>
		<option value="Southampton">University of Southampton</option>
		<option value="Nottingham">University of Nottingham</option>
	</select>	
	
	</div>
	<a href="javascript:fgo()" style="text-decoration:none;color: #000;line-height:45px;"><div class="divbuttongo">Go</div></a>
</div>
</form>
</body>
</html>
