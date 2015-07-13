<?php
	load_view("Template/top.php");
?>
<div style='margin:30px;' >
	<button data-action="teacherTimeSlotOfDayPopUp" data-day=6 data-month=6 data-year=2015 data-tid=10 onclick="button.sendreq_v2_t4(this,null, function(d){$('#downloadeddata').html(d);});" >06 June 2015</button>
	<div id="downloadeddata" >
	</div>
	
	
</div>


<?php
//echo Funs::sendmsg("7503759053","Hey, This is msg to mohit #$%^&* :p ");
echo "Mohit Saini";
load_view("Template/bottom.php");
closedb();
?>
