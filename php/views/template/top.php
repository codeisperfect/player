<!DOCTYPE html>
<?php
opent("html");
opent("head");
ocloset("title",$title);
foreach($css as $link){
	addcss($link);
}
?>
<script>
	var redurl="<?php echo get("url"); ?>";
	var cururl=window.location.href;
</script>
</head>
<body style="overflow-y:scroll;" >
