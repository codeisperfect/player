		<div class="row">
			<div class="col s12">
				<h6 class="teal-text text-darken-1"><i class="material-icons left">perm_identity</i>Basic</h6>
			</div>
		</div>
		<div class="row">
			<div class="col s12 l6">
				<div class="row">
					<div class="col s12">
						Name :
						<span class="grey-text text-darken-1">
							<?php echo Fun::smilymsg($name); ?>
						</span>
					</div>
				</div>
				<?php
					if($ismea) {
				?>
				<div class="row">
					<div class="col s12">
						Email :
						<span class="grey-text text-darken-1">
							<?php echo $email; ?>
						</span>
					</div>
				</div>
				<?php
					}
				?>
				<div class="row">
					<div class="col s12">
						Birthday :
						<span class="grey-text text-darken-1">
							<?php echo $dob; ?>
						</span>
					</div>
				</div>
				<?php
					if($ismea) {
				?>
				<div class="row">
					<div class="col s12">
						Skype ID :
						<span class="grey-text text-darken-1">
							<?php echo Fun::smilymsg($skypeid); ?>
						</span>
					</div>
				</div>
				<?php
					}
				?>

			</div>
			<div class="col s12 l6">
				<div class="row">
					<div class="col s12">
						Address :<br>
						<span class="grey-text text-darken-1">
							<?php echo Fun::smilymsg($address); ?>
						</span>
					</div>
				</div>
				<?php
					if($ismea) {
				?>
				<div class="row">
					<div class="col s12">
						Mobile Number :
						<span class="grey-text text-darken-1">
							<?php echo Fun::smilymsg($phone); ?>
						</span>
					</div>
				</div>
				<?php
					}
				?>
				<?php
					if($ismea) {
				?>
				<div class="row">
					<div class="col s12">
						Facebook ID :
						<span class="grey-text text-darken-1">
							<?php echo Fun::smilymsg($fbid); ?>
						</span>
					</div>
				</div>
				<?php
					}
				?>
			</div>
		</div>

		<!-- Teaching Details -->
		<?php
		if(false) {
		?>
		<div class="row">
			<div class="col s12">
				<h6 class="teal-text text-darken-1"><i class="material-icons left">subject</i>Teaching Details</h6>
			</div>
		</div>
		<div class="row">
			<div class="col s12 l3">
				Subjects :
				<span class="grey-text text-darken-1">
					<ul>
						<?php
							foreach ($subArray as $value) {
								echo '<li>'.$value.'</li>';
							}
						?>
					</ul>
				</span>
			</div>
			<div class="col s12 l2">
				Grades :
				<span class="grey-text text-darken-1">
					<ul>
						<?php
							foreach ($gradeArray as $value) {
								echo '<li>'.$value.'</li>';
							}
					 ?>
					</ul>
				</span>
			</div>
			<div class="col s12 l4">
				Languages :
				<span class="grey-text text-darken-1">
					<ul>
						<?php
							foreach ($langArray as $value) {
								echo '<li>'.$value.'</li>';
							}
					 ?>
					</ul>
				</span>
			</div>
		</div>
		<?php
			}
		?>
		<!-- Education and Qualification Details -->
		<div class="row">
			<div class="col s12">
				<h6 class="teal-text text-darken-1"><i class="material-icons left">school</i>Playing Qualifications</h6>
			</div>
		</div>
