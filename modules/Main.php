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
}
?>