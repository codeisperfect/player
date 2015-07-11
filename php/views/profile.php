<?php
load_view("template/top.php");
load_view("template/navbarnew.php");
$tabid=1;
?>
	<main>
		<div class="container">
		<br>
			<div class="card-panel">
			<br>
				<div class="row">
					<div class="col s12 l4 offset-l1 center">
						<img class="circle responsive-img" height="200" width="200" src="<?php echo $profilepic; ?>" >
						<br>
						<!-- Change Profile Picture -->
						<?php
							if($isme) {
						?>
						 <form method="post" enctype="multipart/form-data"> 
							<a onclick='uploadfile(this,"profilepic");' style="cursor:pointer;" >Change Profile Picture</a>
						 </form>
					 <?php
						}
					 ?>



					</div>
					<div class="col s12 l7" >
						<div class="row">
							<div class="col s12">
								<h5 class="green-text left"><?php echo $name; ?></h5>
							</div>
						</div>
						<div class="row" style="" >
							<form class="col s12" onsubmit='form.req(this);return false;' data-action='saveuserdetails' data-res='hideshowdown("bioedit", "biodisp");$("#biodisptext").html(smilymsg($("#biography").val()));' >
								<div id='biodisp' style='' >
									<div class="row">
										<div class="col s12 l7" data-onhover='hovercss(this, {"display":""}));' >
											<span id='biodisptext' ><?php echo Fun::smilymsg($sign); ?></span>
											<?php
												if($isme) {
											?>
											<a onclick='hideshowdown("biodisp", "bioedit");' class='' >Edit</a>
											<?php
												}
											?>
										</div>
									</div>
								</div>
								<div style='display:none;' id='bioedit' >
									<div class="row"  >
										<div class="input-field col s12 l7">
											<?php hidinp("uid", $id); ?>
											<textarea name="sign" id="biography" class="materialize-textarea" placeholder="Write a small description about yourself." ><?php echo convchars($sign); ?></textarea>
											<label for="biography">Bio</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<button class="btn waves-effect waves-light blue" type="submit"><i class="material-icons left" data-waittext='Saving..' ></i>Save</button>
											<button onclick='hs_toggle(["bioedit", "biodisp"]);' class="btn waves-effect waves-light blue" type="button"><i class="material-icons left" data-waittext='Saving..' ></i>Cancel</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="card-panel">
				<div class="row">
					<div class="col s12">
						<ul class="tabs"  >
							<li class="tab col s2"><a id="profiletabs1" <?php pit('class="active"', $tabid==1); ?> href="#tab_profile">Profile</a></li>
							<li class="tab col s2"><a id="profiletabs5" <?php pit('class="active"', $tabid==5); ?>  href="#tab_topics">Topics</a></li>
							<li class="tab col s2"><a id="profiletabs2" <?php pit('class="active"', $tabid==2); ?> href="#tab_calendar">Calendar</a></li>
							<li class="tab col s2"><a id="profiletabs4" <?php pit('class="active"', $tabid==4); ?> href="#tab_reviews">Reviews</a></li>
							<li class="tab col s2" style="<?php pit("visibility:hidden", $tid != User::loginId()); ?>" ><a id="profiletabs3" <?php pit('class="active"', $tabid==3); ?> href="#tab_classes">Classes</a></li>
							<li class="tab col s2" style="<?php pit("visibility:hidden", $tid != User::loginId()); ?>" ><a id="profiletabs5" <?php pit('class="active"', $tabid==5); ?> href="#tab_account">Account</a></li>
						</ul>
					</div>
					<div id="tab_profile" class="col s12 offset-l1">
					<?php
						load_view("profile_about.php", $inp);
					?>
					</div>
					<div id="tab_calendar" class="col s12">
					<?php
//						load_view("Template/profile_calendar.php",Fun::mergeifunset($calinfo,array("tid"=>$tid)) );
					?>
					</div>
					<div id="tab_classes" class="col s12">
					<?php
//						load_view("Template/profile_classes.php", $myclasses);
					?>
					</div>
					<div id="tab_reviews" class="col s12">
					<?php
//						load_view("Template/profile_reviews.php", Fun::mergeifunset($inp, array("reviewname" => "studentname")));
					?>
					</div>
					<div id="tab_topics" class="col s12">
					<?php
//						load_view("Template/profile_topics.php",Fun::mergeifunset($topicinfo,array("tid"=>$tid,'minfees'=>$jsonArray['minfees'])));
					?>
					</div>
					<div id="tab_account" class="col s12">
					<?php
//						load_view("Template/moneyaccount.php", Fun::mergeifunset($inp, array("tid"=>$tid)));
					?>
					</div>
				</div>
			</div>
		</div>
	</main>
<?php
?>

<?php
load_view("template/footer.php");
//load_view("popup.php",array("name"=>"timeslot", "title" => "Please select your free slots"));
load_view("template/bottom.php" );
?>