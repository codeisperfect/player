<?php
	$func = function($i, $j) use($rows){
		if($j==3 && $i > 0 ) {
		?>
		<button class="btn waves-effect waves-light" type="button" data-id='<?php echo $rows[$i-1]["id"]; ?>' onclick='breq(this, "dsechedule");' data-reloaddiv='#dispsechedule' >Delete</button>
		<?php
			return true;
		}
		return null;
	};
	load_view("template/table.php", mius($inp, array("keymap" => array("msg" => "Message", "stime" => "Secheduled for", "whomname" => "Whom"), "onlykey" => "allm", "width" => 4, "func" => $func)));
?>