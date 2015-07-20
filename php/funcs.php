<?php

function f_profile_info($uid, $uinfo = null) {
	if($uinfo === null) {
		$uinfo = User::userProfile($uid);
	}
	$pageinfo = applyconv( $uinfo );
	$pageinfo["isme"] = (lid() == $uid);
	$pageinfo["isadmin"] = (User::loginType() == "a");
	$pageinfo["ismea"] = ($pageinfo["isadmin"] || $pageinfo["isme"]);
	$pageinfo["dispbioform"] = ($pageinfo["isme"] && $uinfo["sign"] == "");
	return $pageinfo;
}

function f_cansend(){
	if(User::isloginas('u'))
		$query="select id from users where type='a'";
	else if(User::isloginas('a'))
		$query="select id from users where type='u'";
	else
		$query="select * from users";
	$query1="select users.name,users.id,users.profilepic from (".$query.")selectedpeople left join users on users.id=selectedpeople.id";
	return Sqle::getArray($query1);
}

?>