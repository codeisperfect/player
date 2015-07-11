<?php
include "includes/app.php";

Fun::runmain(curfilename(), Fun::geturlargs());

closedb();
?>