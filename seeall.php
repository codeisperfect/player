<?php
$config=array("session_start"=>false,"set_session_id"=>0);

include "includes/app.php";
?>
<html><head>

</head>
<body>

<?php 



$temp=Sql::getArray("show tables");
$need=array("users", "teachers", "booked", "subjects", "user_query");

// for($i=0;$i<count($temp);$i++){
// 	$table_name=$temp[$i]["Tables_in_".$db_data["db"]];
for($i=0;$i<count($temp);$i++){
	$table_name=$temp[$i]["Tables_in_".$db_data["db"]];
	if(in_array($table_name,$need)){
		?>
			<div>
				<a><?php echo $table_name; ?></a><br>
		<?php
//		Disp::disp_table(Sql::getArray("show columns from ".$table_name ));
		Disp::disp_table( Sqle::selectVal( $table_name , "*" , array() ) );
		echo "<br><br>";
		?>
			</div>
		<?php
	}
}



closedb();
?>


</body> </html>
