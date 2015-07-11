<?php
	define("server",'laptop');//server = laptop,server,poorvi

	if(server=="poorvi"){
		define('HOST','http://poorvi.cse.iitd.ac.in/~cs1120233/player/',false); // false mean that HOST cannot be used as hOsT
		define('ROOT', '/home/btech/cs1120233/private_html/player/', false);
		define('CDN', HOST.'photo/', false);
		$db_data = array() ;
		$db_data['host'] = 'poorvi.cse' ;
		$db_data['user'] = 'mohit' ;
		$db_data['pass'] = 'mohitsaini' ; 
		$db_data['db'] = 'mohit' ;
	}
	else if(server=="laptop"){
		define('HOST','http://localhost/player/',false); // false mean that HOST cannot be used as hOsT
		define('ROOT', '/var/www/player/', false);
		define('CDN', HOST.'photo/', false);
		if(false){
			$db_data = array() ;
			$db_data['host'] = '10.237.20.8' ;
			$db_data['user'] = 'mohit' ;
			$db_data['pass'] = 'mohitsaini' ; 
			$db_data['db'] = 'mohit' ;
		}
		else{
			$db_data = array() ;
			$db_data['host'] = 'localhost' ;
			$db_data['user'] = 'root' ;
			$db_data['pass'] = 'mohitsaini' ; 
			$db_data['db'] = 'player' ;
			$info=array();
		}
	}
	else if(server=="server"){
		define('HOST','http://54.149.49.212/player/',false); // false mean that HOST cannot be used as hOsT
		define('ROOT', '/var/www/html/player/', false);
		define('CDN', HOST.'photo/', false);
		$db_data = array() ;
		$db_data['host'] = 'localhost' ;
		$db_data['user'] = 'root' ;
		$db_data['pass'] = 'mohit' ;
		$db_data['db'] = 'player' ;
	}
	else if(server=="freeserver"){
		define('HOST','http://knowmiles.hostingsiteforfree.com/knowmiles/',false); // false mean that HOST cannot be used as hOsT
		define('ROOT', '/home/u274166964/public_html/knowmiles/', false);
		define('CDN', HOST.'photo/', false);
		$db_data = array() ;
		$db_data['host'] = 'mysql.1freehosting.com' ;
		$db_data['user'] = 'u274166964_gsk' ;
		$db_data['pass'] = 'KnowMiles696' ;
		$db_data['db'] = 'u274166964_test1' ;
	}

	define('BASE',HOST,false); // false mean that HOST cannot be used as hOsT

?>