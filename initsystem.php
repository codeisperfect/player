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

function makesomeaccounts(){
	print_r(User::signUp(array("email"=>"admin@admin.com","password"=>"p","type"=>"a")));
	print_r(User::signUp(array("email"=>"mohit@t.com","password"=>"p","type"=>"u")));
	print_r(User::signUp(array("email"=>"mohit@s.com","password"=>"p","type"=>"f")));
	Sqle::q("update users set name=concat('name', id) where name is null or name = '' ");
}



echo add_catg();
echo makesomeaccounts();


closedb();
?>