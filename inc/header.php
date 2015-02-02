<link rel="stylesheet" href="style.css" type="text/css" media="screen" />

	<!-- START MooSlide -->
	<!-- The CSS -->
  	<link rel="stylesheet" href="css/mooslide.css" type="text/css" media="screen" />
    <!-- Mootools - the core -->
	<script type="text/javascript" src="js/mootools12.js"></script>
    <!-- MooSlide (show/hide login form) -->
	<script type="text/javascript" src="js/mooSlide2-moo12.js"></script>
	<script language="javascript" type="text/ecmascript">
	window.addEvent('domready',function(){
		var myLogin = new mooSlide2({ slideSpeed: 1500, fadeSpeed: 500,  toggler:'login', content:'loginPanel', height:530, close: false, effects:Fx.Transitions.Bounce.easeOut , from:'top'});
		//optional: AutoStart the slider on page load:
		//MyLogin.run();
	    $('close').addEvent('click', function(e){
			e = new Event(e);
			myLogin.clearit();
			e.stop();
		});
	});
	function fsign() {
		obj = document.getElementById("divmsgbox");
		obj.innerHTML = "";
		
		str = document.getElementById("txtun").value;
		str = str.replace(/^\s+|\s+$/g,"");
		if(str == "")
		{
			obj.innerHTML = "Please input User Name!";
			document.getElementById("txtun").focus();
			return;
		}
		
		str = document.getElementById("txtna").value;
		str = str.replace(/^\s+|\s+$/g,"");
		if(str == "")
		{
			obj.innerHTML = "Please input First Name!";
			document.getElementById("txtna").focus();
			return;
		}
		str = document.getElementById("txtla").value;
		str = str.replace(/^\s+|\s+$/g,"");
		if(str == "")
		{
			obj.innerHTML = "Please input Last Name!";
			document.getElementById("txtla").focus();
			return;
		}
		
		str = document.getElementById("txtem").value;
		str = str.replace(/^\s+|\s+$/g,"");
		if(str == "")
		{
			obj.innerHTML = "Please input Email Address!";
			document.getElementById("txtem").focus();
			return;
		}
		if(str.indexOf("@",0) == -1 || str.indexOf(".",0) == -1)
		{
			obj.innerHTML = "Please input valid Email Address!";
			document.getElementById("txtem").focus();
			return;
		}
				
		str = document.getElementById("txtpa").value;
		str = str.replace(/^\s+|\s+$/g,"");
		if(str == "")
		{
			obj.innerHTML = "Please input Password!";
			document.getElementById("txtpa").focus();
			return;
		}
		if(document.getElementById("txtpa").value != document.getElementById("txtcp").value)
		{
			obj.innerHTML = "Password doesn't match!";
			document.getElementById("txtpa").value = "";
			document.getElementById("txtcp").value = "";
			document.getElementById("txtpa").focus();
			return;
		}	
		
		
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
				var str = xmlhttp.responseText;
				if(parseInt(str) == 0)				
					document.getElementById("frmsign").submit();
				else if(parseInt(str) == 1)
				{
					document.getElementById("txtun").value = "";
					document.getElementById("txtun").focus();
					obj.innerHTML = "User Name is duplicated.";
				}
				else if(parseInt(str) == 2)
				{
					document.getElementById("txtem").value = "";
					document.getElementById("txtem").focus();
					obj.innerHTML = "Email Address is duplicated.";
				}
			}
		}
		xmlhttp.open("GET","checkdup.php?rndawg="+Math.random()+"&em="+document.getElementById("txtem").value + "&un="+document.getElementById("txtun").value,true);
		xmlhttp.send();
	}
	function flogin()
	{
		if(document.getElementById("txtlun").value == "" || document.getElementById("txtlpa").value == "")
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
				if(re == 0 || re == 3)
					location.href = "main.php";
				else if(re == 1)
					document.getElementById("divmsgbox1").innerHTML = "User Name is not correct.";
				else if(re == 2)
					document.getElementById("divmsgbox1").innerHTML = "Password is not correct.";
			}
		  }
		xmlhttp.open("GET","checkuser.php?txtun="+document.getElementById("txtlun").value+"&txtpw="+document.getElementById("txtlpa").value,true);
		xmlhttp.send();
	}
	</script>
