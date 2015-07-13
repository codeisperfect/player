<?php

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



?>