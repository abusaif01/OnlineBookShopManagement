<?php
	session_start();
	if(!isset($_SESSION['adminname'])){		
?>
<script>
	location.href = "../index.php";
</script>
<?php }
	require_once("../../db_include.php");
	$id = $_GET['id'];
	$query = "select isbn,faculty,subject,subjectyear,category,name,author,byear,publisher,language,imgname from bookstore where b_id=\"$id\"";
	$results = mysql_query($query) or die(mysql_error());
	$rows = mysql_fetch_array($results);
?>
<?php include("../../inc/myhost.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin Control Panel</title>
<link href="../../css/mystyle.css" rel="stylesheet" type="text/css" />
<link REL="SHORTCUT ICON" HREF="../../images/favicon.ico">
<script>
function faddphoto()
{
	if(document.getElementById("file").value == "")
	{
		document.getElementById("divmsgbox").innerHTML = "Please choose image file first.";
		document.getElementById("divmsgbox").style.display = "block";
		return;
	}
	document.getElementById('frmdetail').action='addphoto.php';
	document.getElementById('frmdetail').submit();
}

</script>
</head>

<body>
<div class="TopBG">
<div align="center">
	<div class="MyWidth">
	  <table width="100%" height="74" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="161"><div align="left"><img src="../../images/webpixel_trans.png" alt="Admin Control Panel" width="160" height="60" /></div></td>
          <td width="50%">
		  <div align="left" style="margin-left:15px">
		  <div class="Grey12" style="font-weight:bold"><?php echo $_SESSION['adminname'];?><span style="margin-left:10px; font-weight:100"><a href="../changepassword.php">Change password</a> </span></div>
		  <div class="Grey12" style="margin-top:1px">Admin Level: Admin Level</div>
		  <div style="margin-top:1px"><a href="../logout.php" class="BlueLink">Log out</a></div>
		  </div>
		  </td>
          <td width="50%">&nbsp;</td>
        </tr>
      </table>		</div>
</div>
</div>
<div class="BlueBG">
	<div align="center">
		<div class="MyWidth" align="left">
<div style="top:144px; position:absolute">
<?php include("../../inc/adminmenu.php");?>


<div style="margin-top:15px">
	  <input name="Button" type="button" class="BtnBlue" value="Add New Book" onClick="document.location.href='addnew.php'" style="font-weight:bold"/>
        </div>
</div>			
		</div>
	</div>
</div>
<div class="GreyBG">
	<div align="center">
		<div class="MyWidth" align="left">
				&nbsp;
		</div>
	</div>
</div>
<div align="center">
	<div class="MyWidth" align="left">
	  <div class="TM10">  <span class="Grey12"><a href="index.php" class="BlueLink">Books</a></span> <img src="../../images/arrow.gif" width="5" height="5" /> <span class="Grey12">Edit Book</span> </div>
	  <div class="dotline"></div>
	<div class="Grey25" style="margin-top:10px; font-weight:bold">Books </div>
	<div class="Grey12" style="margin-top:10px">Update the book from the list and click on &quot;Edit Book&quot; to update .</div>
    <div class='MsgBox' style='margin-left:25px;display:none' id="divmsgbox"></div>
		<?php
		$suc = "0";
		$sname = "";
		if(isset($_GET['success']))
		{
			$suc = $_GET['success'];
		}
		if($suc == "4"){?>
        <script>
			document.getElementById("divmsgbox").style.display = "block";
			document.getElementById("divmsgbox").innerHTML = "The photo of book has been added.";
		</script>
        <?php }
		if($suc == "5"){?>
        <script>
			document.getElementById("divmsgbox").style.display = "block";
			document.getElementById("divmsgbox").innerHTML = "The photo of book has been deleted.";
		</script>
        <?php }
		if($suc == "6"){?>
        <script>
			document.getElementById("divmsgbox").style.display = "block";
			document.getElementById("divmsgbox").innerHTML = "The file is not image file.";
		</script>
        <?php }
		if($suc == "7"){?>
        <script>
			document.getElementById("divmsgbox").style.display = "block";
			document.getElementById("divmsgbox").innerHTML = "The file size is too large.";
		</script>
        <?php }?>
      <div style="margin-top:15px; height:35px; width:80%; border-bottom:1px solid #ccc" class="LightBar" align="left">
	  
        <div class="Grey12" style="font-weight:bold; padding:10px 0px 0px 15px">Edit Book Details </div>
	    </div>
      <form id="frmdetail" method="post" action="" enctype="multipart/form-data">
      <input name="book_id" type="hidden" id="book_id" value="<?php echo $id;?>" />
      <div id="cdelete" class="white_content">
  <fieldset>
  <legend class="Grey12"> Confirm Delete </legend>   
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="right" class="Grey12" style="margin-right:10px">
      <div align="center">Are you sure you want to delete this book?      </div>
    </div>      </td>
    </tr>
  <tr>
    <td height="25"><div align="right" class="black12" >
      <div align="center">
        <input name="button" type="button" class="BtnRed" id="button" value="Confirm" onClick="document.getElementById('frmdetail').action='delete.php'; document.getElementById('frmdetail').submit();" />
        <input name="button2" type="button" class="Grey12" id="button2" onclick = "document.getElementById('cdelete').style.display='none';document.getElementById('fade').style.display='none';document.getElementById('cat_name').value='';document.getElementById('cat_id').value=''" value="Cancel"  />
        </div>
    </div></td>
    </tr>
</table>
</fieldset>
</div>
	  <table width="80%" border="0" cellspacing="0" cellpadding="0">
		<tr>
          <td width="24%" height="35" class="Greybg1" style="border-bottom:1px solid #ccc"><div class="Grey12" style="font-weight:bold">
              <div align="right" class="RP10">ISBN: </div>
          </div></td>
          <td width="43%" class="Greybg2" style="border-bottom:1px solid #ccc"><div class="LP15"><input name="mname" readonly="true" type="text" class="LoginField" id="mname" value="<?php echo $rows[0];?>" />
          </div></td>
          <td width="33%" class="Greybg2" style="border-bottom:1px solid #ccc; border-left:1px solid #ccc"><div style="background:#ccc; width:105px; height:75px; margin:auto; border:5px solid #fff"><div align="center" class="Grey112"><?php if($rows[10] != ""){?><img id="imgobj" src="../../images/book/<?php echo $rows[10];?>" width="105px" height="75px" /><?php }else{?><img id="imgobj" src="../../images/nophoto.jpg" width="105px" height="75px" /><?php }?></div></div>
            <div style="margin-top:10px" align="center">		
                	<?php if($rows[10] != ""){?>
			<a href="download.php?img=../../images/book/<?php echo $rows[10];?>"><input name="Button22" type="button" class="BtnBlue" value="Download" style="font-weight:bold;margin-bottom:10px" onClick="" /></a>
              <input name="Button22" type="button" class="BtnBlue" value="Delete Photo" style="font-weight:bold" onClick="document.getElementById('frmdetail').action='deletephoto.php'; document.getElementById('frmdetail').submit();" />
              	<?php }else{?>
                	<input type="file" id="file" name="file" />
                	<input name="Button22" type="button" class="BtnBlue" value="Add Photo" style="font-weight:bold" onClick="faddphoto()" />
                <?php }?>		
            </div></td>
		</tr>
		<tr >
          <td width="24%" height="35" class="Greybg1" style="border-bottom:1px solid #ccc"><div class="Grey12" style="font-weight:bold">
              <div align="right" class="RP10">Name : </div>
          </div></td>
          <td width="43%" colspan="2" class="Greybg2" style="border-bottom:1px solid #ccc"><div class="Grey12" style="padding:10px 15px 10px 15px"><?php echo $rows[5];?></div></td>
        </tr>
	<tr >
          <td width="24%" height="35" class="Greybg1" style="border-bottom:1px solid #ccc"><div class="Grey12" style="font-weight:bold">
              <div align="right" class="RP10">Author : </div>
          </div></td>
          <td width="43%" colspan="2" class="Greybg2" style="border-bottom:1px solid #ccc"><div class="Grey12" style="padding:10px 15px 10px 15px"><?php echo $rows[6];?></div></td>
        </tr>
	
	<tr >
          <td width="24%" height="35" class="Greybg1" style="border-bottom:1px solid #ccc"><div class="Grey12" style="font-weight:bold">
              <div align="right" class="RP10">Publisher : </div>
          </div></td>
          <td width="43%" colspan="2" class="Greybg2" style="border-bottom:1px solid #ccc"><div class="Grey12" style="padding:10px 15px 10px 15px"><?php echo $rows[8];?></div></td>
        </tr>	
	<tr >
          <td width="24%" height="35" class="Greybg1" style="border-bottom:1px solid #ccc"><div class="Grey12" style="font-weight:bold">
              <div align="right" class="RP10">Year : </div>
          </div></td>
          <td width="43%" colspan="2" class="Greybg2" style="border-bottom:1px solid #ccc"><div class="Grey12" style="padding:10px 15px 10px 15px"><?php echo $rows[7];?></div></td>
        </tr>
	<tr >
          <td width="24%" height="35" class="Greybg1" style="border-bottom:1px solid #ccc"><div class="Grey12" style="font-weight:bold">
              <div align="right" class="RP10">Language : </div>
          </div></td>
          <td width="43%" colspan="2" class="Greybg2" style="border-bottom:1px solid #ccc"><div class="Grey12" style="padding:10px 15px 10px 15px"><?php echo $rows[9];?></div></td>
        </tr>		
		<tr >
          <td width="24%" height="35" class="Greybg1" style="border-bottom:1px solid #ccc"><div class="Grey12" style="font-weight:bold">
              <div align="right" class="RP10">Faculty : </div>
          </div></td>
          <td width="43%" colspan="2" class="Greybg2" style="border-bottom:1px solid #ccc"><div class="Grey12" style="padding:10px 15px 10px 15px"><?php echo $rows[1];?></div></td>
        </tr>	
		
		<tr >
          <td width="24%" height="35" class="Greybg1" style="border-bottom:1px solid #ccc"><div class="Grey12" style="font-weight:bold">
              <div align="right" class="RP10">Subject : </div>
          </div></td>
          <td width="43%" colspan="2" class="Greybg2" style="border-bottom:1px solid #ccc"><div class="Grey12" style="padding:10px 15px 10px 15px"><?php echo $rows[2];?></div></td>
        </tr>	
		<tr >
          <td width="24%" height="35" class="Greybg1" style="border-bottom:1px solid #ccc"><div class="Grey12" style="font-weight:bold">
              <div align="right" class="RP10">Subject Year : </div>
          </div></td>
          <td width="43%" colspan="2" class="Greybg2" style="border-bottom:1px solid #ccc"><div class="Grey12" style="padding:10px 15px 10px 15px">
		<?php echo $rows[3];?>
	</div></td>
        </tr>
		<tr >
          <td width="24%" height="35" class="Greybg1" style="border-bottom:1px solid #ccc"><div class="Grey12" style="font-weight:bold">
              <div align="right" class="RP10">Category : </div>
          </div></td>
          <td width="43%" colspan="2" class="Greybg2" style="border-bottom:1px solid #ccc"><div class="Grey12" style="padding:10px 15px 10px 15px">
		<?php echo $rows[4];?>
	</div></td>
        </tr>		
		
	
        <tr>
          <td height="50"><input name="Button" type="button" class="Grey12" value="cancel" onClick="document.location.href='index.php'" /></td>
          <td colspan="2" class="LP15"><div align="right">
            <input name="Submit22" type="button" class="BtnRed" value="delete" onclick = "document.getElementById('cdelete').style.display='block';document.getElementById('fade').style.display='block';" style="margin-right:10px; font-weight:bold"/>
            <input name="Button2" type="button" class="BtnBlue" value="Edit" style="font-weight:bold" onClick="document.location.href='edit.php?id=<?php echo $id;?>&from=1'" />
          </div></td>
        </tr>
        <tr>
          <td height="80">&nbsp;</td>
          <td colspan="2" class="LP15">&nbsp;</td>
        </tr>
      </table>
        </form>
  </div>
</div>

<?php include("../../inc/quicklink.php");?>

<div class="Footer">
	<div align="center">
		<div class="MyWidth"><div class="White12" style="padding-top:15px" align="left">Admin Control Panel </div>
	</div>
	</div>
</div>
<div id="fade" class="black_overlay"></div>
</body>
</html>

