<?php
include "includes/app.php";
load_view("template/top.php");
?>

	
	<div style="margin:100px;" >

	<input id="test"  />

	</div>

<?php
load_view("template/bottom.php", array("needbody" => false));
?>


<script type="text/javascript">


$("#test").datetimepicker({
	format: 'yyyy-mm-dd hh:ii', 
	forceParse: true,
});

</script>

</body></html>

<?php
closedb();
?>