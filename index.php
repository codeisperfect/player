<?php
$config=array(
	"session_start"=>true,
	"set_session_id"=>1233
);
include "includes/app.php";
load_view("template/top.php");

$form=array(
	array("type"=>"text",
		"name"=>"Your Name",
		"dc"=>"simple"
		),
	array("type"=>"text",
		"name"=>"Your Age",
		"dc"=>"pint"
		),
	array("type"=>"select",
		"design"=>1,
		"options"=>array("Mohit","Saini","Vikash"),
		"name"=>"What is your friend ?",
		"dc"=>"simple"
		),
	array("type"=>"mselect",
		"options"=>array("Hindi","English","Chiness"),
		"design"=>1,
		"name"=>"What do u speak ?"
		),
	array("type"=>"select_bool",
		"design"=>1,
		"name"=>"Are you fine ?"
		),
	array("type"=>"textarea",
		"name"=>"Your hobby ?",
		"dc"=>"simple"
		)
);


//Disp::disp_form($form,"myform");

?>


<div align=center >
<div style="width:600px;" align=left >
<?php
load_view("makeform.php");
?>
</div>
</div>


<?php




//load_view("template/mselect.php",array("labels"=>array("timepass","Mohit"),"selectall"=>true,"selectallselected"=>true,"name"=>"mohit","data"=>array(1)));





load_view("template/bottom.php");

closedb();
?>