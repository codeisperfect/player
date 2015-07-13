<?php


$_ginfo["query"]["msg"]="select id, msgid, isseen, aid, sid, (msg.aid=msg.sid OR isseen!='u') as selfseen, (isseen!='u' AND msg.aid=msg.sid) as otherseen, (case when msg.aid=msg.sid then msg.rid else msg.sid end) as personid from msg where true";
$_ginfo["query"]["mymsg"]="select msgdata.time, msgdata.msg as content, msgperson.* from (".gtable("msg")." ) msgperson left join msgdata on msgdata.id=msgid where aid={uid} ";
$_ginfo["query"]["mymsggroupdisp"]="select users.name, users.profilepic, sum(1-mymsg.selfseen) as num_unread, mymsg.* from (".gtable("mymsg")." order by time desc ) mymsg left join users on users.id=mymsg.personid group by personid";
$_ginfo["query"]["mymsggroupdispordered"]="select * from (".gtable("mymsggroupdisp").") mymsggroupdisp order by time desc";
$_ginfo["query"]["mymsgperson"]="select users.name, users.profilepic, mymsg.* from (".gtable("mymsg")." ) mymsg left join users on users.id=mymsg.sid where personid={pid} order by id desc";

if(isset($config["needprofile"])) {
	$myf = User::myprofile();
}


?>