<?php
class Admin {
	function addingroup($data){
		$alluid=Fun::intexplode($data["uids"]);
		$ins_array=array();
		$timenow=time();
		foreach($alluid as $i=>$val){
			$ins_array[]=array($data["gid"],$val,$timenow);
		}
		return array("data"=>Sql::query("insert into groupmember ".Fun::makeDummyTableColumns($ins_array).""),"ec"=>1);
	}
	function creategroup($data){
		$gid=Sqle::insertVal("groups",array("time"=>time(),"name"=>$data["name"]));
		addingroup(array("gid"=>$gid,"uids"=>$data["uids"]));
	}
	function addcatg($data){
		return array("data"=>Sqle::insertVal("catg",array("name"=>$data["name"],"type"=>$data["type"])),"ec"=>1);
	}

}
?>