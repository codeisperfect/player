<?php
foreach($msggroup as $i => $row) {
?>
<div>
	<div style='padding:5px;padding-right:0px;' class='msggroup' >
		<div class='row' style='margin-bottom:0px;' >
			<div class='col s3 m3 l3' >
				<img src='photo/mohitsmall.jpg' class='circle img-responsive' />
			</div>
			<div class='col s9 m9 l9' >
				<?php echo convchars($row["name"]); pit("(".$row["num_unread"].")", $row["num_unread"]>0); ?> : <span class="grey-text text-darken-2"><?php echo Fun::smilymsg(Fun::limitlen(30, $row["content"])); ?></span>
				<br>
				<span class="grey-text text-darken-1" style='font-size:11px;' ><?php echo Fun::timepassed_t3(time() - $row["time"]); ?></span>
			</div>
		</div>
	</div>
	<div class='divider' ></div>
</div>
<?php
}
?>

						 	<?php
						 	if(false){
						 	foreach($msggroup as $i=>$row){
						 	?>
							<tr style="width:100%;<?php if(!$row["selfseen"]) echo "background-color:#D1D1D1;"; ?>cursor:pointer;" data-name="<?php echo htmlspecialchars($row["name"]); ?>" onclick='funcs.openchat(<?php echo $row["personid"]; ?>);' >
							 <th>
								<img class="img-circle" src="<?php echo $row["profilepic"]; ?>" alt="<?php echo $row["name"]; ?>" width="60" />
							 </th>
							 <td>
								<strong>
								 <?php echo htmlspecialchars($row["name"]); ?>
								</strong>
								<br />
								<?php echo Fun::smilymsg(Fun::limitlen($row["content"],50)); ?>
							 </td>
							 <td>
								<?php echo Fun::timepassed_t2(time()-$row["time"]);
								if($row["num_unread"]>0){
								?>
								<br />
								<div align="center" style="background-color:#06F; border-radius:20px; width:20px; height:20px; color:#FFF;">
								 <?php echo $row["num_unread"]; ?>
								</div>
								<?php
								}
								?>
							 </td>
							</tr>
							<?php
							}
						}
							?>
