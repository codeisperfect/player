<?php
include "includes/app.php";


$pageinfo = array();
$pageinfo["uid"] = User::loginId();
$uinfo = User::userProfile($pageinfo["uid"]);


if($uinfo != null){
  $uinfo = convdisp($uinfo, array("name", "email", "lang", "fbid", "skypeid", "address", "phone","sign"));

  $pageinfo["uinfo"]=$uinfo;
  load_view("profile.php", $pageinfo);
}



closedb();
?>