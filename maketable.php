<?php
include "includes/app.php";



function dt($tn){
	echo Sql::query("drop table ".$tn);
}


function drop_tables(){
	$tl=array("users","msg","forms","msgdata","formsoln","content","catg");
	foreach($tl as $i=>$val){
		dt($val);
	}
}

function drop_all(){
	$allt=Sql::getArray("show tables");
	foreach($allt as $i=>$val){
		dt($val["Tables_in_mohit"]);
	}
}

function make_table(){
	echo Sql::query("CREATE TABLE users (id int NOT NULL AUTO_INCREMENT,username varchar(100), password varchar(100) , email varchar(100) ,  name varchar(100) , address varchar(500) , phone varchar(13) , type varchar(3) , create_time int,update_time int , last_login int,last_ip varchar(20),conf varchar(1),econf varchar(1), PRIMARY KEY ( id) ) ");
	echo Sql::query("ALTER TABLE users add profilepic varchar(100) NULL ");
	echo Sql::query("ALTER TABLE users add dob int NULL ");

	echo Sql::query("CREATE TABLE msg (id int NOT NULL AUTO_INCREMENT, sid int, rid int, aid int, msgid int, isseen varchar(1), PRIMARY KEY ( id) ) ");
	echo Sql::query("CREATE TABLE msgdata (id int NOT NULL AUTO_INCREMENT, msg varchar(1000), type varchar(1), formid int, time int, PRIMARY KEY ( id) ) ");
	//type : 'f'=>'Form','a'=>"Answer", 'm'=>"Message", 

	echo Sql::query("CREATE TABLE forms (id int NOT NULL AUTO_INCREMENT, formjson varchar(1000),title varchar(100), catg int, time int, PRIMARY KEY ( id) ) ");

	echo Sql::query("CREATE TABLE formsoln (fid int, uid int, time int, soln varchar(500) ) ");

	echo Sql::query("CREATE TABLE content (id int NOT NULL AUTO_INCREMENT, title varchar (100), data varchar(3000), catg int, time int, PRIMARY KEY ( id) ) ");
	echo Sql::query("ALTER TABLE content add uid int NULL ");

	echo Sql::query("CREATE TABLE catg (id int NOT NULL AUTO_INCREMENT, name varchar(100), type varchar(1), p int, PRIMARY KEY ( id) ) ");	
	//p for parent catg , catg type : 'c'=> content type catg, 'f' => form type catgs

	echo Sql::query("CREATE TABLE groups (id int NOT NULL AUTO_INCREMENT, name varchar(500), time int , PRIMARY KEY ( id) ) ");
	echo Sql::query("CREATE TABLE groupmember (gid int , uid int, time int) ");

	echo Sql::query("CREATE TABLE exercise (id int NOT NULL AUTO_INCREMENT, title varchar(100), content varchar(2000), uid int, time int, PRIMARY KEY ( id) )");

	echo Sql::query("CREATE TABLE goals (id int NOT NULL AUTO_INCREMENT, title varchar(100), expiredate int, status varchar(1), uid int, type varchar(1), PRIMARY KEY ( id) )");
	echo Sql::query("ALTER TABLE goals add time int NULL ");
}




drop_tables();
make_table();

closedb();

?>
<br>