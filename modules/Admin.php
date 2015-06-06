<?php
class Admin {
	function addcontent($data){
		$ins_data=Fun::getflds(getmyneed("addcontent"),$data);
		$ins_data["time"]=time();
		return array("outp"=>Sqle::insertVal("content",$ins_data), "ec"=>1);
	}
	function addcatg($data){
		return array("outp"=>Sqle::insertVal("catg",array("name"=>$data["name"],"type"=>$data["type"])),"ec"=>1);
	}
}
?>
