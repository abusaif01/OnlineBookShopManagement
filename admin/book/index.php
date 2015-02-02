<?php
	session_start();
	if(!isset($_SESSION['adminname'])){		
?>
<script>
	location.href = "../index.php";
</script>
<?php }
	$sk = "1";
	$sb = "id";
	$ms = "";
	if(isset($_POST['menu'])) $sk = $_POST['menu'];
	if(isset($_POST['searchby'])) $sb = $_POST['searchby'];
	if(isset($_POST['modelsearch'])) $ms = $_POST['modelsearch'];
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
function fordchg(obj, idx){
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
			if(val == "1")
				document.getElementById("divmsgbox").innerHTML = "The mosaic image has been available.";
			else
				document.getElementById("divmsgbox").innerHTML = "The mosaic image has been unavailable.";
			document.getElementById("divmsgbox").style.display = "block";
		}
	}
	var val = "0";
	if(obj.checked == true)
		val = "1";
	xmlhttp.open("GET","setorder.php?id=" + idx + "&val=" + val,true);
	xmlhttp.send();
}
</script>
</head>

<body onLoad="MM_preloadImages('../../images/list/first_previous_on.gif')">

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
      </table>
	</div>
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

	<div id="fade" class="black_overlay"></div>
	<div class="TM10">
<span class="Grey12">Images</span></div>
	<div class="dotline"></div>
	<div class="Grey25" style="margin-top:10px; font-weight:bold">Books </div>
	<div class="Grey12" style="margin-top:10px">Select a book from the list below to edit the contents.</div>
	<div class='MsgBox' style='margin-left:25px;display:none' id="divmsgbox"></div>
    	<?php
		$suc = "0";
		if(isset($_GET['success']))
		{
			$suc = $_GET['success'];
		}
		if($suc == "1"){?>
        <script>
			document.getElementById("divmsgbox").style.display = "block";
			document.getElementById("divmsgbox").innerHTML = "Book has been deleted.";
		</script>
        <?php }
		if($suc == "2"){?>
        <script>
			document.getElementById("divmsgbox").style.display = "block";
			document.getElementById("divmsgbox").innerHTML = "Book has been added.";
		</script>
        <?php }?>
	<div style="margin-top:15px">
	  <input name="Button" type="button" class="BtnBlue" value="Add New Book" onClick="document.location.href='addnew.php'" style="font-weight:bold"/>
        </div>
      <div style="margin-top:10px" class="BlueHeaderBar">
        <div style="padding:20px 15px 0px 15px" class="White12">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="5%">Sort By</td>
            <td width="25%"><form name="jump" style="padding-left:5px;" action="index.php" method="post" id="frmsort">
            <input type="hidden" id="hddmenu" value="<?php echo $sk;?>" />
            <input type="hidden" id="hddsearchby" value="<?php echo $sb;?>" />
  <select name="menu" class="Grey12" id="menu">
  <option value="1">Name (A - Z)</option>
  <option value="2">Name (Z - A)</option>
  </select>
  <input type="submit" class="Grey12" value="Go">
  </td>
            <td width="66%">
              Search by 
              <select name="searchby" class="Grey12" id="searchby" style="margin-right:15px">
                <option value="name" >Name</option>
                </select>
              Keywords 
              <input name="modelsearch" type="text" class="Grey12" id="modelsearch" style="margin-left:8px" value="<?php echo $ms;?>" />
              <input name="Submit" type="submit" class="Grey12" value="Go" />
              </form>          </td>
            <td width="4%">&nbsp;</td>
          </tr>
          </table>
	</div>
	      </div>
      <div style="margin-top:2px" class="LightBar" align="left">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:5px">
        <tr>
          <td width="5%" class="LP15" style="cursor:pointer" onClick="document.location.href='#'"><div class="Grey12" style="font-weight:bold"> ID</div></td>
          <td width="11%" class="LP15" style="cursor:pointer" onClick="document.location.href='#'"><div class="Grey12" style="font-weight:bold">ISBN </div></td>
	      <td class="LP15" style="cursor:pointer" onClick="document.location.href='#'"><div class="Grey12" style="font-weight:bold">Name </div></td>
	      <td width="11%" class="LP15" style="cursor:pointer" onClick="document.location.href='#'"><div class="Grey12" style="font-weight:bold">Author</div></td>
	      <td width="7%" class="LP15" style="cursor:pointer" onClick="document.location.href='#'"><div class="Grey12" style="font-weight:bold">Year</div></td>
	      <td width="11%" class="LP15" style="cursor:pointer" onClick="document.location.href='#'"><div class="Grey12" style="font-weight:bold">Publisher</div></td>
	      <td width="11%" class="LP15" style="cursor:pointer" onClick="document.location.href='#'"><div class="Grey12" style="font-weight:bold">Faculty</div></td>
	      <td width="11%" class="LP15" style="cursor:pointer" onClick="document.location.href='#'"><div class="Grey12" style="font-weight:bold">Subject</div></td>
          <td width="20%" class="LP15">&nbsp;</td>
        </tr>
      </table>
	    </div>
      <form action="delete.php" method="post" name="AllPro" id="AllPro">	
      <div id="cdelete" class="white_content">
  <fieldset>
  <legend class="Grey12"> Confirm Delete </legend>   
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="right" class="Grey12" style="margin-right:10px">
      <div align="center">Are you sure you want to delete this image?      </div>
    </div>      </td>
    </tr>
  <tr>
    <td height="25"><div align="right" class="black12" >
      <div align="center">
        <input name="button" type="submit" class="BtnRed" id="button" value="Confirm" />
        <input name="button2" type="button" class="Grey12" id="button2" onclick = "document.getElementById('cdelete').style.display='none';document.getElementById('fade').style.display='none';document.getElementById('cat_name').value='';document.getElementById('cat_id').value=''" value="Cancel"  />
        </div>
    </div></td>
    </tr>
