<?php
class Main{
	function v(){
		$args =func_get_args();
		if(count($args) > 0) {
			Fun::runmain($args[0], array_slice($args, 1));
		} else{
			echo "Need more Arguments.";
		}
	}

	function index(){
		load_view("index.php");
	}

	function aboutus(){
		load_view("aboutus.php");
	}

	function contactus(){
		$pageinfo = array();
		$pageinfo["msg"] = "";
		if(ispost("contactus")) {
			$ho = handle_request($_POST, "contactus");
			$pageinfo["msg"] = rit("Thank you for contacting us.", $ho["ec"]>0 );
		}
		load_view("contactus.php", $pageinfo);
	}

	function login(){
		$pageinfo = emptyarr(a("loginmsg"));
		load_view("login.php", $pageinfo);
	}

	function signup() {
		$pageinfo = emptyarr(a("signupmsg"));
		load_view("signup.php", $pageinfo);
	}
}
?>