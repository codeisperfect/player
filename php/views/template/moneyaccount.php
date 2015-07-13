<br><br>
<div class="row">
	<div class="col s12 l10 offset-l1">
		<h5 class="teal-text text-darken-1">Your Account Details</h5>
	</div>
</div>

<div class="row">
	<div class="col s12 l10 offset-l1">
		<div class="card-panel blue-grey">
			<h5 class="white-text">&#8377;&nbsp;<?php echo $mymoney; ?></h5>
			<h6 class="white-text">Current Balance</h6>
		</div>
	</div>
</div>

<div class="row">
	<div class="col s12 l10 offset-l1">
		<h5 class="teal-text text-darken-1">Transaction History</h5>
	</div>
</div>

<div class="row">
	<div class="col s12 l10 offset-l1">
		<table class="hoverable">
			<thead>
				<tr>
					<th>Money Transferred</th>
					<th>Comment</th>
					<th>Times</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach($moneyaccount as $i => $row) {
				?>
				<tr>
					<td><div class="<?php pit("red-text", $row["amount"]<0, "green-text"); ?>"><i class="<?php pit("mdi-content-remove", $row["amount"]<0, "mdi-content-add"); ?>"></i> &#8377; <?php echo abs($row["amount"]); ?></div></td>
					<td><?php echo convchars($row["content"]); ?></td>
					<td class="tooltipped" data-position="right" data-delay="50" data-tooltip="<?php echo Fun::timetostr( $row["time"] ); ?>">
						<span class="grey-text"><?php echo Fun::timepassed( time()-$row["time"] ); ?></span>
					</td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>
