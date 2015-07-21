<?php
load_view("template/top.php");
load_view("template/navbarnew.php");
$tabid=1;
?>
	<main class='' >
		<div class="container-fluid" style='width:100%' >
			<div class="card-panel" style='margin-top:0px;' >
				<div class="row">
					<div class="col s12">
						<ul class="tabs"  >
							<li class="tab col s2"><a id="profiletabs1" <?php pit('class="active"', $tabid==1); ?> href="#tab_profile">Messages</a></li>
							<li class="tab col s2"><a id="profiletabs5" <?php pit('class="active"', $tabid==5); ?>  href="#tab_topics">Calender</a></li>
						</ul>
					</div>
					<div id="tab_profile" class="col s12">
					<?php
						load_view("chat_msg.php", $inp);
					?>
					</div>
					<div id="tab_topics" class="col s12">
					<?php
//						load_view("chat_cal.php", $inp);
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
load_view("popup.php",array("name"=>"sechedule", "title" => "Sechedule this message.", "body" => "template/chat_sechedule_popup.php"));
load_view("template/bottom.php" );
?>