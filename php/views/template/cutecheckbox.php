<?php
mergeifunset($inpattr,array("class"=>$class,"id"=>$id==''?'':"check_".$id,"onchange"=>$onchange,"type"=>"checkbox" ));
?>
<div <?php echo param2str($divattr); ?> >
	<?php
	opent("input",$inpattr);
	?>
	<label <?php echo param2str(array("for"=>$inpattr["id"])); ?> ><?php echo $label; ?></label>
</div>
