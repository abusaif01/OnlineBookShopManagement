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
function fsub()
{
	document.getElementById("form1").submit();
}
function fchg(obj)
{
	var obj1 = document.getElementById("divsubject");
	var str = "<select name='txtsu' class='LP15 LoginField' id='txtsu' style='width:92%;height:25px'>";
	if(obj.value == "Business and Law")
	{
		str += "<option value='Law'>Law</option>";
		str += "<option value='European/International Legal Studies'>European/International Legal Studies</option>";
		str += "<option value='Maritime Law'>Maritime Law</option>";
		str += "<option value='Accounting and Finance'>Accounting and Finance</option>";
		str += "<option value='International Marketing'>International Marketing</option>";
		str += "<option value='Management'>Management</option>";
		str += "<option value='Management Sciences and Accounting'>Management Sciences and Accounting</option>";
		str += "<option value='Entrepreneurship'>Entrepreneurship</option>";
		str += "<option value='Marketing'>Marketing</option>";
	}
	else if(obj.value == "Engineering and the Environment")
	{
		str += "<option value='Acoustical Engineering'>Acoustical Engineering</option>";
		str += "<option value='Aerospace Engineering'>Aerospace Engineering</option>";
		str += "<option value='Audiology'>Audiology</option>";
		str += "<option value='Civil and Environmental Engineering'>Civil and Environmental Engineering</option>";
		str += "<option value='Environmental Services'>Environmental Services</option>";
		str += "<option value='Foundation Year'>Foundation Year</option>";
		str += "<option value='Mechanical Engineering'>Mechanical Engineering</option>";
		str += "<option value='Ship Science'>Ship Science</option>";
	}
	str += "</select>";
	obj1.innerHTML = str;
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
	  <div class="TM10"> <span class="Grey12"><a href="index.php" class="BlueLink">Books</a></span> <img src="../../images/arrow.gif" width="5" height="5" /> <span class="Grey12">Edit Book</span> </div>
	  <div class="dotline"></div>
	<div class="Grey25" style="margin-top:10px; font-weight:bold">Book </div>
	<div class="Grey12" style="margin-top:10px">Update the book from the list and click on &quot;Make Changes&quot; to update .</div>
    <div id='divmsgbox' class='MsgBox' style='margin-left:25px;display:none;'></div>
		<?php
		$suc = "0";
		if(isset($_GET['success']))
		{
			$suc = $_GET['success'];
		}
		if($suc == "3"){?>
        <script>
			document.getElementById("divmsgbox").style.display = "block";
			document.getElementById("divmsgbox").innerHTML = "Image has been updated.";
		</script>
        <?php }
		?>
        
      <div style="margin-top:15px; height:35px; width:80%; border-bottom:1px solid #ccc" class="LightBar" align="left">
	  
        <div class="Grey12" style="font-weight:bold; padding:10px 0px 0px 15px">Book Details </div>
	    </div>
      <form id="form1" name="form1" method="post" action="modify.php" onSubmit="return fsub()">
      <input type="hidden" name="book_id" value="<?php echo $id;?>" />
	  <table width="80%" border="0" cellspacing="0" cellpadding="0">
		<tr>
          <td width="25%" height="35" class="Greybg1" style="border-bottom:1px solid #ccc"><div class="Grey12" style="font-weight:bold">
              <div align="right" class="RP10">ISBN: </div>
          </div></td>
          <td width="75%" class="Greybg2" style="border-bottom:1px solid #ccc"><div class="LP15">
		<input type="text" name="txtbn" class="LoginField" style="width:90%;" value="<?php echo $rows[0];?>" />
          </div></td>
        </tr>
	<tr>
          <td width="25%" height="35" class="Greybg1" style="border-bottom:1px solid #ccc"><div class="Grey12" style="font-weight:bold">
              <div align="right" class="RP10">Name: </div>
          </div></td>
          <td width="75%" class="Greybg2" style="border-bottom:1px solid #ccc"><div class="LP15">
		<input type="text" name="txtna" class="LoginField" style="width:90%;" value="<?php echo $rows[5];?>" />
          </div></td>
        </tr>
	<tr>
          <td width="25%" height="35" class="Greybg1" style="border-bottom:1px solid #ccc"><div class="Grey12" style="font-weight:bold">
              <div align="right" class="RP10">Author: </div>
          </div></td>
          <td width="75%" class="Greybg2" style="border-bottom:1px solid #ccc"><div class="LP15">
		<input type="text" name="txtau" class="LoginField" style="width:90%;" value="<?php echo $rows[6];?>" />
          </div></td>
        </tr>
	<tr>
          <td width="25%" height="35" class="Greybg1" style="border-bottom:1px solid #ccc"><div class="Grey12" style="font-weight:bold">
              <div align="right" class="RP10">Publisher: </div>
          </div></td>
          <td width="75%" class="Greybg2" style="border-bottom:1px solid #ccc"><div class="LP15">
		<input type="text" name="txtpu" class="LoginField" style="width:90%;" value="<?php echo $rows[8];?>" />
          </div></td>
        </tr>
	<tr>
          <td width="25%" height="35" class="Greybg1" style="border-bottom:1px solid #ccc"><div class="Grey12" style="font-weight:bold">
              <div align="right" class="RP10">Year: </div>
          </div></td>
          <td width="75%" class="Greybg2" style="border-bottom:1px solid #ccc"><div class="LP15">
		<input type="text" name="txtye" class="LoginField" style="width:90%;" value="<?php echo $rows[7];?>" />
          </div></td>
        </tr>	
	<tr>
          <td width="25%" height="35" class="Greybg1" style="border-bottom:1px solid #ccc"><div class="Grey12" style="font-weight:bold">
              <div align="right" class="RP10">Language: </div>
          </div></td>
          <td width="75%" class="Greybg2" style="border-bottom:1px solid #ccc"><div class="LP15">
		<input type="text" name="txtla" class="LoginField" style="width:90%;" value="<?php echo $rows[9];?>" />
          </div></td>
        </tr>
	<tr>
          <td width="25%" height="35" class="Greybg1" style="border-bottom:1px solid #ccc"><div class="Grey12" style="font-weight:bold">
              <div align="right" class="RP10">Faculty: </div>
          </div></td>
          <td width="75%" class="Greybg2" style="border-bottom:1px solid #ccc"><div class="LP15">
		<select name="txtfa" class="LP15 LoginField" id="txtfa" style="width:92%;height:25px" onchange="fchg(this)">
			<option value="Business and Law">Business and Law</option>
			<option value="Engineering and the Environment">Engineering and the Environment</option>
			<!--<option value="Social and Human Sciences">Social and Human Sciences</option>
			<option value="Medicine">Medicine</option>-->
		</select>
          </div></td>
        </tr>
	<tr>
          <td width="25%" height="35" class="Greybg1" style="border-bottom:1px solid #ccc"><div class="Grey12" style="font-weight:bold">
              <div align="right" class="RP10">Subject: </div>
          </div></td>
          <td width="75%" class="Greybg2" style="border-bottom:1px solid #ccc"><div class="LP15" id="divsubject">
		<select name="txtsu" class="LoginField" style="width:92%;height:25px">
		</select>
          </div></td>
        </tr>
	<tr>
          <td width="25%" height="35" class="Greybg1" style="border-bottom:1px solid #ccc"><div class="Grey12" style="font-weight:bold">
              <div align="right" class="RP10">Subject Year: </div>
          </div></td>
          <td width="75%" class="Greybg2" style="border-bottom:1px solid #ccc"><div class="LP15">
		<select name="txtsy" class="LoginField" style="width:92%;height:25px">
			<option value="1st" <?php if($rows[3] == "1st") echo "selected";?>>1st</option>
			<option value="2nd" <?php if($rows[3] == "2nd") echo "selected";?>>2nd</option>
			<option value="3rd" <?php if($rows[3] == "3rd") echo "selected";?>>3rd</option>
			<option value="postgraduate" <?php if($rows[3] == "postgraduate") echo "selected";?>>Postgraduate</option>
		</select>
          </div></td>
        </tr>
	<tr>
          <td width="25%" height="35" class="Greybg1" style="border-bottom:1px solid #ccc"><div class="Grey12" style="font-weight:bold">
              <div align="right" class="RP10">Category: </div>
          </div></td>
          <td width="75%" class="Greybg2" style="border-bottom:1px solid #ccc"><div class="LP15">
		<select name="txtca" class="LoginField" style="width:92%;height:25px">
			<option value="Recommended Reading" <?php if($rows[4] == "Recommended Reading") echo "selected";?>>Recommended Reading</option>
			<option value="Core Course Text" <?php if($rows[4] == "Core Course Text") echo "selected";?>>Core Course Text</option>
			<option value="N/A" <?php if($rows[4] == "N/A") echo "selected";?>>N/A</option>
		</select>
          </div></td>
        </tr>
	
		
        <tr>
          <td height="50">
          	<?php if(isset($_GET['from'])){?>
          	<input name="Button" type="button" class="Grey12" value="cancel" onClick="document.location.href='detail.php?id=<?php echo $id;?>'" />
            <?php }else{?>
            <input name="Button" type="button" class="Grey12" value="cancel" onClick="document.location.href='index.php'" />
            <?php }?>
		  </td>
          <td class="LP15"><div align="right">
            <input name="Submit" type="submit" class="BtnBlue" value="Make Changes" style="font-weight:bold" />
          </div></td>
        </tr>
        <tr>
          <td height="80">&nbsp;</td>
          <td class="LP15">&nbsp;</td>
        </tr>
      </table>
        </form>
  </div>
</div>

<div class="FooterMenu">
	<div align="center">
		<div class="MyWidth">
	</div>
	</div>
</div>

<div class="Footer">
	<div align="center">
		<div class="MyWidth">
	</div>
	</div>
</div>
</body>
</html>
<script>
	document.getElementById("txtfa").selectedIndex = 0;
	fchg(document.getElementById("txtfa"));
</script>