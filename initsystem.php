<?php
include "includes/app.php";


function add_catg(){
	$content_catg=array("Stress Managment","Yoga");
	$form_catg=array("Slept well","Played today");
	$ins_data=array();
	foreach($content_catg as $i=>$val){
		$ins_data[]=array($val,'c');
	}
	foreach($form_catg as $i=>$val){
		$ins_data[]=array($val,'f');
	}
	return Sql::query("insert into catg (name,type) ".Fun::makeDummyTableColumns($ins_data,null,'ss')."");
}


echo add_catg();


closedb();
?>