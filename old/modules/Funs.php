<?php
abstract class Funs{
	public static function headerinfo(){
		return array("title"=>"wwm","css"=>array("bootstrap-3.1.1-dist/css/bootstrap.css","bootstrap-3.1.1-dist/css/bootstrap-theme.css","css/main.css"));
	}
	public static function lsaction(){
		$login=array("ec"=>1,"loginmsg"=>"","signupmsg"=>"");
		if(ispost("login") || ispost("signup") ){
			$login["defopen"]=ispost("login")?"login":"signup";
			$ls=handle_request(Fun::setifunset($_POST,"action",$login["defopen"]));
			if($ls["ec"]>0){
				Fun::redirect("profile.php");
			}
			else{
				$login["ec"]=$ls["ec"];
				$login[$login["defopen"]."msg"]=errormsg($login["ec"]);
			}
		}
		return $login;
	}
	public static function headerddlist(){
		global $_ginfo;
		return getval(User::loginType(), $_ginfo["headerddlist"], array());
	}
	public static function cansend(){
		if(User::isloginas('u'))
			$query="select id from users where type='a'";
		else if(User::isloginas('a'))
			$query="select id from users where type='u'";
		else
			$query="select * from users";

		$query1="select users.name,users.id,users.profilepic from (".$query.")selectedpeople left join users on users.id=selectedpeople.id";
		return Sqle::getArray($query1);
	}
	public static function mygrouplist(){
		return 
	}
}
?>