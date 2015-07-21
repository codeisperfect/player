<div class="row" >
	<div class='s12 l3 col' >
		<div class='card ' >
			<?php
				load_view("input3", array("label" => "Search Players", "divclass" => "input-field p5", "inpattr" => array("class" => "searchgroup") ));
			?>
			<div id='msggrouplist' data-action='getgrouplist' >
				<?php
					handle_disp(array(),"getgrouplist");
				?>
			 </div>
		</div>
	</div>
	<div class='s12 l9 col' >
		<div class='card ' >
			<form onsubmit="if(form.valid.action(this)){form.sendreq1(this,$(this).find('button[type=submit]')[0]);$('#msgcontent').val('');};return false;" data-action='sendmsg' data-param='{"rid":$("#sendto").val()}' data-res='funcs.f1(obj);funcs.loadnew();div.reload($("#msggrouplist")[0] );' id="sendmsgform" >
				<div class="card white " style='margin-top:0px;' >
					<div class='card-content' style='padding-bottom:0px;' >
						<div class="row" >
							<div class='s12 l3 col' >
								<select class='browser-default myselect2' style='width:100%;' id="sendto" data-condition='simple' onchange="funcs.openchat(this.value);" >
										<?php disp_olist($cansendlist, array("selectalltext" => "Whom to send ?")); ?>
								</select>
							</div>
						</div>
					</div>
					<div class="card-content" style='padding-top:0px;padding-bottom:0px;' >
						<div class="row" >
							<div class='s12 l9 col' >
								<textarea class='materialize-textarea' id="msgcontent" name="msg" placeholder='Write Message & send.' data-condition='msg' onkeyup='checkValid(this, event);funcs.sendmsg(this,event);' ></textarea>
							</div>
							<div class='s12 l3 col' >
								<button class="btn waves-effect waves-light" type="submit" >Send <i class="material-icons right"  >send</i>&nbsp;&nbsp;&nbsp;</button><br><br>
								<button class="btn waves-effect waves-light" onclick="mohit.popup('sechedule');" type="button" >Send Later</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			<div style='padding:10px;' id="loadchat"  data-min="-1" data-max="0" data-minl="3" data-maxl="-1" data-action="personmsg" data-pid="" >
			</div>
			<div style='margin-bottom:10px;margin-left:20px;' >
				<img src='photo/icons/loading2.gif' id="loadmoreloadingimg" style='visibility:hidden;' /><br>
				<a onclick='funcs.loadolder(this);' style="cursor:pointer;display:none;" id="loadmorebutton" >View More</a>
			</div>


		</div>
	</div>
</div>


