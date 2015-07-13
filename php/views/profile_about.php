<br><br>
<div class="row">
	<div class="col s12">
		<h5 class="teal-text text-darken-1">Profile Details</h5>
	</div>
</div>
<div id="profile_info">

	<!-- Basic Details -->
	<div id="disp_profile_info" style="display:none;" >
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
							<?php echo Fun::timetodate($dob); ?>
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
	</div>
	<h6>
		<a onclick="hs_toggle(['edit_profile_info', 'disp_profile_info'], 700);ms.changesym(this);" style="cursor:pointer;">
		<span id="forgot_prefix_arrow"><i class="material-icons tiny">keyboard_arrow_up</i></span>&nbsp;Edit profile
		</a>
	</h6>
	<div id="edit_profile_info" style='display:non;' >


		<div class="row center">
			<form class="col s12 l10" method="post" onsubmit='form.req(this); return false;' autocomplete="off" >
				<div  style='' >
					<?php
						$formneeds = array("name" => "Name", "mobile" => "Mobile", "fbid" => "Facebook Id", "skypeid" => "SkypeId");
						$formkeys = array_keys($formneeds);
						$count = 0;
						for($i=0; $i< ceil(count($formneeds)/2); $i++) {
					?>
					<div class="row">
						<?php
							for($j=0; $j<2; $j++) {
								$key = $formkeys[$count];
						?>
						<div class="input-field col s12 l6">
							<input id="input_<?php echo $key; ?>" name="<?php echo $key; ?>" type="text" >
							<label for="input_<?php echo $key; ?>" ><?php echo $formneeds[$key]; ?></label>
						</div>
						<?php
								$count++;
							}
						?>
					</div>
					<?php
						}
					?>
					<div class="row">
						<div class="input-field col s12 l6">
							<input id="dob" name="dob" type="text"  >
							<label for="dob">Name</label>
						</div>
						<div class="input-field col s12 l6">
							<input id="mobile" name="mobile" type="text" data-condition='mobile' >
							<label for="mobile">Mobile</label>
						</div>
					</div>
					<div class="row">
					<div class="input-field col s12 l6">
						<input id="password" name="password" type="password"  data-condition="simple"  >
						<label for="password">Password</label>
					</div>
					<div class="input-field col s12 l6">
						<input id="confirm_password" name="cpassword" type="password" data-condition="password"  >
						<label for="confirm_password">Confirm Password</label>
					</div>
					</div>
					<div class="row">
					<div class="input-field col s12">
						<input id="phone" name="phone" type="text" data-condition="phone">
						<label for="phone">Mobile Number</label>
					</div>
					</div>
					<div class="row">
					<div class="input-field col s12">
						<button class="btn waves-effect waves-light" name="signup" type="submit" id="submit_button">
						Submit<i class="material-icons right">send</i>
						</button>
					</div>
					</div>
				</div>
			</form>
		</div>


	</div>


	<div class='row' >
		 <div class="col s12 l10 " style='' >
		<h6>
			<a onclick="hs_toggle(['forgot_pass_section'], 700);ms.changesym(this);" style="cursor:pointer;">
			<span id="forgot_prefix_arrow"><i class="material-icons tiny">keyboard_arrow_up</i></span>&nbsp;Change Password
			</a>
		</h6>
		</div>
		<form class="col s12 l10 " id="forgot_pass_section" onsubmit='if(form.valid.action1(this)){form.req(this);};return false;' data-action="changepassword" data-res='success.push("Changed");hs_toggle(["forgot_pass_section"]);' style='display:none;' >
		<div class="row">
			<div class="col s12">
			<p class="grey-text">Change your password, enter old password and then new password.</p>
			</div>
		</div>
		<div class="row">
			<?php
				$cplabels = array("Old Password", "New Password", "Confirm");
				$names = array("opassword", "npassword", "rpassword");
				for($i = 0; $i < 3; $i++) {
					$passid = rit("cpassword_".$i, $i!=1, "password");
					$datacond= rit("simple", $i!=2, "password");
			?>
				<div class="input-field col s12 l4">
				<input id="<?php echo $passid; ?>" name="<?php echo $names[$i]; ?>" type="password" class="validate" data-condition='<?php echo $datacond; ?>' >
				<label for="<?php echo $passid; ?>" ><?php echo $cplabels[$i]; ?></label>
				</div>
			<?php
				}
			?>
		</div>
		<div class="row">
			<div class="input-field col s12">
			<button class="btn waves-effect waves-light" type="submit"  >Change</button>
			</div>
		</div>
		</form>
	</div>


	<div class="row" style='display:none;' >
		<div class="col s11" >
			<ul class="collapsible popout" data-collapsible="accordion"  >
			<li style='margin-left:0px;' >
				<div class="collapsible-header"><i class="material-icons">filter_drama</i>First</div>
				<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
			</li>
			<li style='margin-left:0px;' >
				<div class="collapsible-header"><i class="material-icons">place</i>Second</div>
				<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
			</li>
			<li style='margin-left:0px;' >
				<div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
				<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
			</li>
			</ul>
<!--
		 <div class="col s12 l10 " style='' >
		<h6>
			<a onclick="hs_toggle(['forgot_pass_section', 'login_section'], 700);ms.changesym(this);" style="cursor:pointer;">
			<span id="forgot_prefix_arrow"><i class="material-icons tiny">keyboard_arrow_down</i></span>&nbsp;Change Password
			</a>
		</h6>
		</div>
		<form class="col s12 l10 offset-l1" id="forgot_pass_section" onsubmit='form.req(this);return false;' data-action="forgotpass" data-res='success.push("Password reseting link is sent. check your mail.");' style='display:none;' >
		<div class="row">
			<div class="col s12">
			<p class="grey-text">Enter your email to send verification link.</p>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
			<input id="email_forgot_pass" name="email" type="email" class="validate" required>
			<label for="email_forgot_pass">Email</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
			<button class="btn waves-effect waves-light" type="submit"  >Send</button>
			</div>
		</div>
		</form>
 -->
		</div>
	</div>


</div>
