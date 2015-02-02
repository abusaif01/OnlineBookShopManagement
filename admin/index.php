<?php
	session_start();
	if(isset($_SESSION['adminname'])){		
?>
<script>
	location.href = "book/index.php";
</script>
<?php }?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin Control Panel</title>
<link REL="SHORTCUT ICON" HREF="../images/favicon.ico">
<link href="../css/mystyle.css" rel="stylesheet" type="text/css" />
<script>
function flogin()
{
	if(document.getElementById("username").value == "" || document.getElementById("password").value == "")
		return;
		
	var xmlhttp;  
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			var re = parseInt(xmlhttp.responseText);
			if(re == 1)
				alert("Login name is not correct.");
			else if(re == 2)
				alert("Password is not correct.");
			else if(re == 0)
				location.href = "book/index.php";
		}
	  }
	xmlhttp.open("GET","checkadmin.php?txtun="+document.getElementById("username").value+"&txtpw="+document.getElementById("password").value,true);
	xmlhttp.send();
}
</script>
</head>

<body>

<div align="center">
	<div class="MyWidth">
		<div class="loginbg" align="left">
		     <form id="AllLogin" name="AllLogin" method="POST" action="checkadmin.php">
			 <table width="612" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="208"><div align="left" style="margin-left:35px"><img src="../images/webpixel.jpg" alt="Powered by Webpixel Technology" width="168" height="69" /></div></td>
                  <td width="313"><div align="left" class="Grey25" style="font-weight:bold">Admin Login </div>
                      <div class="Grey12">Enter your login details below </div></td>
                  <td width="91"><div align="right" style="margin-right:18px"></div></td>
                </tr>
				 <tr>
                   <td colspan="3"><div align="center">
				   	&nbsp;
				   </div></td>
                </tr>
                <tr>
                  <td><div align="right" class="Grey12" style="margin:8px 10px 0px 0px">Username or email address : </div></td>
                  <td><div align="left" style="margin-top:8px">
                    <input type="text" class="LoginField" id="username" name="txtun" />
                  </div></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="40"><div align="right" style="margin-right:10px" class="Grey12">Password</div></td>
                  <td><div align="left">
                    <input type="password" class="LoginField" id="password" name="txtpw" />
                  </div></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="30">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="40">&nbsp;</td>
                  <td><input name="Submit" type="button" class="BtnBlue" value="Login" onclick="flogin()" /></td>
                  <td>&nbsp;</td>
                </tr>
              </table>
		     </form>
		</div>
	</div>
</div>
</body>   
</html>
