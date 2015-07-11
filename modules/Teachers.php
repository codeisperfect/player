<?php
class Teachers{
	function addrembulkts($data){
		global $_ginfo;
		$outp=array("ec"=>1,"data"=>0);
		$slotList=intexplode("-",$data["time"]);
		$dayList=intexplode("-",$data["days"]);
		$startdate = daystarttime(strtotime($data["startdate"]));
		$enddate = daystarttime(strtotime($data["enddate"]));
		if($enddate-$startdate>$_ginfo["calrepeatlimit"]*3600*24)
			$outp["ec"]=-24;
		else{
			$outp["data"]=Funs::addremlist( Funs::bulktsquery($slotList,$dayList,$startdate,$enddate)  ,isset($data["add"]));
		}
		return $outp;
	}

	function teacherModifySlots($data){
		$outp=array("ec"=>1,"data"=>0);
		$slots=intexplode("-",$data["slots"]);
		$datets=daystarttime($data["datets"]);
		$toaddslots=array();
		$toremslots=array();
		for($i=1;$i<=48;$i++){
			if(in_array($i,$slots))
				$toaddslots[]=$datets+($i-1)*1800;
			else
				$toremslots[]=$datets+($i-1)*1800;
		}
		$odata["data"]=array();
		$odata["data"]["add"]=Funs::addremlist($toaddslots,true);
		$odata["data"]["rem"]=Funs::addremlist($toremslots,false);
		return $outp;
	}

	function addtopics($data){
		$outp=array("ec"=>1,"data"=>0);
		$insert_data=Fun::getflds(array("timer","price"),$data);
		$difarr=array("class"=>"c_id","subject"=>"s_id","topic"=>"t_id");
		foreach($difarr as $i=>$val){
			$insert_data[$val]=$data[$i];
		}
		$insert_data["tid"]=User::loginId();
		$reffected=Sqle::insertVal("subjects", $insert_data );
		if(!($reffected>0)){
			$outp["ec"]=-25;
		}
		else{
		}
		return $outp;
	}

	function deltopics($data){
		Sqle::deleteVal("subjects",array("id"=>$data["deleteid"],"tid"=>User::loginId()),1);
		return array("ec"=>1,"data"=>0);
	}

	function updatebio($data) {
		Sqle::updateVal("teachers", array("teachermoto" => $data["teachermoto"]), array("tid" => User::loginId())) ;
		return array("ec"=>1,"data"=>0);
	}
}