						 	<?php
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
								<?php echo Fun::maxspace_v2($row["content"],50); ?>
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
							?>
