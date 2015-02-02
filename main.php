<?php
	session_start();
	if(isset($_POST['selun']))
		$_SESSION['uniname'] = $_POST['selun'];
	if(!isset($_SESSION['uniname'])){?>
	<script>
		location.href = "index.php";
	</script>
<?php }?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="css/products.css" type="text/css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jqtransf.js"></script>
	<script type="text/javascript">
	var $j=jQuery.noConflict();
		 $j(document).ready(function() {			
		$j(function(){
			 $j('#select-form').jqTransform({imgPath:'/virtuemart_36021/templates/theme185/images/'});
		});
	});
	</script>
	<script type="text/javascript">
	$j(document).ready(function(){
		$j(".module-specials  .product_image_container").hover(function() {
				$j(this).find(".bg").stop().animate({ top: 0}, 200);
			},function(){
				$j(this).find(".bg").stop().animate({ top: -236}, 300);
			});
		//rollover hover
			$j("#footer .footerText div.social a").hover(function() { //On hover...
			var thumbOver = $j(this).find("img").attr("src"); //Get image url and assign it to 'thumbOver'
			$j(this).css({'background' : 'url(' + thumbOver + ') no-repeat center top'});
			//Animate the image to 0 opacity (fade it out)
			$j(this).find("span").stop().fadeTo('normal', 0 , function() {
			$j(this).hide() //Hide the image after fade
			});
			} , function() { //on hover out...
			//Fade the image to full opacity
			$j(this).find("span").stop().fadeTo('normal', 1).show();
			});
			$j('.module_multi h3 , .module_LoginForm h3 , .categoryName ,.contentheading , h3.title , .module h3').each(function() {
            var hd = jQuery(this).html();
            var index = hd.indexOf(' ');
            if(index == -1) {
                index = hd.length;
            }
            jQuery(this).html('<em>' + hd.substring(0, index) + '</em>' + hd.substring(index, hd.length));
        });
	    //accordion begin
	    $j("#accordion dt").eq(0).addClass("active");
	    $j("#accordion dd").eq(0).show();
	 
	    $j("#accordion dt").click(function(){
	        $j(this).next("#accordion dd").slideToggle("slow")
	        .siblings("#accordion dd:visible").slideUp("slow");
	        $j(this).toggleClass("active");
	        $j(this).siblings("#accordion dt").removeClass("active");
	        return false;
	    });
	});
		preloadImages([
			]);
	</script>
	
</head>
<body>
<div id="divcontainer">
	<div id="divheader"><?php require_once("inc/header.php");?></div>
	<div id="divmenu"><?php require_once('inc/menu.php');?></div>	
	<div id="divcontent">
	<div style="text-align:center;border:0px solid #000;margin-left:10%;width:90%">
		<div class="module-specials">
			<ul class="box-product">
				<li>
					<div class="product_image_container" style="float:left"> 
						<a title="" href="#">
						<img src="images/Product0.png" height="331" width="220" alt="" border="0">		</a> 
						<div class="bg">
							<span style="color:#FFF">wefw</span>
						</div>				
					</div>
					<div class="product_image_container" style="margin-left:20px;float:left"> 
						<a title="" href="#">
						<img src="images/Product0.png" height="331" width="220" alt="" border="0">		</a> 
						<div class="bg">
							<span style="color:#FFF">wefw</span>
						</div>				
					</div>
				</li>
				<li>
					
				</li>
			</ul>
		</div>
	</div>
	</div>
	
</div>
<div style="float:left;width:100%;margin-top:100px">

<iframe src="inc/mainfooter/mainfooter.htm" style="width:100%;height:900px;overflow:none" frameborder="no"></iframe>	
	
	
</div>
</body>
</html>