</table>
</fieldset>
</div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:5px; border-bottom:1px solid #ccc">
        <?php
			require_once("../../db_include.php");
			
			$query = "select count(*) from bookstore";
			$results = mysql_query($query) or die(mysql_error());
			$rows = mysql_fetch_array($results);
			$sallcnt = $rows[0];
			
			$subquery1 = " b_id asc ";
			$subquery2 = " b_id>0 ";
			if($sk == "1") $subquery1 = " name asc ";
			if($sk == "2") $subquery1 = " name desc ";
			
			if($sb == "name") $subquery2 = " name like \"%$ms%\" ";
			
			if($ms == "") $subquery2 = " b_id>0 ";
			$query = "select b_id,isbn,name,author,byear,publisher,faculty,subject from bookstore where $subquery2 order by $subquery1";
			
			$pg = 1;
			$npg = 10;
			if(isset($_GET['pagenum'])) $npg = $_GET['pagenum'];
			if(isset($_GET['page'])) $pg = $_GET['page'];
			$stpg = ($pg - 1) * $npg + 1;
			$edpg = $pg * $npg;
			
			$results = mysql_query($query) or die(mysql_error());
			$cnt = 0;
			while($rows = mysql_fetch_array($results))
			{$cnt++;}
			$allcnt = $cnt;
			
			if($npg == 0)	$stpg = 1;
			
			$results = mysql_query($query) or die(mysql_error());
			$cnt = 0;
			while($rows = mysql_fetch_array($results))
			{
				$cnt++;
				if($cnt == $stpg)
					break;
			}
			$cnt = 0;
			do{$cnt++;
		?>
          <tr>
            <td width="5%" height="25" class="LP15"><div class="Grey12"><?php echo $rows[0];?></div></td>
            <td width="11%" class="LP15"><div class="Grey12"><a href="detail.php?id=<?php echo $rows[0];?>" class="BlueLink"><?php echo $rows[1];?> </a></div></td>
            <td class="LP15"><div class="Grey12"><?php echo $rows[2];?></div></td>
	    <td class="LP15" width="11%"><div class="Grey12"><?php echo $rows[3];?></div></td>
	    <td class="LP15" width="7%"><div class="Grey12"><?php echo $rows[4];?></div></td>
	    <td class="LP15" width="11%"><div class="Grey12"><?php echo $rows[5];?></div></td>
	    <td class="LP15" width="11%"><div class="Grey12"><?php echo $rows[6];?></div></td>
	    <td class="LP15" width="11%"><div class="Grey12"><?php echo $rows[7];?></div></td>
	    
            <td width="20%" class="LP15" align="right"><input name="Submit2" type="button" class="Grey12" value="edit" onClick="location.href='edit.php?id=<?php echo $rows[0];?>'"/>	    
              <input name="Submit4" type="button" class="Grey12" value="detail" onClick="document.location.href='detail.php?id=<?php echo $rows[0];?>'" />
              
              <input name="Submit22" type="button" class="Grey12" value="delete" onclick = "document.getElementById('cdelete').style.display='block';document.getElementById('fade').style.display='block';document.getElementById('book_id').value='<?php echo $rows[0];?>'"/>
              		</td>
          </tr>
         <?php
		 if($cnt == $npg) break;
		 }while($rows = mysql_fetch_array($results));
		 if($npg == 0)
		 {
			 $edpg = $allcnt;
			 $pgnum = 1;
		 }
		 else
		 {
			 $edpg = $edpg - $npg + $cnt;
			 $pgnum = (int)($allcnt / $npg) + 1;
			 if($allcnt % $npg == 0)
			 	$pgnum = $pgnum - 1;
		 }
		 ?>
        </table>
        
  <input name="book_id" type="hidden" id="book_id" /> 
        </form>
      <div class="ListEnd" style="margin-bottom:30px">
