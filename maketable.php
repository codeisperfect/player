<?php
include "includes/app.php";
function dt($tn){
	echo Sql::query("drop table ".$tn);
}

function drop_table(){
	$tl=array("users","subjects","teachers","timeslot","notf","all_classes","all_subjects","all_topics","all_cst","booked");
	$tl=array("booked");
	foreach($tl as $i=>$val){
		dt($val);
	}
}

function drop_all(){
	$allt=Sql::getArray("show tables");
	foreach($allt as $i=>$val){
		dt($val["Tables_in_teaching"]);
	}
}

function create(){
	echo Sql::query("CREATE TABLE users (id int NOT NULL AUTO_INCREMENT,username varchar(100), password varchar(100) , email varchar(100) ,  name varchar(100) , address varchar(500) , phone varchar(13) , type varchar(3) , create_time int,update_time int , last_login int,last_ip varchar(20),conf varchar(1),econf varchar(1), PRIMARY KEY ( id) ) ");
	echo Sql::query("ALTER TABLE users add profilepic varchar(100) NULL ");
	echo Sql::query("ALTER TABLE users add profilepicbig varchar(100) NULL ");
	echo Sql::query("ALTER TABLE users add gender varchar(1) NULL ");
	echo Sql::query("ALTER TABLE users add dob int NULL ");
	echo Sql::query("ALTER TABLE users add fblogin varchar(50) NULL ");
	echo Sql::query("ALTER TABLE users add gpluslogin varchar(50) NULL ");


	echo Sql::query("CREATE TABLE subjects (id int NOT NULL AUTO_INCREMENT,tid int, c_id int, s_id int, t_id int, PRIMARY KEY ( id) , UNIQUE (tid, c_id, s_id, t_id ) ) ");
	echo Sql::query("ALTER TABLE subjects add timer int NULL ");
	echo Sql::query("ALTER TABLE subjects add price int NULL ");
	echo Sql::query("CREATE TABLE timeslot ( tid int, starttime int, sid int  ) ");
	echo Sql::query("ALTER TABLE timeslot add constraint tid_dt_slot unique (tid,starttime) ");

	echo Sql::query("CREATE TABLE booked ( tid int, starttime int, sid int, duration int  ) ");
	echo Sql::query("ALTER TABLE booked add url varchar(300) NULL ");
	echo Sql::query("ALTER TABLE booked add feedback varchar(3000) NULL ");
	echo Sql::query("ALTER TABLE booked add rate int NULL ");
	echo Sql::query("ALTER TABLE booked add testfiles varchar(1000) NULL ");
	echo Sql::query("ALTER TABLE booked add solnfiles varchar(1000) NULL ");
	echo Sql::query("ALTER TABLE booked add marks int NULL ");
	echo Sql::query("ALTER TABLE booked add c_id int NULL ");
	echo Sql::query("ALTER TABLE booked add s_id int NULL ");
	echo Sql::query("ALTER TABLE booked add t_id int NULL ");
	echo Sql::query("ALTER TABLE booked add surl varchar(300) NULL ");
	echo Sql::query("ALTER TABLE booked add rurl varchar(300) NULL ");
	echo Sql::query("ALTER TABLE booked add class_id int NULL ");
	echo Sql::query("ALTER TABLE booked add bookedat int NULL ");


	echo Sql::query("CREATE TABLE teachers (tid int NOT NULL,iit int, iitentryyear int , degree varchar(100), experience varchar(1000), addinfo varchar(1000) , isselected varchar(1) ) ");
	echo Sql::query("ALTER TABLE teachers add rate int  ");
	echo Sql::query("ALTER TABLE teachers add youtubelink varchar(200)  ");
	echo Sql::query("ALTER TABLE teachers add jsoninfo varchar(1000)  ");
	echo Sql::query("ALTER TABLE teachers add teachingexp int  ");
	echo Sql::query("ALTER TABLE teachers add lang varchar(100)  ");
	echo Sql::query("ALTER TABLE teachers add degree varchar(100) ");
	echo Sql::query("ALTER TABLE teachers add teachermoto varchar(100) ");


	echo Sql::query("CREATE TABLE notf (id int NOT NULL AUTO_INCREMENT, uid int, content varchar(1000),time int,isr varchar(1), url varchar(100), PRIMARY KEY ( id) ) ");
	echo Sql::query("ALTER TABLE notf add sid int NULL ");
	echo Sql::query("CREATE TABLE all_classes (id int UNSIGNED , classname VARCHAR(30) NOT NULL)");
	echo Sql::query("CREATE TABLE all_subjects (id int UNSIGNED , subjectname VARCHAR(30) NOT NULL)");
	echo Sql::query("CREATE TABLE all_topics (id int UNSIGNED , topicname VARCHAR(30) NOT NULL)");
	echo Sql::query("CREATE TABLE all_cst (c_id int UNSIGNED , s_id int UNSIGNED,t_id int UNSIGNED)");
	echo Sql::query("CREATE TABLE user_query ( q_id INT(30) NOT NULL AUTO_INCREMENT,user_id INT(11) DEFAULT NULL, name VARCHAR(50) NOT NULL, phone VARCHAR(10) NOT NULL, email VARCHAR(50) NOT NULL, msg TEXT NOT NULL, resolved TINYINT(1) NOT NULL DEFAULT '0', time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (q_id),  UNIQUE KEY id (q_id) )");

	echo Sql::query("CREATE TABLE moneyaccount (id int NOT NULL AUTO_INCREMENT, uid int, content varchar(1000), time int, amount int, PRIMARY KEY ( id) ) ");

}

//drop_table();
create();

closedb();
?>