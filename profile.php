<?php
include "includes/app.php";


$pageinfo=array();


load_view("profile.php",$pageinfo);


closedb();
?>