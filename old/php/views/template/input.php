<?php
$inpattr=Fun::mergeifunset($inpattr,array("name"=>$name,"type"=>$type,"class"=>"form-control input-lg","dc"=>$dc,"onkeyup"=>"checkValid(this,event);"));
mergeifunset($divattr,array("class"=>"form-group"));
?>
	<div <?php echo param2str($divattr); ?> >
	<label >
	<?php echo $label; ?>
	</label>
	<input <?php echo param2str($inpattr); ?> />
<?php
	if($closediv){
		closet("div");
	}
?>