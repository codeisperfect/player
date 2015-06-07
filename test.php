<?php
include "includes/app.php";




if(0){
	$a=handle_request(array("email"=>"mohitsaini@gmail.com","password"=>"123","action"=>"login"));
	$a=handle_request(array("action"=>"sendmsg","msg"=>"Hey Mohit,111","rid"=>"3","type"=>'m',"formid"=>0));
	$a=handle_request(array("action"=>"loadmsg","uid"=>"3","minid"=>'0',"maxid"=>0,"is_load_newer"=>1,"num_msg"=>10));
	print_r($a["data"]);
	Disp::disp_table($a["data"]["qoutp"]);
	$a=User::signIn("mohitsaini@gmail.com","123");
	$a=handle_request(array("action"=>"getlogin"));
	print_r($a);
}


//$a=User::signUp(array("email"=>"admin@admin.com","password"=>"p","type"=>"a","name"=>"Admin"));
//$a=handle_request(array("email"=>"admin@admin.com","password"=>"p","action"=>"login"));

// $a=handle_request(array("action"=>"addcontent","title"=>"mohitSaini","data"=>"mohit","catg"=>8));
// print_r($a);


//$_SESSION['login']['type']='a';
//$a=handle_request(array("action"=>"addcontent","data"=>"mohitrtyuiol","catg"=>5,"title"=>"This is title of this content"));
$a=handle_request(array("action"=>"addform","formjson"=>"mohitrtyuiol","catg"=>5,"title"=>"This is title of this content"));
print_r($a);


closedb();
?>