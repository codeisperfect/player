<?php
include "includes/app.php";

$ls_output=Funs::lsaction();
if(isget("type"))
	$ls_output["defopen"]=get("type");

load_view("login.php",$ls_output);


closedb();
?>