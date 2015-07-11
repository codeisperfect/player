<!doctype html>
<html lang="en_US">
<head>
	<?php
	opent("base",array("href"=>HOST));
	ocloset("title",$title);
	addall_css(array("css/materialize.min.css", "css/custom-stylesheet.css", "css/jquery.bxslider.css", "https://fonts.googleapis.com/icon?family=Material+Icons"));
	addall_css($css);
	addmycss();
	?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta charset="utf-8"/>

<!-- 	<link href="assets/icons/font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen">
 -->

<!--  	<link rel="stylesheet" href="assets/lib/select2/select2.css">
 -->
	<script type="text/javascript">
		var HOST="<?php echo HOST; ?>";
	</script>

</head>
