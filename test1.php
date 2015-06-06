<?php
$config=array(
	"session_start"=>false,
	"set_session_id"=>0
);
include "includes/app.php";

sleep($_GET["sleep"]);

closedb();
?>