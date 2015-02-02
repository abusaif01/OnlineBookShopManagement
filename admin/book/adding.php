<?php
	session_start();
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
					location.href = "addnew.php?success=9";
				</script>
			<?php exit();}
			else
			{
	 			
	
				$filename = "../../images/book/".$strpre."_". $_FILES['file']['name'];
	
				move_uploaded_file($_FILES["file"]["tmp_name"], $filename);
			}
		}
	}	
	
	if($sfl != "")
		$sfl = $strpre . "_" . $sfl;
	$insert = "Insert into bookstore(isbn,faculty,subject,subjectyear,category,name,author,byear,publisher,language,imgname,bcondition,blocation) values(\"$sbn\",\"$sfa\",\"$ssu\",\"$ssy\",\"$sca\",\"$sna\",\"$sau\",\"$sye\",\"$spu\",\"$sla\",\"$sfl\",'','')";
	$results = mysql_query($insert) or die(mysql_error());	
		
?>

<script>
	location.href = "index.php?success=2";
</script>