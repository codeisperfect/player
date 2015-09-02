<?php


$_ginfo["query"]["allmsg"]="select id, msgid, isseen, aid, sid, (msg.aid=msg.sid OR isseen!='u') as selfseen, (isseen!='u' AND msg.aid=msg.sid) as otherseen, (case when msg.aid=msg.sid then msg.rid else msg.sid end) as personid from msg where true";

$_ginfo["query"]["mymsg"]="select msgdata.time, msgdata.msg as content, allmsg.* from ".gtable("allmsg")." left join msgdata on msgdata.id=msgid where aid={uid} ";

$_ginfo["query"]["mymsggroupdisp"]="select users.name, users.profilepic, sum(1-mymsg.selfseen) as num_unread, mymsg.* from (".gtable("mymsg", false)." order by time desc ) mymsg left join users on users.id=mymsg.personid group by personid";

$_ginfo["query"]["mymsggroupdispordered"]="select * from ".gtable("mymsggroupdisp")." order by time desc";

$_ginfo["query"]["mymsgperson"]="select users.name, users.profilepic, mymsg.* from ".gtable("mymsg")." left join users on users.id=mymsg.sid where personid={pid} order by id desc";

$_ginfo["query"]["dispsechedule"] = "select users.name as whomname, sechedule.* from sechedule left join users on users.id = sechedule.sid order by id desc";


if(isset($config["needprofile"])) {
	$myf = User::myprofile();
}

foreach(array("sechedule", "dsechedule", "dispsechedule") as $inp) {
	mius(&$_ginfo["action_constrain"][$inp], array("view" => "template/dispsechedule.php", "dispquery" => "dispsechedule", "dispconv" => array("stime" => "timetostr"), "dispfuncs" => "gettable" ));
}

// msprint( $_ginfo["action_constrain"]["dispsechedule"] );

// //msprint( $_ginfo["action_constrain"]["sechedule"] );

// // $aa = $_ginfo["action_constrain"]["sechedule"];

// // map(array("mohit", "saini"), function($inp) use($aa) {
// // 	global $aa;
// // 	mius(&$aa, array($inp => "Saini"));
// // });

// // msprint($aa);


?>