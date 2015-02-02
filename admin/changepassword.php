<?php
	session_start();
	if(!isset($_SESSION['adminname'])){		
?>
<script>
	location.href = "index.php";
</script>
<?php }?>
<?php include("../inc/myhost.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin Control Panel</title>
<link href="../css/mystyle.css" rel="stylesheet" type="text/css" />
<link REL="SHORTCUT ICON" HREF="../../images/favicon.ico">
<script>
function fsub()
{
	str = document.getElementById("newpw").value;
	if(str.trim(str) == "")
	{
		document.getElementById("divmsgbox").innerHTML = "The password can not be empty!";
		document.getElementById("divmsgbox").style.display = "block";
		document.getElementById("newpw").value = "";
		document.getElementById("conpw").value = "";
		document.getElementById("newpw").focus();
		return false;
	}
	if(document.getElementById("newpw").value != document.getElementById("conpw").value)
	{
		document.getElementById("divmsgbox").innerHTML = "The password doesn't match!";
		document.getElementById("divmsgbox").style.display = "block";
		document.getElementById("newpw").value = "";
		document.getElementById("conpw").value = "";
		document.getElementById("newpw").focus();
		return false;
	}
}
</script>
</head>

<body>
<div class="TopBG">
<div align="center">
	<div class="MyWidth">
	  <table width="100%" height="74" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="161"><div align="left"><img src="../images/webpixel_trans.png" alt="Admin Control Panel" width="160" height="60" /></div></td>
          <td width="50%">
		  <div align="left" style="margin-left:15px">
		  <div class="Grey12" style="font-weight:bold"><?php echo $_SESSION['adminname'];?><span style="margin-left:10px; font-weight:100"><a href="#">Change password</a> </span></div>
		  <div class="Grey12" style="margin-top:1px">Admin Level: Admin Level</div>
		  <div style="margin-top:1px"><a href="logout.php" class="BlueLink">Log out</a></div>
		  </div>
		  </td>
          <td width="50%">&nbsp;</td>
        </tr>
      </table>	</div>
</div>
</div>
<div class="BlueBG">
	<div align="center">
		<div class="MyWidth" align="left">
<div style="top:144px; position:absolute">
<?php include("../inc/adminmenu.php");?>


<p style="display:none"><a href="http://www.webpixel.com.bn/">Dropdown Menu By Admin Control Panel</a></p>
</div>			
		</div>
	</div>
</div>
<div class="GreyBG">
	<div align="center">
		<div class="MyWidth" align="left">
&nbsp;		</div>
	</div>
</div>
<div align="center">
	<div class="MyWidth" align="left">
	<div class="TM10"> <span class="Grey12"></span> </div>
	<div class="dotline"></div>
	<div class="Grey25" style="margin-top:10px; font-weight:bold">Changing admin password </div>
	<div class="Grey12" style="margin-top:10px"></div>
    <div class='MsgBox' id="divmsgbox" style='margin-left:25px;display:none;'></div>
		<?php
		$suc = "0";
		if(isset($_GET['success'])) $suc = $_GET['success'];
		if($suc == "8"){?>
        <script>
        	document.getElementById("divmsgbox").innerHTML = "The password has been changed.";
			document.getElementById("divmsgbox").style.display = "block";
		</script>
		<?php }?>
      <div style="margin-top:15px; height:35px; width:80%; border-bottom:1px solid #ccc" class="LightBar" align="left">
	  
        <div class="Grey12" style="font-weight:bold; padding:10px 0px 0px 15px">Change password </div>
	    </div>
      <form action="changing.php" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return fsub()">
	  <table width="80%" border="0" cellspacing="0" cellpadding="0">
		<tr>
          <td width="25%" height="35" class="Greybg1"><div class="Grey12" style="font-weight:bold">
              <div align="right" class="RP10">New Password: </div>
          </div></td>
          <td width="75%" class="Greybg2"><div class="LP15"><input name="newpw" type="password" class="LP15 LoginField" id="newpw" /></div></td>
        </tr>
        <tr>
          <td width="25%" height="35" class="Greybg1"><div class="Grey12" style="font-weight:bold">
              <div align="right" class="RP10">Confirm Password: </div>
          </div></td>
          <td width="75%" class="Greybg2"><div class="LP15"><input name="conpw" type="password" class="LP15 LoginField" id="conpw" /></div></td>
        </tr>
		
		        <tr>
          <td height="50">&nbsp;</td>
          <td class="LP15"><div align="right">
            <input name="Submit" type="submit" class="BtnBlue" value="Change password" style="font-weight:bold" />
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

<?php include("../inc/quicklink.php");?>

<div class="Footer">
	<div align="center">
		<div class="MyWidth">  <div class="White12" style="padding-top:15px" align="left">Admin Control Panel </div>
	</div>
	</div>
</div>
</body>
</html>