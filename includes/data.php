<?php
$_ginfo=array();

$_ginfo["default_user_type"]='u';















$view_default=array(
	'template/top.php'=>array(
		"title"=>"Player",
		"css"=>array("bootstrap-3.1.1-dist/css/bootstrap.css","bootstrap-3.1.1-dist/css/bootstrap-theme.css","css/main.css")
		),
	'template/bottom.php'=>array(
		"js"=>array("bootstrap-3.1.1-dist/js/jquery1.js","bootstrap-3.1.1-dist/js/bootstrap.js","js/lib.js","js/mohit.js","js/errorcodes.js","js/mohitlib.js","js/main.js"),
		"needpopup"=>true
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
		)
	);


$_ginfo["attributes"]=array("name","value","style","class","id","type","ph","onclick","dc",'rows',"disabled","align","valign","action","autofocus","style","rel","type","href","value","src");
$_ginfo["attrs_shortcut"]=array("ph"=>"placeholder","dc"=>"data-condition");

$_ginfo["action_constrain"]=array(
	"signup"=>array("need"=>array("name","email","password")),
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


?>