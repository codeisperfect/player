<?php
class Userc {
	function addgoal($data){
		$ins_data=Fun::getflds(getmyneed("addgoal"),$data);
		$ins_data["expiredate"]=strtotime($ins_data["expiredate"]);
		$ins_data["time"]=time();
		$ins_data["uid"]=User::loginId();
		return array("data"=>Sqle::insertVal("goals",$ins_data),"ec"=>1);
	}
	function set_goalstatus($data){
		return array("data"=>Sqle::updateVal("goals",array("status"=>$data["status"]),array("id"=>$data["gid"],"uid"=>User::loginId())),"ec"=>1);
	}
	function get_goals($data){
		$uid=User::loginId();
		$timenow=time();
		return array("data"=>Sql::getArray("select * from goals where uid=? AND type=? AND expiredate>? order by time desc ",'isi',array(&$uid,&$data["type"],&$timenow)),"ec"=>1);
	}
	function get_allpastgoals($data){
		$uid=User::loginId();
		$timenow=time();
		return array("data"=>Sql::getArray("select * from goals where uid=? AND expiredate<=? order by time desc ",'isi',array(&$uid,&$timenow)),"ec"=>1);
	}
	function get_allexercise($data){
		$uid=User::loginId();
		return array("data"=>Sql::getArray("select * from exercise where uid=? ",'i',array(&$uid)),"ec"=>1);
	}
}
?>