<?php
	session_start();
	require_once("../../db_include.php");
	
	$sid = $_POST['book_id'];
	$sfl = $_FILES["file"]["name"];
	$arrch = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
	$strpre = rand(1, 1000) . $arrch[rand(0, 25)];
		

	 $errors=0;
	 
	 function getExtension($str) {

         $i = strrpos($str,".");
         if (!$i) { return ""; } 
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 	}
 
	 if($_SERVER["REQUEST_METHOD"] == "POST")
	 {
	 	$uploadedfile = $_FILES['file']['tmp_name'];
	
	  	if ($sfl) 
	  	{
	  		$filename = stripslashes($_FILES['file']['name']);
			$extension = getExtension($filename);
			$extension = strtolower($extension);
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
	  		{?>
				<script>
					location.href = "detail.php?success=6&id=<?php echo $sid;?>";
				</script>
			<?php exit();}
			else
			{
				$filename = "../../images/book/".$strpre."_". $_FILES['file']['name'];
	
				move_uploaded_file($_FILES["file"]["tmp_name"], $filename);
			}
		}
	}	

	$sfl = $strpre . "_" . $sfl;
	$insert = "update bookstore set imgname=\"$sfl\" where b_id=\"$sid\"";
	$results = mysql_query($insert) or die(mysql_error());
		
?>

<script>
	 location.href = "detail.php?success=4&id=<?php echo $sid;?>";
</script>