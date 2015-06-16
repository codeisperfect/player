<?php
abstract class Funs{
	public static function headerinfo(){
		return array("title"=>"wwm","css"=>array("bootstrap-3.1.1-dist/css/bootstrap.css","bootstrap-3.1.1-dist/css/bootstrap-theme.css","css/main.css"));
	}
	public static function lsaction(){
		$login=array("ec"=>1);
		if(ispost("login") || ispost("signup") ){
			$login["defopen"]=ispost("login")?"login":"signup";
			$ls=handle_request(Fun::setifunset($_POST,"action",$login["defopen"]));
			if($login["ec"]>0){
				Fun::redirect("profile.php");
			}
		}
		return $login;
	}
}
?>