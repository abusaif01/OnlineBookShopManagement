<?php
session_start();

unset($_SESSION['adminname']);
unset($_SESSION['adminid']);
?>
<script>
	location.href="index.php";
</script>