<?php
include "includes/app.php";
load_view("template/top.php");
?>

	
	<div style="margin:100px;" >
		<button data-action='mohit' data-bid='44' onclick="breq(this);" >Mohit</button>
		<div>
			<form onsubmit="return freq(this);" data-action='timepass' data-tid='111' >
				<input name="mohit" type="text" />
				<button type="submit" >Submit</button>
			</form>
		</div>
	</div>

<?php
load_view("template/bottom.php" );
closedb();
?>