<?php

foreach($qresult as $i=>$row){
	$isleft=$row["isleft"];

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
if(false){
?>
										<div class="chat_message" style="">
											<img class="img-circle" src="assets/img/avatars/avatar_11.jpg" alt="">
											<div class="chat_message_body" style="background:#d9edf7; border-radius:10px; width:250px;">
												<p>Sunt quis qui iure quia beatae praesentium. </p>
												<p class="chat_message_date">Monday, 06:19:50<input type="checkbox" style=" float:right;"></p>
											</div>
										</div>
										<div class="clear" ></div>

<?php
}
}
?>