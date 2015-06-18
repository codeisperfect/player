<?php
class Templates{
	function profile_save_button(){
?>
              <hr/>
              <div class="text-center">
               <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>Save profile</button>
               <button type="reset" class="btn btn-default"><i class="fa fa-trash-o fa-lg"></i>Cancel</button>
              </div>
<?php
	}

	function input1($inp){
		foreach($inp as $key=>$val)
			$$key=$val;
		$inpattr=Fun::mergeifunset($inpattr,array("name"=>$name,"type"=>$type,"class"=>"form-control","dc"=>$dc,"onkeyup"=>"checkValid(this,event);"));
		mergeifunset($divattr,array("class"=>"form-group"));
?>
              <div <?php echo param2str($divattr); ?> >
               <label class="col-md-2 control-label">
                <?php echo $label; ?>
               </label>
               <div class="col-md-10">
                <input <?php echo param2str($inpattr); ?> />
               </div>
              </div>
<?php
	}
}
?>