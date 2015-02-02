<?php
session_start();

unset($_SESSION['busername']);
unset($_SESSION['buserid']);
?>
<script>
	location.href="main.php";
</script>