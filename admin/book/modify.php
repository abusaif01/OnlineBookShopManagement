<?php
	require_once("../../db_include.php");
	
	$sbn = $_POST['txtbn'];
	$sfa = $_POST['txtfa'];
	$ssu = $_POST['txtsu'];
	$ssy = $_POST['txtsy'];
	$sca = $_POST['txtca'];
	$sna = $_POST['txtna'];
	$sau = $_POST['txtau'];
	$sye = $_POST['txtye'];
	$spu = $_POST['txtpu'];
	$sla = $_POST['txtla'];
	$sid = $_POST['book_id'];
		
	$insert = "update bookstore set isbn=\"$sbn\",faculty=\"$sfa\",subject=\"$ssu\",subjectyear=\"$sye\",category=\"$sca\",name=\"$sna\",author=\"$sau\",byear=\"$sye\",publisher=\"$spu\",language=\"$sla\" where b_id=\"$sid\"";
	$results = mysql_query($insert) or die(mysql_error());
		
?>

<script>
	location.href = "edit.php?success=3&id=<?php echo $sid;?>";
</script>