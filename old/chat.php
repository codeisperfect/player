<?php
include "includes/app.php";


$pageinfo = array();
$pageinfo["uid"] = User::loginId();
$uinfo = User::userProfile($pageinfo["uid"]);


if($uinfo != null){
  $pageinfo['cansendlist'] = Fun::dbarrtooption(Funs::cansend(),"id","name");
  $pageinfo["msggroup"]=Funs::mygrouplist();
  
  load_view("chat.php", $pageinfo);
}

closedb();
?>

