<div id="makeform" style="display:none;" >
	<?php
		for($i=0;$i<1;$i++){
	?>
	<div class="formelmdiv row" >
		<div class="col-md-9 forminfo" >
		</div>
		<div class="col-md-3" >
			<?php
				button(array("html"=>"delete","onclick"=>"customform.delete_input(this);"));
				button(array("html"=>"moveUp","onclick"=>"customform.move_totop(this);"));
			?>
		</div>
	</div>
	<?php
		}
	?>
</div>
<div style="border:solid #cccccc 1px;padding:10px;" >
	Add new input Element
	<?php
		$optionslist=array(array("val"=>"text","disptext"=>"Text Input"),array("val"=>"select","disptext"=>"Single Select"),array("val"=>"mselect","disptext"=>"Multiple Select"),array("val"=>"select_bool","disptext"=>"Select Yes No"),array("val"=>"textarea","disptext"=>"Textarea"));
		load_view("template/select.php",array("options"=>$optionslist,"label"=>"Select Input type","onchange"=>"customform.f2(this);","name"=>"selectformtype"));
		form_input(array("ph"=>"Name of input","name"=>"inputname"));
	?>
	<div id="customform_options" style="display:none;" >
		<div class='optionslist' >
			<?php
			for($i=0;$i<2;$i++){
				form_input(array("ph"=>"Option ".($i+1),"divs"=>"margin-top:-20px;","type"=>"text"));
			}
			?>
		</div>
		<button class='btn btn-default' onclick="extend($($(this).parent().children()[0]),customform.f1);" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
	</div>
	<div id="customform_options_bool" style="display:none;" >
		<div class='optionslist' >
			<?php
			$default_options=array("Yes","No");
			for($i=0;$i<2;$i++){
				form_input(array("ph"=>"Option ".($i+1),"divs"=>"margin-top:-20px;","value"=>$default_options[$i],"type"=>"text"));
			}
			?>
		</div>
		<button class='btn btn-default' onclick="extend($($(this).parent().children()[0]),customform.f1);" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
	</div>
	<?php
		button(array("html"=>"Add","onclick"=>"customform.add_input(this);","style"=>"margin-top:10px;"));
	?>
</div>
