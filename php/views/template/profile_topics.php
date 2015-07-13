<script>
var topics=<?php echo json_encode($cst_tree); ?>;
</script>

<br><br>
<div class="row">
		<?php
		if(User::loginId()==$tid){
		?>
	<div class="col s12 l3">
		<div class="card-panel">
			<span class="grey-text text-darken-2">Please add your topics</span>
			<br>
			<div class="row">
				<form method="post" class="col s12" onsubmit='if(submitForm(this)){ form.req(this) };return false;' data-action="addtopics" data-res='div.reload($("#teacherdisptopics")[0]);' >
					<div class="row">
						<div class="input-field col s12">
							<select name='class' class="browser-default" onchange='topicssubtopic(this);' id="selectclass" data-condition='simple' style='' >
								<?php
									 disp_olist($class_olist,array('selectalltext'=>"Select Class"));
								?>
							</select>
						</div>
						<div class="input-field col s12">
							<select name='subject'  class="browser-default" id='selectsubject' onchange='topicssubtopic(this);' data-condition='simple' >
								<option value="" >Please select class first</option>
							</select>
						</div>
						<div class="input-field col s12">
							<select name='topic' class="browser-default" id='selecttopic' data-condition='simple' >
								<option value="" >Please select subject first</option>
							</select>
						</div>
						<div class="input-field col s12">
							<input id="duration" type="text" class="validate" name="timer" data-condition='simple' >
							<label for="duration">Class duration (in hrs)</label>
						</div>
						<div class="input-field col s12">
							<input id="fees" type="text" class="validate" name="price" data-condition='simple' value='<?php echo $minfees; ?>' >
							<label for="fees">Fees per hour (in &#8377;)</label>
						</div>
						<div class="input-field col s12">
							<button type="submit" class="btn waves-effect waves-light blue"><i class="material-icons left">add_circle_outline</i>Add</button>
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
	}
	?>
	<div class="col s12 l9">
		<div class="card-panel">
			<table class="striped responsive-table">
				<thead>
					<tr>
						<th data-field="class">Class</th>
						<th data-field="subject">Subject</th>
						<th data-field="topic">Topic</th>
						<th data-field="duration">Duration (hrs)</th>
						<th data-field="fees">Fees</th>
						<th data-field=""></th>
					</tr>
				</thead>
				<tbody data-tid="<?php echo $tid; ?>" data-action="disptopics" id="teacherdisptopics" >
					<?php
						load_view("Template/teacher_topiclist.php", array("mysubj" => $mysubj, "tid" => $tid));
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
