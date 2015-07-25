<?php

function f_sqltransform($inp = array()) {
	if(count($inp) > 0)
		return add(array( array_keys($inp[0]) ), map($inp, f('array_values($inp)') ));
	else
		return array();
}

function f_convertinp($inparr=array(), $conv=array(), $needtoconv = array()) {
	return map(array_keys($inparr), function($inp) use($conv, $needtoconv, $inparr){
		if(isset( $needtoconv[$inp] ) && isset( $conv[$needtoconv[$inp]] ) )
			return $conv[$needtoconv[$inp]]($inparr[$inp]);
		else
			return $inparr[$inp];
	}, array("isindexed" => true));
}

function f_mapkeys($inparr, $maparr = array()) {
	return map($inparr, function($inp) use($maparr){
		return getval($inp, $maparr, $inp);
	}, array("ismapkey" => true));
}

function f_array_a_minus_b($a, $b) {
	$outp = a();
	foreach($a as $i) {
		if(!in($i, $b))
			$outp[] = $i;
	}
	return $outp;
}

function f_add_fixed_values($inp, $fvalues = "all") {
	$allfixvalues = array("time"=>time(), "uid"=> lid());
	setift($fvalues, array_keys($allfixvalues), $fvalues == "all" );
	mius(&$inp, f_getflds($fvalues, $allfixvalues), true);//forcefully set
	return $inp;
}

function f_getflds($arr,$data){
	$outp = array();
	foreach($arr as $i) {
		if(isset($data[$i]))
			$outp[$i] = $data[$i];
	}
	return $outp;
}

function f_action_constrain_default() {
	return array("need" => array(), "users" => "", "autodelete" => false, "autoinsert" => false, "autoupdate" => false, "fixed" => array(), "match" => "all", "update" => array(), "insert" => "all", "keymap" => array(), "cleanneed" => false, "funcs" => null, "conv" => array() );
}


function f_isalls($alist, $data) {
	for($i=0;$i<count($alist);$i++)
		if( ! isset($data[ $alist[$i] ]) )
			return false;
	return true;
}


function f_isvalid_action($post_data, $spec) {//spec is initialized
	if( !( $spec["users"] === '' || in(User::loginType(), $spec["users"]) ) )
		return -2;
	if( !f_isalls( $spec["need"], $post_data) ) {
		return -9;
	}
	return true;
}


function f_setinput($post_data, $spec = array()) {//$post_data has action key, $spec is initialized
	if($spec["cleanneed"]) {
		$post_data = f_getflds(array_keys($spec["need"]), $post_data);
	}
	$post_data = f_convertinp( f_add_fixed_values( f_mapkeys($post_data, $spec["keymap"]), $spec["fixed"] ), gget("convert", "todb"), $spec["conv"]) ;
	if( $spec["funcs"] !==null ) {
		$post_data = call_user_func(getval($spec["funcs"], gi("funcs")), $post_data);
	}
	$spec["data"] = $post_data;
	foreach(array("insert", "match") as $i) {
		setift($spec[ $i ], array_keys($spec["data"]), $spec[ $i ] === "all");
		$spec["autodata"] = f_getflds($spec[$i], $spec["data"]);
	}
	return $spec;
}

function f_handle_db_request($req) {
	$outp = 0;
	if($req["autoinsert"]) {
		$outp = Sqle::insertVal($req["table"], $req["autodata"]);
	}
	if($req["autodelete"])
		$outp = Sqle::deleteVal($req["table"], $req["autodata"]);
	if( $req["autoupdate"])
		$outp = Sqle::updateVal($req["table"], $req["update"], $req["autodata"]);
	return $outp;
}


function f_deletekeys($inp, $keys = array()) {
	$outp = array();
	foreach($inp as $i => $val) {
		if(!in($i, $keys))
			$outp[$i] = $val;
	}
	return $outp;
}


?>