<script type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
function fgopage(pg) {
	if(pg == 0)
		return;
	location.href = "index.php?page="+pg+"&pagenum="+document.getElementById("pgnum").value;
}
</script>

  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:8px" class="Grey12">
    <tr>
      <td width="50%" class="LP15">
		<a href="javascript:fgopage(<?php echo 1;?>)" style="padding:0px 3px" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image8','','../../images/list/first_previous_on.gif',1)"><img src="../../images/list/first_previous_off.gif" name="Image8" width="14" height="7" border="0" id="Image8" /></a><a href="javascript:fgopage(<?php echo $pg - 1;?>)" style="padding:0px 3px" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('prev_off','','../../images/list/previous_on.gif',1)"><img src="../../images/list/previous_off.gif" name="prev_off" width="7" height="7" border="0" id="prev_off" /></a>
        <?php for($i = 1; $i <= $pgnum; $i++){?>
        	<a href="javascript:fgopage(<?php echo $i;?>)" class="BlueLink"><?php echo $i;?></a>
        <?php }
		if($pgnum!= $pg){?>
        <a href="javascript:fgopage(<?php echo $pg + 1;?>)" style="padding:0px 3px" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('NextOffImage','','../../images/list/next_on.gif',1)">
        <?php }else{?>
        <a href="#" style="padding:0px 3px" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('NextOffImage','','../../images/list/next_on.gif',1)">
        <?php }?>
        <img src="../../images/list/next_off.gif" name="NextOffImage" width="7" height="7" border="0" id="NextOffImage" /></a><a href="javascript:fgopage(<?php echo $pgnum;?>)" style="padding:0px 3px" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('NextEndOffImage','','../../images/list/next_end_on.gif',1)"><img src="../../images/list/next_end_off.gif" name="NextEndOffImage" width="14" height="7" border="0" id="NextEndOffImage" /></a></td>
      <td width="38%"><div align="right" style="margin-right:10px">
	          
        Showing <?php echo $stpg;?> - <?php echo $edpg;?> of <?php echo $allcnt;?>
  

	  </div></td>
      <td width="12%"><div align="right" style="margin-right:10px">
	  <form action="" method="get">
	    <select name="fieldname" id="pgnum" size="1" class="Grey12"  onChange="fgopage(1)"> 
				<option value="10" <?php if($npg == 10) echo "selected";?>>10</option> 
				<option value="25" <?php if($npg == 25) echo "selected";?>>25</option> 
				<option value="50" <?php if($npg == 50) echo "selected";?>>50</option> 
				<option value="0" <?php if($npg == 0) echo "selected";?>>All</option> 
	</select> 
	  per page  
</form></div></td>
    </tr>
  </table>

        </div>
  </div>
</div>

<?php include("../../inc/quicklink.php");?>

<div class="Footer">
	<div align="center">
		<div class="MyWidth">		  <div class="White12" style="padding-top:15px" align="left">Admin Control Panel </div>

	</div>
	</div>
</div>
<script>
document.getElementById("menu").selectedIndex = document.getElementById("hddmenu").value - 1;
var v = document.getElementById("hddsearchby").value;
if(v == "name")	document.getElementById("searchby").selectedIndex = 0;
</script>
</body>
</html>