<div style="width:100%;height:110px;background-color:#2B2B2B;padding-top:10px">
	<div style="text-align:center;margin:auto;width:280px;height:50px;background-image:url('images/logo.gif');"></div>
	<div style="margin-top:15px;color:#FFF;font-size:18px">University of <?php echo $_SESSION['uniname'];?> BookShelf</div>
	<div style="float:right;margin-left:15px;margin-right:4px">
		<input type="text" value="Enter search keywords here" onblur="if(this.value=='') this.value='Enter search keywords here';" onclick="if(this.value == 'Enter search keywords here') this.value='';" style="background:url('images/search-i.png') left top no-repeat;width:346px;height:33px;margin-top:-15px;text-transform: none;border: none;color: #A8A8A8;vertical-align: top;display: inline-block;padding-left:5px;outline:none" />
		<img src="images/search-b.png" style="width:33px;height:31px;margin-top:-14px;margin-left:-33px;cursor:pointer" />
	</div>
	<div style="float:right;margin-top:-8px">
		<?php if(!isset($_SESSION['busername'])){?>
		<a href="#" class="loginbtn" id="login">Login | Register</a>
		<?php }else{?>
		<a href="logout.php" class="loginbtn">Logout</a>
		<?php }?>
	</div>
</div>
 <!-- Login Panel using MooSlide -->
	<div id="loginPanel" class="mooSlide">
			<form class="left" action="#" method="post">
				<h1 class="padlock">Member Login</h1>
				<label for="log"><b>Username: </b></label>
				<input type="text" name="log" id="txtlun" value="" size="23" />
				<label for="pwd"><b>Password:</b></label>
				<input type="password" name="pwd" id="txtlpa" size="23" />
            	<label style="display:none"><input class="rememberme" name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> &nbsp;Remember me</label>
				<input type="button" onclick="flogin()" class="button_login" />
				<label><a href="#">Lost your password?</a></label>
				<div id="divmsgbox1" style="float:left;color:#FFF;margin-top:15px;width:100%;font-size:15px"></div>
			</form>
			<div class="sep"></div>

			<form class="right" action="onsignup.php" method="post" id="frmsign">
				<h1>Not a Member? Sign Up!</h1>
				<label for="signup"><b>User Name: </b></label>
				<input type="text" name="txtun" id="txtun" value="" size="23" />
				<label for="signup"><b>Name: </b></label>
				<input type="text" name="txtna" id="txtna" value="" size="23" />
				<label for="signup"><b>Last Name: </b></label>
				<input type="text" name="txtla" id="txtla" value="" size="23" />
				<label for="signup"><b>Email Address: </b></label>
				<input type="text" name="txtem" id="txtem" value="" size="23" />
				<label for="signup"><b>Password: </b></label>
				<input type="password" name="txtpa" id="txtpa" value="" size="23" />
				<label for="signup"><b>Confirm Password: </b></label>
				<input type="password" name="txtcp" id="txtcp" value="" size="23" />
				<label for="signup"><b>University: </b></label>
				<select  name="txtuv" id="txtuv" style="width:185px;background-color:#333;color:#FFF">
					<option value="Manchester">University of Manchester</option>
					<option value="Leeds">University of Leeds</option>
					<option value="Southampton">University of Southampton</option>
					<option value="Nottingham">University of Nottingham</option>
				</select>
				<label for="signup"><b>University Email Address: </b></label>
				<input type="text" name="txtue" id="txtue" value="" size="23" />
				<input type="button" onclick="fsign()" class="button_register" />				
				<div id="divmsgbox" style="float:left;color:#FFF;margin-top:15px;width:150%;font-size:15px"></div>
			</form>
			
			<div class="clearfix"></div>			

			<div class="loginClose"><a href="#" id="close">&nbsp;</a></div>
	</div> <!-- / Login panel -->