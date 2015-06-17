<?php
include "includes/app.php";

$ls_output=Funs::lsaction();

load_view("login.php",$ls_output);


closedb();
?>