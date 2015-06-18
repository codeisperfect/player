<?php
$_ginfo=array();

$_ginfo["default_user_type"]='f';



$view_default=array(
	'template/top.php'=>array(
		"title"=>"Player",
		"css"=>array("bootstrap-3.1.1-dist/css/bootstrap.css","bootstrap-3.1.1-dist/css/bootstrap-theme.css","css/main.css")
		),
	'template/topnew.php'=>array(
		"title"=>"Player",
		"closehead"=>true,
		"addcss"=>array()
		),
	'template/bottom.php'=>array(
		"js"=>array("bootstrap-3.1.1-dist/js/jquery1.js","bootstrap-3.1.1-dist/js/bootstrap.js","js/lib.js","js/mohit.js","js/errorcodes.js","js/mohitlib.js","js/main.js"),
		"needpopup"=>true
		),
	'template/bottomnew.php'=>array(
		"addjs"=>array(),
		"needpopup"=>true,
		"closebody"=>true
		),
	"template/mselect.php"=>array(
		"name"=>"",
		"data"=>"all",
		"divstyle"=>"",
		"blocked"=>array(),
		"selectall"=>true,
		"selectallselected"=>true,
		"label"=>""
		),
	"template/select.php"=>array(
		"name"=>"",
		"label"=>"",
		"selectval"=>"",
		"dc"=>"simple",
		"onchange"=>""
		),
	"template/select_bool.php"=>array(
		"label"=>"",
		"name"=>"",
		"options"=>array("Yes","No")
		),
	"template/input.php"=>array(
		"inpattr"=>array(),
		"divattr"=>array(),
		"label"=>"Enter",
		"name"=>"",
		"type"=>"",
		"closediv"=>true,
		"dc"=>"simple"
		),
	"template/input1.php"=>array(
		"inpattr"=>array(),
		"divattr"=>array(),
		"diviattr"=>array(),
		"label"=>"Enter",
		"name"=>"",
		"type"=>"",
		"dc"=>"simple"
		),
	"login.php"=>array(
		"defopen"=>"login"
		),
	"template/popup.php"=>array(
		"title"=>"this popup is made in India",
		"body"=>"",
		"bodyinfo"=>array(),
		"footer"=>"",
		"footerinfo"=>array(),
		"name"=>"",
		'stylebody'=>'',
		'stylemain'=>'min-width:200px;',
		'defaultfooter'=>true
		)
	);


$_ginfo["attributes"]=array("name","value","style","class","id","type","ph","onclick","dc",'rows',"disabled","align","valign","action","autofocus","style","rel","type","href","value","src");
$_ginfo["attrs_shortcut"]=array("ph"=>"placeholder","dc"=>"data-condition");
$_ginfo["shoudnotnull"]=array("id","name","value","style","class","type");

$_ginfo["action_constrain"]=array(
	"signup"=>array("need"=>array("name","email","password","phone")),
	"login"=>array("need"=>array("email","password")),
	"logout"=>array("need"=>array()),
	"sendmsg"=>array("need"=>array("msg","rid","type","formid"),"users"=>"au","isfilter"=>"sisi"),
	"loadmsg"=>array("need"=>array("uid","num_msg","minid","maxid","is_load_newer"),"users"=>"au","isfilter"=>""),
	"addcontent"=>array("need"=>array("title","data","catg"),"isfilter"=>"ssi"),
	"addform"=>array("need"=>array("formjson","title","catg"),"isfilter"=>"ssi"),
	"addingroup"=>array("need"=>array("gid","uids")),
	"creategroup"=>array("need"=>array("uids","name")),
	"addgoal"=>array("need"=>array("title","expiredate","type")),
	"set_goalstatus"=>array("need"=>array("gid","status")),
	"get_goals"=>array("need"=>array("type")),
	"get_allpastgoals"=>array(),
	"addexercise"=>array("needs"=>array("title","content"))
);


$_ginfo["autoinsert"]=array(
	"addcontent"=>array("fixed"=>array("time","uid"),"table"=>"content"),
	"addform"=>array("fixed"=>array("time"),"table"=>"forms"),
	"addexercise"=>array("fixed"=>array("time","uid"),"table"=>"exercise")
);

$_ginfo["error"]=array(
	"-1"=>"Session expired",
	"-2"=>"You are not right person to perform this action.",
	"-3"=>"Incorrect formate of input",
	"-4"=>"Password incorrect",
	"-5"=>"Username doesn't exist",
	"-6"=>"Email id not registered",
	"-7"=>"Action handler not defined",
	"-8"=>"Session expired or You are not right person to perform this action.",
	"-9"=>"Not sufficient arguments.",
	"-16"=>"This email id used Already",
	"-17"=>"OTP is incorrect",
	"-19"=>"You cannot choose slot of past.",
	"-20"=>"You Cannot generate link",
	"-21"=>"Your account deactivated",
	"-22"=>"Nobody is login",
	"-23"=>"File not uploaded",
	"-24"=>"You cannot do so much repeatition.",
	"-25"=>"Error",
	"-25"=>"Subject Already Added",
	"1"=>"Positive"
);

$_ginfo['lang']=array("Hindi","English","Hinglish");

?>