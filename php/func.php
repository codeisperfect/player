<?php
	function div($a, $b) {
		return ($a-($a%$b))/$b;
	}

	function jshref($url="") {
		return "window.location.href = '$url'";
	}

	function sessm($key, $val) {
		return (isset($_SESSION[$key]) && $_SESSION[$key]==$val);
	}

	function init_db() {
		global $DB,$db_data;
		if($DB==null){
			$DB = new mysqli( $db_data['host'] , $db_data['user'] , $db_data['pass'] , $db_data['db']);
			Sql::init($DB);
		}
	}

	function closedb() {
		global $DB;
		if($DB!=null)
			$DB->close();
	}

	function getval($key,$arr,$default=null){
		 return ( ($arr!==null && isset($arr[$key])) ? $arr[$key] : $default );
	}

	function post($key, $default=null) {
		return getval($key,$_POST,$default);
	}

	function isget($key) {
		return isset($_GET[$key]);
	}

	function ispost($key) {
		return isset($_POST[$key]);
	}

	function isses($key) {
		return isset($_SESSION[$key]);
	}

	function get($key, $default = null) {
		return getval($key, $_GET, $default);
	}

	function sets($key, $val) {
		$_SESSION[$key] = $val;
	}

	function gets($key, $default = null) {
		return getval($key,$_SESSION,$default);
	}

	function load_view($view, $inp = array()) {
		global $view_default,$_ginfo;
		if(isset($view_default[$view]))
			$inp=Fun::mergeifunset($inp,$view_default[$view]);
		$inp=Fun::setifunset($inp,"page", getNameFromUrl(Fun::getcururl()));
		$inp=Fun::setifunset($inp,"islogin",User::loginType());
		$tem_name=Fun::getloadviewname($view);
		$templates=new Templates();
		if(method_exists($templates,$tem_name )){
			$templates->$tem_name($inp);
			return true;
		}
		else{
			$view = gi("loadviewfile").$view;
			if(file_exists($view)){
				foreach($inp as $key=>$val){
					$$key=$val;
				}
				include $view;
				return true;
			}
			else{
				echo "MM Error : Unable to load view ".$view." Line ".__LINE__." in file ".__FILE__ ;
				return false;
			}
		}
	}

	function str2json($inp) {
		$temp = json_decode($inp);
		if($temp)
			return (array)$temp;
		else
			return null;
	}

	function arr2option($arr, $type = 'intval') {
		$outp = array();
		for($i=0;$i<count($arr);$i++){
			$temp = array('disptext'=>$arr[$i],'val'=>( $type=='intval' ? $i+1 : $arr[$i] ));
			$outp[] = $temp;
		}
		return $outp;
	}

	function lastelm($arr) {
		if(count($arr)==0)
			return null;
		else
			return $arr[count($arr)-1];
	}

	function firstelm($arr) {
		if(count($arr)==0)
			return null;
		else
			return $arr[0];
	}

	function curfilename(){
		$cfname=firstelm(explode(".",lastelm(explode("/",$_SERVER['SCRIPT_FILENAME']))));
		if($cfname=='')
			$cfname="index";
		return $cfname;
	}

	function isUserLoggedInAs($loginTypeArray) {
	//Function Added By Tej Pal Sharma  The function takes an argument array of string of login types like array('s','t','a') and returns 1 if user of any of these types is currently logged in otherwise it returns 0.CAUSTION: FUNCTION USED IN DATABASE QUERY, SO KEEP THAT IN MIND WHILE EDITING.
		$userLoginType = User::loginType();
		if(in_array($userLoginType, $loginTypeArray))
			return 1;
		else
			return 0;
	}

	function isvalid_action($post_data) {
		global $_ginfo;
		if(isset($_ginfo["action_constrain"][$post_data["action"]])){
			$sarr=$_ginfo["action_constrain"][$post_data["action"]];
			$sarr=Fun::mergeifunset($sarr,array("users"=>"","need"=>array()));
			if(!(($sarr["users"]=="all" && User::islogin()) || $sarr["users"]=="" || ($sarr["users"] != "all" && in_array(User::loginType(), $sarr["users"])) ))
				return -2;
			if(!Fun::isAllSet($sarr["need"], $post_data))
				return -9;
		}
		return true;
	}

	function islset($data, $arr) {
		for($i = 0;$i<count($arr);$i++){
			if(!isset($data[$arr[$i]]))
				return false;
			$data = $data[$arr[$i]];
		}
		return true;
	}

	function getmyneed($fname) {
		global $_ginfo;
		return $_ginfo["action_constrain"][$fname]["need"];
	}

	function handle_request($post_data, $action=null) {
		global $_ginfo;
		$b=new Actions();
		if(User::isloginas('s'))
			$a=new Students();
		else if(User::isloginas('a'))
			$a=new Admin();
		else if(User::isloginas('t'))
			$a=new Teachers();
		else
			$a=$b;
		$outp=array("ec"=>-7);
		if($action != null) {
			$post_data["action"] = $action;
		}
		if(isset($post_data["action"])  ){
			$isvalid=isvalid_action($post_data);
			if(!($isvalid>0))
				$outp["ec"]=$isvalid;
			else{
				$func=$post_data["action"];
				if( method_exists($a,$post_data["action"]))
					$outp=$a->$func($post_data);
				else if( method_exists($b,$post_data["action"]))
					$outp=$b->$func($post_data);
				else if(islset($_ginfo,array("autoinsert",$post_data["action"]))) {
					$action_spec=$_ginfo["autoinsert"][$post_data["action"]];
					$action_spec=Fun::mergeifunset($action_spec,array("fixed"=>array(),"add"=>array()));
					$ins_data=Fun::getflds(getmyneed($post_data["action"]) , $post_data );
					$ins_data=Fun::mergeifunset($ins_data,$action_spec["add"]);
					$fixvalues=array("time"=>time(),"uid"=>User::loginId());
					foreach($action_spec["fixed"] as $i=>$val){
						$ins_data[$val]=$fixvalues[$val];
					}
					$outp["data"]=Sqle::insertVal($action_spec["table"],$ins_data);
					$outp["ec"]=1;
				}
			}
		}
		return $outp;
	}

	function rquery($str, $data) {
		preg_match_all("|{[^}]+}|U",$str,$matches);
		$matches=$matches[0];
		for($i=0;$i<count($matches);$i++){
			$key=substr($matches[$i],1,strlen($matches[$i])-2);
			if(isset($data[$key])){
				$str=str_replace($matches[$i],$data[$key],$str);
			}
		}
		return $str;
	}

	function timeondate($day, $month, $year){
		return strtotime($day."-".$month."-".$year);
	}

	function setift(&$var, $val, $istrue=true){
		if($istrue){
			$var = $val;
		}
	}
	function getifn($inp, $alt=null) {
		return rit($inp, $inp!=null, $alt);
	}

	function setifnn(&$var, $val) {
		setift($var, $val, $var==null);
	}

	function setifunset(&$data,$key,$val){
		if(!isset($data[$key]))
			$data[$key]=$val;
		return $data;
	}

	function mergeifunset(&$a, $b) {
		$keys = array_keys($b);
		for($i = 0;$i<count($keys);$i++){
			if(!isset($a[$keys[$i]]))
				$a[$keys[$i]] = $b[$keys[$i]];
		}
		return $a;
	}

	function myexplode($n, $st, $filterfunc=null) {
		$temp = explode($n,$st);
		$outp = (count($temp)==1 && $temp[0]=="") ? array() : $temp;
		if( $filterfunc != null ) {
			return filter($outp, $filterfunc);
		} else
			return $outp;
	}

	function intexplode($ex, $inp) {
		$temp = myexplode($ex,$inp);
		foreach($temp as $i=>$val){
			$temp[$i] = 0+$val;
		}
		return $temp;
	}

	function intexplode_t2($inp, $limit=-1, $ex='-'){
		$temp=myexplode($ex,$inp);
		$outp=array();
		foreach($temp as $i=>$val){
			$val=0+$val;
			if(1<=$val &&  ($limit==-1 || $val<=$limit) )
				$outp[]=$val;
		}
		return $outp;
	}

	function daystarttime($ts=null){
		setifnn($ts,time());
		return strtotime(Fun::timetodate($ts));
	}

	function resizeimg($filename,$tosave, $max_width, $max_height){
		$imginfo=getimagesize($filename);
		list($orig_width, $orig_height) = $imginfo;
		$type = $imginfo[2];


		$crop_width = $orig_width;
		$crop_height = $orig_height;
		if($orig_width*$max_height <= $orig_height*$max_width){
			$crop_height = $orig_width*$max_height/$max_width;
		}
		else{
			$crop_width = $orig_height*$max_width/$max_height;
		}

		$image_p = imagecreatetruecolor($max_width, $max_height);
		switch($type){
			case "1": 
				$image = imagecreatefromgif($filename); 
				$transparent = imagecolorallocatealpha($image_p, 0, 0, 0, 127);
				imagefill($image_p, 0, 0, $transparent);
				imagealphablending($image_p, true);         
				break;
			case "2": $image = imagecreatefromjpeg($filename);break;
			case "3": 
				$image = imagecreatefrompng($filename);
				imagealphablending($image_p, false);
				imagesavealpha($image_p, true);
				break;
			default:  $image = imagecreatefromjpeg($filename);
		}
		imagecopyresampled($image_p, $image, 0, 0, ($orig_width-$crop_width)/2, ($orig_height-$crop_height)/2, $max_width, $max_height, $crop_width, $crop_height);

		$ext=pathinfo($tosave, PATHINFO_EXTENSION);

		switch($ext){
			case "gif": imagegif($image_p,$tosave); break;
			case "jpg": imagejpeg($image_p,$tosave,100); break;
			case "jpeg": imagejpeg($image_p,$tosave,100); break;
			case "png": imagepng($image_p,$tosave,0);break;
			default: imagejpeg($image_p,$tosave,100);
		}
		chmod($tosave,0777);
	}
	function getrefarr(&$inp){
		$outp=array();
		foreach($inp as $i=>$val){
			$outp[] = &$inp[$i];
		}
		return $outp;
	}

	function gtable($name, $alias=true) {
		global $_ginfo;
		return ($alias ? ("(".$_ginfo["query"][$name].") ".$name) : $_ginfo["query"][$name]);
	}

	function grouplist($inp, $gap=1) {
		$outp = array();
		$started = 0;
		$ended = 0;
		for($i=0;$i<count($inp);$i++){
			if($started==null){
				$started = $inp[$i];
				$ended = $started;
			}
			else if($inp[$i]-$ended==$gap){
				$ended = $inp[$i];
			}
			else{
				$outp[] = array($started,($ended-$started)/$gap+1);
				$started = null;
				$i--;
			}
		}
		if($started!=null){
			$outp[] = array($started,($ended-$started)/$gap+1 );
		}
		return $outp;
	}

	function sql2dict($data, $key) {
		$outp = array();
		foreach($data as $i=>$row){
			$outp[$row[$key]] = $row;
		}
		return $outp;
	}

	function errormsg($ec, $cnd=true) {
		global $_ginfo;
		return (($ec<0 && $cnd) ?getval($ec, $_ginfo["error"], "Error : ".$ec):"");
	}

	function tf($inp) {
		return $inp?"true":"false";
	}

	function autoscroll($post_data){
		global $_ginfo;
		$action_spec=$_ginfo["autoscroll"][$post_data["action"]];
		mergeifunset($action_spec, array('sort'=>'', 'maxl'=>null, 'minl'=>null, "filterfunc"=>null, "load_view"=>"template/".$post_data["action"].".php" ));
		$fixed=array("uid"=>User::loginId(), "time"=>time());
		$post_data=Fun::mergeforce($post_data, $fixed);
		$qoutput=Sqle::autoscroll($action_spec["query"], $post_data, $action_spec["key"], $action_spec["sort"], $post_data["isloadold"], $action_spec["minl"], $action_spec["maxl"]);
		if($action_spec["filterfunc"]!=null){
			$autos=new Autoscoll();
			$funcname=$action_spec["filterfunc"];
			if(method_exists($autos, $funcname))
				$qoutput=$autos->$funcname($qoutput);
		}
		$qoutput["load_view"]=$action_spec["load_view"];
		return $qoutput;
	}
	function handle_disp($post_data,$actionarg=null){
		global $_ginfo;
		if($actionarg!=null)
			$post_data["action"]=$actionarg;
		$a=new Actiondisp();
		$outp=array("ec"=>-7);
		if(isset($post_data["action"])  ){
			$isvalid=isvalid_action($post_data);
			if(!($isvalid>0))
				$outp["ec"]=$isvalid;
			else{
				$func=$post_data["action"];
				if( method_exists($a,$post_data["action"])){
					$a->$func($post_data,$actionarg==null);
					return;
				}
				else if(islset($_ginfo,array("autoscroll",$post_data["action"]))) {
					$as_handle = autoscroll($post_data);
					$outp["data"]=Fun::getflds(array("min", "max", "minl", "maxl"), $as_handle);
					$outp["ec"]=1;
					if($actionarg==null)
						echo json_encode($outp)."\n";
					load_view($as_handle["load_view"], array("qresult"=>$as_handle["qresult"]));
					return;
				}
			}
		}
		if($actionarg==null)
			echo json_encode($outp)."\n";
	}

	function subsarr($arr1, $arr2){
		/*	
			$arr1 - $arr2
		*/
		$outp = array();
		foreach( $arr1 as $i){
			if( !in_array($i, $arr2))
				$outp[]=$i;
		}
		return $outp;
	}

	function rit($toprint, $cond=true, $toprint_false=''){
		if($cond)
			return $toprint;
		else
			return $toprint_false;
	}

	function convchars($inp){
		$conv=array("&" => "&amp;", '"' => "&quot;", "'" => "&#039;", "<" => "&lt;", ">" => "&gt;");
		foreach($conv as $i => $val) {
			$inp=str_replace($i, $val, $inp);
		}
		return $inp;
	}

	function getNameFromUrl($url) {
		$arr=Fun::myexplode('/',$url);
		$index=array_search('welcome', $arr)+1;
		if(!(isset($arr[$index])) || $arr[$index]=='' || $arr[$index]=='#')
			return 'index';
		else if(strpos($arr[$index],'?')!==false) {
			$ok=Fun::myexplode('?',$arr[$index]);
			return $ok[0];
		}
		return $arr[$index];
	}

	function searchkeysplit($searchString) {
		$searchString = preg_replace("/[^a-zA-Z 0-9]+/", " ", $searchString);
		$searchString = trim($searchString);
		return myexplode(" ", strtolower($searchString));
	}


	function g($inp) {
		global $$inp;
		return $$inp;
	}

	function s($inp, $val=null) {
		global $$inp;
		$$inp = $val;
	}

	function gi($inp) {
		return getval($inp, g("_ginfo"));
	}

	function listget() {
		$args = func_get_args();
		$inplist = array_slice($args, 1);
		$outp = getval(0,$args);
		foreach($inplist as $i => $val) {
			$outp = getval( $val, $outp );
		}
		return $outp;
	}

	function gget() {
		$args = func_get_args();
		$args[0] = g(getval(0, $args));
		return call_user_func_array("listget", $args);
	}

	function giget() {
		$args = func_get_args();
		$args[0] = gi(getval(0, $args));
		return call_user_func_array("listget", $args);
	}
	
	function filter($list, $boolfunc) {
		$outp = array();
		foreach($list as $i => $val) {
			if($boolfunc($val, $i) === true) {
				$outp[] = $val;
			}
		}
		return $outp;
	}

	function map($list ,$func, $custom=array()) {
		mergeifunset($custom, array("isindexed" => false, "ismapkey"=>false));
		$outp = array();
		foreach($list as $i => $val) {
			if($custom["ismapkey"] )
				$outp[ $func($i) ] = $val;
			else
				$outp[($custom["isindexed"]?$val:$i)] = $func($val, $i);
		}
		return $outp;
	}

	function add($a, $b) {
		if(gettype($a) == "array" && gettype($b) == "array" ) {
			return Fun::array_append($a, $b);
		} else if (gettype($a) == "array" && gettype($b) == "integer") {
			return Fun::array_addinall($a, $b);
		}
	}

	function msvalprint($inp) {//recursive function.
		if(gettype($inp) == "array") {
			$isnindex = (array_keys($inp) == Fun::oneToN(count($inp)-1, 0));//is natural indexed
			$otext = map(array_keys($inp), function($ind) use($isnindex, $inp) {
				return ($isnindex?"":"'".$ind."'=>").msvalprint($inp[$ind]);
			});
			return "array(".implode(", ", $otext).")";
		} else if(gettype($inp) == 'integer') {
			return $inp;
		} else {
			$inp = str_replace("'", "\\'", "".$inp);
			return "'".$inp."'";
		}
	}

	function msimplode($glue, $inp, $defval=null) {
		 return (count($inp) == 0 && $defval != null ) ? $defval : implode($glue, $inp);
	}

	function f($content) {
		global $msvar;
		$af = function($inp, $ind) use ($content, $msvar) {
			$content = '$foutput  = '.$content.';';
			eval($content);
			return $foutput;
		};
		return $af;
	}

	function ao() {
		return array("ec" => 1, "data" => 0);
	}

	function msmail($file, $data = array(), $to=null) {
		setifnn($to, gi("adminmail"));
		Fun::mailfromfile($to, gi("mailfile").$file, $data);
	}

	function emptyarr($inp) {
		return map($inp, f('""'), array("isindexed" => true));
	}

	function a() {
		return func_get_args();
	}

	function fixedlen($inp, $len=20) {
		return Fun::limitlen($len, Fun::inclen($len, $inp));
	}

	function mystr_repeat($str, $len) {
		if($len>0)
			return str_repeat($str, $len);
		else
			return "";
	}

	function lid() {
		return (0+User::loginId());
	}

?>