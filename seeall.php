<?php
include "includes/app.php";



?>
<html><head>

</head>
<body>

<?php 



$temp=Sql::getArray("show tables");
$need=array("users","review","cartype","city","cardata","car");


if(1){
	for($i=0;$i<count($temp);$i++){
	 	$table_name=$temp[$i]["Tables_in_".$db_data["db"]];
		if(true){
			?>
				<div>
					<a><?php echo $table_name; ?></a><br>
			<?php
			Disp::disp_table( Sqle::selectVal( $table_name , "*" , array() , 300) );
			echo "<br><br>";
			?>
				</div>
			<?php
		}
	}
}

closedb();
?>



</body> </html>
