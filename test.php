<?php
include "includes/app.php";

load_view("Template/top.php");


print $a("45", 77);

?>


<div style='margin:20px;' >
	<select class='browser-default selectsearch' id="mohit" style='width:100%;' multiple >
		<option>Mohit.Saini1</option>
		<option>Mohit.Saini2</option>
		<option>Mohit.Saini3</option>
		<option>Mohit.Saini4</option>
		<option>Mohit.Saini5</option>
	</select>
</div>


<?php

//msprint( giget("encodeddataofteacherstable", "lang"));
//msprint(gi("encodeddataofteacherstable"));



//$a = User::fglogin(array("type" => "gpluslogin", "gpluslogin" => 11011, "email" => "mohit19@mail.com"));
//$a = User::fglogin(array("type" => "fblogin", "fblogin" => 11011, "email" => "mohit17@mail.com"));

//print_r($a);


//print_r(gets("login"));


load_view("Template/bottom.php");
closedb();
?>