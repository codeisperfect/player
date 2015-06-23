<?php
	function jshref($url=""){
		return "window.location.href='$url'";
	}
	function sessm($key,$val){
		return (isset($_SESSION[$key]) && $_SESSION[$key]==$val);
	}
	function init_db(){
		global $DB,$db_data;
		if($DB==null){
			$DB = new mysqli( $db_data['host'] , $db_data['user'] , $db_data['pass'] , $db_data['db']);
			Sql::init($DB);
		}
	}

	function closedb(){
		global $DB;
		if($DB!=null)
			$DB->close();
	}
	function getval($key,$arr,$default=null){
		 return (isset($arr[$key]) ? $arr[$key] : $default );
	}
	function post($key,$default=null){
		return getval($key,$_POST,$default);
	}
	function isget($key){
		return isset($_GET[$key]);
	}
	function ispost($key){
		return isset($_POST[$key]);
	}
	function isses($key){
		return isset($_SESSION[$key]);
	}
	function get($key,$default=null){
		return getval($key,$_GET,$default);
	}
	function sets($key,$val){
		$_SESSION[$key]=$val;
	}
	function gets($key){
		return getval($key,$_SESSION);
	}


	function load_view($view,$inp=array()){
		global $view_default,$_ginfo;
		if(isset($view_default[$view]))
			$inp=Fun::mergeifunset($inp,$view_default[$view]);
		$inp=Fun::setifunset($inp,"page",$_ginfo["page"]);
		$inp=Fun::setifunset($inp,"islogin",User::loginType());
		$tem_name=Fun::getloadviewname($view);
		$templates=new Templates();
		if(method_exists($templates,$tem_name )){
			$templates->$tem_name($inp);
			return true;
		}
		else{
			$view="php/views/".$view;
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
	function str2json($inp){
		$temp=json_decode($inp);
		if($temp)
			return (array)$temp;
		else
			return null;
	}

	function arr2option($arr,$type='intval'){
		$outp=array();
		for($i=0;$i<count($arr);$i++){
			$temp=array('disptext'=>$arr[$i],'val'=>( $type=='intval' ? $i+1 : $arr[$i] ));
			$outp[]=$temp;
		}
		return $outp;
	}
	function isvalid_action($post_data){
		global $_ginfo;
		if(isset($_ginfo["action_constrain"][$post_data["action"]])){
			$sarr=$_ginfo["action_constrain"][$post_data["action"]];
			$sarr=Fun::mergeifunset($sarr,array("users"=>"","need"=>array()));
			if(!(($sarr["users"]=="all" && User::islogin()) || $sarr["users"]=="" || in_array(User::loginType(), $sarr["users"]) ))
				return -2;
			if(!Fun::isAllSet($sarr["need"], $post_data))
				return -9;
		}
		return true;
	}
	function islset($data,$arr){
		for($i=0;$i<count($arr);$i++){
			if(!isset($data[$arr[$i]]))
				return false;
			$data=$data[$arr[$i]];
		}
		return true;
	}
	function getmyneed($fname){
		global $_ginfo;
		return $_ginfo["action_constrain"][$fname]["need"];
	}

	function handle_request($post_data){
		global $_ginfo;
		$b=new Actions();
		if(User::isloginas('u'))
			$a=new Userc();
		else if(User::isloginas('a'))
			$a=new Admin();
		else
			$a=$b;
		$outp=array("ec"=>-7);
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
	function autoscroll($post_data){
		global $_ginfo;
		$action_spec=$_ginfo["autoscroll"][$post_data["action"]];
		mergeifunset($action_spec, array('sort'=>'', 'maxl'=>null, 'minl'=>null, "filterfunc"=>null, "load_view"=>"template/".$post_data["action"].".php" ));
		$fixed=array("uid"=>User::loginId(), "time"=>time());
		$post_data=Fun::mergeforce($post_data, $fixed);
		$qoutput=Sqle::autoscroll($action_spec["query"], $post_data, $action_spec["key"], $action_spec["sort"], $post_data["isloadold"], $action_spec["minl"], $action_spec["maxl"]);
		if($action_spec["filterfunc"]!=null){
			$autos=new Autoscroll();
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
					load_view($as_handle["load_view"], $as_handle);
					return;
				}
			}
		}
		if($actionarg==null)
			echo json_encode($outp)."\n";
	}

	function setifunset(&$data,$key,$val){
		if(!isset($data[$key]))
			$data[$key]=$val;
		return $data;
	}

	function mergeifunset(&$a,$b){
		$keys=array_keys($b);
		for($i=0;$i<count($keys);$i++){
			if(!isset($a[$keys[$i]]))
				$a[$keys[$i]]=$b[$keys[$i]];
		}
		return $a;
	}
	function myexplode($n,$st){
		$temp=explode($n,$st);
		return (count($temp)==1 && $temp[0]=="") ? array() : $temp;
	}
	function intexplode($ex,$inp){
		$temp=myexplode($ex,$inp);
		foreach($temp as $i=>$val){
			$temp[$i]=0+$val;
		}
		return $temp;
	}
	function daystarttime($ts=null){
		setifnn($ts,time());
		return strtotime(Fun::timetodate($ts));
	}
	function resizeimg($filename,$tosave, $max_width, $max_height){
		$imginfo=getimagesize($filename);
		list($orig_width, $orig_height) = $imginfo;
		$type=$imginfo[2];


		$crop_width=$orig_width;
		$crop_height=$orig_height;
		if($orig_width*$max_height <= $orig_height*$max_width){
			$crop_height=$orig_width*$max_height/$max_width;
		}
		else{
			$crop_width=$orig_height*$max_width/$max_height;
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
			$outp[]=&$inp[$i];
		}
		return $outp;
	}
	function gtable($name){
		global $_ginfo;
		return $_ginfo["query"][$name];
	}
	function grouplist($inp,$gap=1){
		$outp=array();
		$started=0;
		$ended=0;
		for($i=0;$i<count($inp);$i++){
			if($started==null){
				$started=$inp[$i];
				$ended=$started;
			}
			else if($inp[$i]-$ended==$gap){
				$ended=$inp[$i];
			}
			else{
				$outp[]=array($started,($ended-$started)/$gap+1);
				$started=null;
				$i--;
			}
		}
		if($started!=null){
			$outp[]=array($started,($ended-$started)/$gap+1 );
		}
		return $outp;
	}
	function sql2dict($data,$key){
		$outp=array();
		foreach($data as $i=>$row){
			$outp[$row[$key]]=$row;
		}
		return $outp;
	}
	function lastelm($arr){
		if(count($arr)==0)
			return null;
		else
			return $arr[count($arr)-1];
	}
	function firstelm($arr){
		if(count($arr)==0)
			return null;
		else
			return $arr[0];
	}
	function curfilename(){
		return firstelm(explode(".",lastelm(explode("/",$_SERVER['SCRIPT_FILENAME']))));
	}
	function errormsg($ec,$cnd=true){
		global $_ginfo;
		return (($ec<0 && $cnd) ?getval($ec, $_ginfo["error"], "Error : ".$ec):"");
	}
	function convdisp($row, $need, $add = 'smily_', $tosmily=false){
		foreach($need as $val) {
			$row[$add.$val] = ($tosmily ? Fun::smilymsg($row[$val]) : htmlspecialchars($row[$val]));
		}
		return $row;
	}
	function setift(&$var, $val, $istrue=true){
		if($istrue){
			$var = $val;
		}
	}

	function setifnn(&$var, $val) {
		setift($var, $val, $var==null);
	}


?>