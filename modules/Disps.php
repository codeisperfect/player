<?php
class Disps extends Sql{
	public static function page_top($inp=array()){
		$inp=Fun::mergeifunset($inp,array("title"=>"getIITians","page"=>"nsearch"));
?>
	<!DOCTYPE html>
	<head>
	<meta charset="utf-8" /> 
	<meta name=viewport content="width=device-width, initial-scale=1">
	<title><?php echo $inp["title"]; ?></title>
	<base href="<?php echo HOST; ?>" >
	<?php
	if($inp["page"]=="nsearch"){
	?>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<link href="css/styleslider.css" rel="stylesheet" type="text/css" />
		<link href="css/slicknav.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="js/modernizr.custom.93569.js"></script>
	<?php
	}
	else if($inp["page"]=="search"){
?>
<link rel="stylesheet" href="css/jquery-ui.css">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="js/jquery/jRating.jquery.css" type="text/css" />

<script type="text/javascript" src="js/modernizr.custom.93569.js"></script>
<script type="text/javascript" src="js/jquery/jquery.js"></script>
<script type="text/javascript" src="js/jquery/jRating.jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.basic').jRating();
	});
</script>

<?php
	}
	else if($inp["page"]=="teachercalender"){
?>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="js/jquery-ui1.8.16.css" media="all">
<link rel="stylesheet" type="text/css" href="css/datepicker.css"/>
<script type="text/javascript" src="js/modernizr.custom.93569.js"></script>

<?php		
	}
	?>
	</head>
	<?php		
		}
	public static function page_bottom($inp=array()){
		$inp=Fun::mergeifunset($inp,array("myjs"=>false));
?>
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.min1.js"></script>
		<script src="js/head.js"></script>
		<script src="js/jquery.bxSlider.js"></script>
<?php
		if($inp["myjs"]){
?>

<?php
		}
?>
		</body>
		</html>
<?php
	}
	public static function page_header($inp=array()){
		$inp=Fun::mergeifunset($inp,array("page"=>"index"));
?>
<header class="head">
<div class="wrap">
<figure class="logo">
<a href='<?php echo BASE; ?>' >
	<img src="images/logo.png" width="124" height="53" />
</a>
</figure>


<div id="head-search">
<form action="<?php echo BASE."search"; ?>" >
<input id="log-srh" name="search" type="text" placeholder="Search" >
<input id="search-logo" name="" type="submit" value="">
</form>
</div>
<nav id="nav">
<ul>

<?php
$link_pages=array(
	"about"=>"About",
	"contact"=>"Contact",
	"login"=>"Log in",
	"signup"=>"Sign up"
	);
foreach($link_pages as $link=>$disptext){
?>
<li><a href="<?php echo BASE.$link; ?>" <?php if($inp["page"]==$link) echo 'style="border:#FFF 2px solid; padding:4px; margin:15px 0 0 0;"';  ?>  ><?php echo $disptext ?></a></li>
<?php
}
?>


</ul>
</nav>
</div>
</header>
<?php
	}
	public static function page_header_home($inp=array()){
		$inp=Fun::mergeifunset($inp,array("page"=>"index"));
?>
<header class="head">
<div class="wrap">
<figure class="logo">
<a href='<?php echo BASE; ?>' >
	<img src="images/logo.png" width="124" height="53" />
</a>
</figure>

<div id="head-search">
<form action="<?php echo BASE."search"; ?>" >
<input id="log-srh" name="search" type="text" placeholder="Search" >
<input id="search-logo" name="" type="submit" value="" >
</form>
</div>

<nav id="menu">
<ul>
<?php
$link_pages=array(
	"about"=>"About",
	"contact"=>"Contact",
	"login"=>"Log in",
	"signup"=>"Sign up"
	);
foreach($link_pages as $link=>$disptext){
?>
<li><a href="<?php echo BASE.$link; ?>" <?php if($inp["page"]==$link) echo 'style="border:#FFF 2px solid; padding:4px; margin:15px 0 0 0;"';  ?>  ><?php echo $disptext ?></a></li>
<?php
}
?>
</ul></nav>

<nav class="slicknav_menu">
<ul>

<?php
foreach($link_pages as $link=>$disptext){
?>
<li><a href="<?php echo BASE.$link; ?>" <?php if($inp["page"]==$link) echo 'style="border:#FFF 2px solid; padding:4px; margin:15px 0 0 0;"';  ?>  ><?php echo $disptext ?></a></li>
<?php
}
?>

</ul>
</nav>


</div>
</header>
<?php
	}
	public static function page_footer(){
?>
<footer class="footer">

<div class="res-foot-menu">
<ul>
<?php
$tabs_array=array(
	"about"=>"About us",
	"about"=>"How we Work",
	"team"=>"Our team",
	"about"=>"work with us",
	"about"=>"Refund & Return",
	"faq"=>"FAQ",
	"contact"=>"Contact US",
	"policy?"=>"Copyright Policy",
	"policy?"=>"Terms of Use"
	);
	disp_tab_list($tabs_array);
?>
</ul>
</div>

<div class="footer-line">
<div class="wrap">
<div class="foot-main">
<article class="foot-menu">
<h5>Get IITians</h5>
<ul>
<?php
$tabs_array=array(
	"about?about"=>"About us",
	"about?howwework"=>"How we Work",
	"team"=>"Our team",
	"about?workwithus"=>"work with us",
	);
disp_tab_list($tabs_array);

?>
</ul>
</article>

<article class="foot-menu" style="padding:0 0 0 4%; width:16%;">
<h5>Help</h5>
<ul>
<?php
$tabs_array=array(
	"about"=>"Refund & Return",
	"faq"=>"FAQ",
	"contact"=>"Contact US",
	);
disp_tab_list($tabs_array);
?>
</ul>
</article>

<article class="foot-menu">
<h5>Legal</h5>
<ul>
<?php
$tabs_array=array(
	"policy?tab=1"=>"Privacy policy",
	"policy?2"=>"Copyright Policy",
	"policy?3"=>"Terms of Use"
	);
disp_tab_list($tabs_array);
?>
</ul>
</article>

<div class="contact">
<div class="phone"><h1><img src="images/phone.png">0000000000</h1>
</div>
<div class="facebook">
<ul>
<li>Follow Us on</li>
<li class="twi"><a href=""></a></li>
<li class="fb"><a href=""></a></li>
<li class="google"><a href=""></a></li>
</ul>
</div>
</div>

</div>
</div>
</div>
</footer>
<?php
	}
	public static function page_header_search(){
?>
<section id="search-box">
	<div class="wrap">
	<div id="search-login">
	<form action="<?php echo BASE."search"; ?>" >
	<input id="log-srh" name="search" type="text" placeholder="Search" >
	<input id="search-logo" name="" type="submit" value="" >
	</form>
	</div>
	</div>
</section>
<?php
	}
	public static function student_header($inp=array()){
		$inp=Fun::mergeifunset($inp,array());
?>
	<header class="head">
		<div class="wrap">
			<figure class="logo"><img src="images/logo.png" width="124" height="53" /></figure>
			<div id="head-search">
				<form action="<?php echo BASE."search"; ?>" >
					<input id="log-srh" name="search" type="text" placeholder="Search" >
					<input id="search-logo" name="" type="submit" value="">
				</form>
			</div>
			<nav id="nav">
				<ul>
				<?php
				$tabs_array=array(
					"about"=>"About us",
					"contact"=>"Contact",
					"notf"=>"Notifications"
					);
				disp_tab_list($tabs_array);
				?>
				</ul>
			</nav>
		</div>
	</header>
<?php		
	}
	public static function page_menu(){
?>
	<ul>
	<?php
		if(User::isloginas('s')){
			$tabs_array=array(
				"profile"=>"My Profile",
				"bookedslot"=>"Book Slots",
				"pendingtest"=>"Pending test"
				);
		}
		else if(User::isloginas('t')){
			$tabs_array=array(
				"account"=>"My Account",
				"topics"=>"Topics",
				"cal"=>"Calander",
				"bookslot"=>"Bookslots",
				"reviews"=>"Reviews"
				);
		}
		disp_tab_list($tabs_array);
	?>
	</ul>
	<?php
	}
	public static function page_header_mix(){
		if(User::isloginas('s'))
			Disps::student_header();
		else if(User::isloginas('t'))
			Disps::student_header();
		else
			Disps::page_header();
	}

	public static function loadpage($view,$params=array()){
	}
}
?>