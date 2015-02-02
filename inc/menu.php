<script>
function fshowsubmenu(kn,tp)
{
	obj = document.getElementById("submenu" + kn);
	if(tp == 1)
		obj.style.display = "block";
	else
		obj.style.display = "none";
}
</script>
<div style="width:100%;height:42px;background-image:url('images/header.jpg')">
	<div class="menuleft">&nbsp;</div>
	<a href="main.php" class="menubtn">Home</a>
	<div style="position:relative;float:left" onmouseover="fshowsubmenu(1, 1)" onmouseout="fshowsubmenu(1, 0)">
		<a href="faculty.php" class="menubtn">Business and Law</a>
		<div class="submenu" id="submenu1" style="display:none;position:absolute;left:0px;top:42px;">
		<a href="subject.php" style="text-decoration:none"><div class="submenubtn">Law</div></a>
		<a href="subject.php" style="text-decoration:none"><div class="submenubtn">European/Internationsal Legal Studies</div></a>
		<a href="subject.php" style="text-decoration:none"><div class="submenubtn">Maritime Law</div></a>
		<a href="subject.php" style="text-decoration:none"><div class="submenubtn">Accounting and Finance</div></a>
		<a href="subject.php" style="text-decoration:none"><div class="submenubtn">International Marketing</div></a>
		<a href="subject.php" style="text-decoration:none"><div class="submenubtn">Management</div></a>
		<a href="subject.php" style="text-decoration:none"><div class="submenubtn">Management Sciences and Accounting</div></a>
		<a href="subject.php" style="text-decoration:none"><div class="submenubtn">Entrepreneurship</div></a>
		<a href="subject.php" style="text-decoration:none"><div class="submenubtn">Marketing</div></a>
		</div>
	</div>
	<div style="position:relative;float:left" onmouseover="fshowsubmenu(2, 1)" onmouseout="fshowsubmenu(2, 0)">
		<a href="faculty.php" class="menubtn">Engineering and the Environment</a>
		<div class="submenu" id="submenu2" style="display:none;position:absolute;left:0px;top:42px;">
		<a href="subject.php" style="text-decoration:none"><div class="submenubtn">Acoustical Engineering</div></a>
		<a href="subject.php" style="text-decoration:none"><div class="submenubtn">Aerospace Engineering</div></a>
		<a href="subject.php" style="text-decoration:none"><div class="submenubtn">Audiology</div></a>
		<a href="subject.php" style="text-decoration:none"><div class="submenubtn">Civil and Environmental Engineering</div></a>
		<a href="subject.php" style="text-decoration:none"><div class="submenubtn">Environmental Sciences</div></a>
		<a href="subject.php" style="text-decoration:none"><div class="submenubtn">Foundation Year</div></a>
		<a href="subject.php" style="text-decoration:none"><div class="submenubtn">Mechanical Engineering</div></a>
		<a href="subject.php" style="text-decoration:none"><div class="submenubtn">Ship Science</div></a>
		</div>
	</div>
	<div style="position:relative;float:left" onmouseover="fshowsubmenu(3, 1)" onmouseout="fshowsubmenu(3, 0)">
		<a href="faculty.php" class="menubtn">Social and Human Sciences</a>
		<div class="submenu" id="submenu3" style="display:none;position:absolute;left:0px;top:42px;">
		<a href="subject.php" style="text-decoration:none"><div class="submenubtn">Geography</div></a>
		<a href="subject.php" style="text-decoration:none"><div class="submenubtn">Mathematics</div></a>
		<a href="subject.php" style="text-decoration:none"><div class="submenubtn">Psychology</div></a>
		<a href="subject.php" style="text-decoration:none"><div class="submenubtn">Economics</div></a>
		<a href="subject.php" style="text-decoration:none"><div class="submenubtn">Politics and International Relations</div></a>
		<a href="subject.php" style="text-decoration:none"><div class="submenubtn">Sociology</div></a>
		<a href="subject.php" style="text-decoration:none"><div class="submenubtn">Applied Social Sciences</div></a>
		</div>
	</div>
	<div style="position:relative;float:left" onmouseover="fshowsubmenu(4, 1)" onmouseout="fshowsubmenu(4, 0)">
		<a href="faculty.php" class="menubtn">Medicine</a>
		<div class="submenu" id="submenu4" style="display:none;position:absolute;left:0px;top:42px;">
		<a href="subject.php" style="text-decoration:none"><div class="submenubtn">Medicine</div></a>
		</div>
	</div>
	<div class="menuright">&nbsp;</div>
</div>