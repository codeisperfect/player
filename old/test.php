<?php
include "includes/app.php";

load_view("template/topnew.php",array("addcss"=>array("assets/css/login.css"),"title"=>"Login", "closehead"=>false));



?>

  <link href="assets/icons/font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen" />
  <link href="assets/icons/ionicons/css/ionicons.min.css" rel="stylesheet" media="screen" />
  <link rel="stylesheet" href="assets/icons/flags/flags.css" />
  <link rel="stylesheet" href="assets/lib/select2/select2.css" />
  <link href="assets/lib/bootstrap-switch/build/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" media="screen" />
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400&amp;subset=latin-ext,latin" rel="stylesheet" type="text/css" />
  <script src="assets/lib/moment-js/moment.min.js">
  </script>
</head>
<body>
<?php


//echo gtable("mymsggroupdisp");

print_r(gets("login"));


//sets("login",array('id'=>1, 'type'=>'a'));


?>


<input type="text" name="lang" id="user_languages" class="form-control" value="" />

	<select id="mohit" class="form-control" multiple="" >
		<option>Mohit1</option>
		<option>Mohit2</option>
		<option>Mohit3</option>
	</select>




  <script src="assets/js/jquery.min.js">
  </script>
  <script src="assets/js/jquery.easing.1.3.min.js">
  </script>
  <script src="assets/bootstrap/js/bootstrap.min.js">
  </script>
  <script src="assets/js/tinynav.js">
  </script>
  <script src="assets/lib/perfect-scrollbar/min/perfect-scrollbar-0.4.8.with-mousewheel.min.js">
  </script>
  <script src="assets/js/tisa_common.js">
  </script>
  <script src="assets/lib/select2/select2.min.js">
  </script>
  <script src="assets/lib/bootstrap-switch/build/js/bootstrap-switch.min.js">
  </script>
  <script src="assets/js/apps/tisa_user_profile.js">
  </script>

<script type="text/javascript">
	
	$('#mohit').select2();

		if ($('#user_languages').length) {
			$('#user_languages').select2({
				placeholder: "Select language...",
				tags:["English", "Hindi"],
				tokenSeparators: [","]
			});
		}



</script>


<?php

load_view("template/bottomnew.php");


if(0){
	$a=handle_request(array("email"=>"mohitsaini@gmail.com","password"=>"123","action"=>"login"));
	$a=handle_request(array("action"=>"sendmsg","msg"=>"Hey Mohit,111","rid"=>"3","type"=>'m',"formid"=>0));
	$a=handle_request(array("action"=>"loadmsg","uid"=>"3","minid"=>'0',"maxid"=>0,"is_load_newer"=>1,"num_msg"=>10));
	print_r($a["data"]);
	Disp::disp_table($a["data"]["qoutp"]);
	$a=User::signIn("mohitsaini@gmail.com","123");
	$a=handle_request(array("action"=>"getlogin"));
	print_r($a);
	//$a=User::signUp(array("email"=>"admin@admin.com","password"=>"p","type"=>"a","name"=>"Admin"));
	//$a=handle_request(array("email"=>"admin@admin.com","password"=>"p","action"=>"login"));

	// $a=handle_request(array("action"=>"addcontent","title"=>"mohitSaini","data"=>"mohit","catg"=>8));
	// print_r($a);


	//$_SESSION['login']['type']='a';
	//$a=handle_request(array("action"=>"addcontent","data"=>"mohitrtyuiol","catg"=>5,"title"=>"This is title of this content"));
	$a=handle_request(array("action"=>"addform","formjson"=>"mohitrtyuiol","catg"=>5,"title"=>"This is title of this content"));
	print_r($a);



}



closedb();
?>