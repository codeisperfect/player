<?php
include "includes/app.php";


// $a = handle_request(array("action" => "sechedule", "msg" => "This is Msg", "sid1" => 11, "stime" => "11-2-2016 16:34"));


// msprint( $a );



$a = handle_request(array("sid" => 1, "msg" => "Saini", "stime" => "27-07-2015 19:10"), "sechedule");


msprint($a);


closedb();
?>