<?php
$row= null;
for($i=0; $i<3; $i++) {
	$isleft = ($i%2==0);
?>
<?php
}
?>



<?php

foreach($qresult as $i=>$row){
	$isleft=$row["isleft"];
?>
<div class="row" style='margin-top:0px;margin-bottom:0px;' >
	<div class="col s12 <?php pit("l10 offset-l2", !$isleft, "l10"); ?> " style='' >
		<div class="row " style='margin-top:0px;margin-bottom:0px;' >
		<?php
			s("msvar", $row);
			$pic_content = a( function(){
				?>
			<div class='col s3  l1 vcenter'  >
				<img src='<?php echo "photo/mohitsmall.jpg"; ?>' class='circle img-responsive'   />
			</div>
				<?php
			}, function(){
				?>
			<div class='col s9 l11' >
				<div class="card white card-content" style='padding:5px;' >
<!-- 					<?php echo convchars($row["name"]); pit("(".$row["num_unread"].")", $row["num_unread"]>0); ?> : <span class="grey-text text-darken-2"><?php echo Fun::smilymsg(Fun::limitlen(20, $row["content"])); ?></span>
 -->
					<br>

					<span class="grey-text text-darken-1" style='font-size:11px;' >11 min. Ago</span>
<!-- 					<span class="grey-text text-darken-1" style='font-size:11px;' ><?php echo Fun::timepassed_t3(time() - $row["time"]); ?></span>
 -->
				</div>
			</div>
				<?php
			} );
			$pic_content[1-$isleft]();
			$pic_content[0+$isleft]();
		?>
		</div>
	</div>
</div>

<?php
		if(false){
?>

										<div class="chat_message <?php pit("ch_right", !$isleft); ?>" style='<?php pit("margin-top:10px;", $isleft, "margin-top:30px;"); ?>' >
											<img class="img-circle" src="assets/img/avatars/avatar_12.jpg" alt="">
											<div class="chat_message_body" style="<?php pit("width:400px; border-radius:10px; margin-bottom:40px; float:right;", !$isleft);  pit("background:#d9edf7; border-radius:10px; width: 400px;", $isleft);  ?>">
												<p><?php echo Fun::smilymsg($row["content"]); ?></p>
												<p class="chat_message_date"><?php echo Fun::timepassed_t2(time()-$row["time"]); ?>
												<?php
													if(false){
												?>
												<input type="checkbox" style=" float:right;"></p>
												<?php
													}
												?>
											</div>
										</div>
										<div class="clear" ></div>
<?php
	}
}
?>