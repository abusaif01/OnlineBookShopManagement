<?php
header("Content-type: image/jpeg");
header('Content-Disposition: attachment; filename="scenario.jpg"');
readfile($_REQUEST['img']);
?>