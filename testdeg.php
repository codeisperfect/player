<?php
include "includes/app.php";
load_view("template/top.php");
?>

<input id="test" type="text" />


<script type="text/javascript">

var dateToday=new Date();
$("#test").datetimepicker({
	format: 'yyyy-mm-dd hh:ii', 
	forceParse: true,
	minDate:dateToday,
 onSelect: function(selectedDate) {
		var option = this.id == "from" ? "minDate" : "maxDate",
			instance = $(this).data("datepicker"),
			 date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
	 dates.not(this).datepicker("option", option, date);
}});

</script>

<?php

load_view("template/bottom.php");
closedb();
?>