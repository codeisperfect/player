<?php

include "includes/app.php";

if(server!='server'){
	sleep(1);
}

handle_request($_POST, null, true);

closedb();

?>