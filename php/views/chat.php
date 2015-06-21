<?php
load_view("template/topnew.php",array("addcss"=>array(),"title"=>"Chatting","closehead"=>false));
?>
	<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<link rel="shortcut icon" href="favicon.ico" />
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
	<link href="assets/icons/font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen" />
	<link href="assets/icons/ionicons/css/ionicons.min.css" rel="stylesheet" media="screen" />
	<link rel="stylesheet" href="assets/icons/flags/flags.css" />
	<link rel="stylesheet" href="assets/lib/select2/select2.css" />
	<link href="assets/css/style.css" rel="stylesheet" media="screen" />
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400&amp;subset=latin-ext,latin" rel="stylesheet" type="text/css" />
	<script src="assets/lib/moment-js/moment.min.js">
	</script>
 </head>
 <body>
<?php
load_view("template/header.php");
?>
	<div id="main_wrapper" style="margin-left:200px; margin-right:100px;">
	 <div class="page_content">
		<div class="container-fluid">
		 <div class="row">
			<div class="col-lg-12">
			 <div class="page-header">
				<div class="panel panel-default">
				 <div class="row">
					<div class="col-sm-4">
					 <p>
						<input type="text" class="form-control searchgroup " placeholder="Search" />
					 </p>
					 <div class="pre-scrollable">
					 	<div style='display:none;' ><?php echo Fun::smilymsg("No Result Found :( "); ?></div>
						<table class="table table-hover">
						 <tbody id='msggrouplist' data-action='getgrouplist' >
						 	<?php
						 		handle_disp(array(),"getgrouplist");
//						 	load_view("template/msggroup.php",array('msggroup'=>$msggroup));
						 	?>
						 </tbody>
						</table>
					 </div>
					</div>
					<div class="col-sm-8 container-fluid chat_app" style="background:#CCC; margin-bottom:-10px;">
					<?php
					if(User::isloginas("a")){
						load_view("template/savemsgbar.php");
					}
					?>
					<form onsubmit="if(form.valid.action(this)){form.sendreq1(this,$(this).find('button[type=submit]')[0]);$('#msgcontent').val('');};return false;" data-action='sendmsg' data-param='{"rid":funcs.sendtoval()}' data-res='funcs.f1(obj);' id="sendmsgform" >
					 <div class="col-lg-12">
						<div class="panel panel-default" style="background:#CCC;">

						 <div class="panel_body_a">
						 	<div>
								<select id="sendto" class="form-control" multiple="" data-condition='simple' data-unfilled='Sender Name' onchange='checkValid(this, event);' >
									<?php disp_olist($cansendlist); ?>
								</select>
							</div>
							<div id="mohit" ></div>
							<div class="chat_messages">
							</div>
						 </div>


						 <div class="panel-footer">
							<div class="chat_submit">
							 <div class="input-group">
							 	<div>
								 <textarea id='msgcontent' class="form-control autoinc mohit" rows="2" style="resize:none;width:98%;" name="msg" onkeyup='checkValid(this, event);funcs.sendmsg(this,event);' data-condition='msg' data-unfilled='Message' ></textarea>
								</div>
								<span class="input-group-btn">
								 <button type="submit" class="btn btn-default"  >
									Send
								 </button>
								 <span class="glyphicon glyphicon-paperclip" aria-hidden="true">
								 </span>
								</span>
							 </div>
							</div>
						 </div>
						</div>
					 </div>
					</form>


					</div>
				 </div>
				</div>
			 </div>
			</div>
		 </div>
		</div>
	 </div>
	</div>
	<!-- side navigation -->
	<nav id="side_nav">
	 <ul>
		<li>
		 <a href="user_profile.html">
			<span class="ion-search">
			</span>
			<span class="nav_title">
			 Explore
			</span>
		 </a>
		</li>
		<li>
		 <a href="user_profile.html">
			<span class="ion-android-social-user">
			</span>
			<span class="nav_title">
			 Profile
			</span>
		 </a>
		</li>
		<li>
		 <a href="calendar.html">
			<span class="ion-calendar">
			</span>
			<span class="nav_title">
			 Calendar
			</span>
		 </a>
		</li>
		<li>
		 <a href="#">
			<span class="ion-clipboard">
			</span>
			<span class="nav_title">
			 Track
			</span>
		 </a>
		 <div class="sub_panel">
			<div class="side_inner">
			 <h4 class="panel_heading panel_heading_first">
				Logs
			 </h4>
			 <ul>
				<li>
				 <a href="daily-log.html">
					Daily Log
				 </a>
				</li>
				<li>
				 <a href="weekly-review-from.html">
					Weekly Review
				 </a>
				</li>
				<li>
				 <a href="misc-form.html">
					Misc. Forms
				 </a>
				</li>
				<li>
				 <a href="graph.html">
					Graphs
				 </a>
				</li>
			 </ul>
			 <h4 class="panel_heading">
				Reference
			 </h4>
			 <ul>
				<li class="add_label">
				 <a href="goal.html">
					Goals
				 </a>
				</li>
				<li class="add_label">
				 <a href="exercise.html">
					Exercises
				 </a>
				</li>
				<li class="add_label">
				 <a href="routines.html">
					Routines
				 </a>
				</li>
				<li class="add_label">
				 <a href="training-history.html">
					History
				 </a>
				</li>
			 </ul>
			</div>
		 </div>
		</li>
		<li>
		 <a href="#">
			<span class="ion-game-controller-a">
			</span>
			<span class="nav_title">
			 Train
			</span>
		 </a>
		 <div class="sub_panel">
			<div class="side_inner">
			 <h4 class="panel_heading">
				Pages
			 </h4>
			 <ul>
				<li>
				 <a href="#">
					N Bach
				 </a>
				</li>
				<li>
				 <a href="#">
					Intractive Metro
				 </a>
				</li>
				<li>
				 <a href="#">
					Breathing Practice
				 </a>
				</li>
				<li>
				 <a href="#">
					Meditation
				 </a>
				</li>
				<li>
				 <a href="#">
					Sound Track
				 </a>
				</li>
			 </ul>
			</div>
		 </div>
		</li>
		<li>
		 <a href="#">
			<span class="ion-android-friends">
			</span>
			<span class="nav_title">
			 Consult
			</span>
		 </a>
		 <div class="sub_panel">
			<div class="side_inner">
			 <h4 class="panel_heading">
				Pages
			 </h4>
			 <ul>
				<li>
				 <a href="chat.html">
					Instant Massenger
				 </a>
				</li>
				<li>
				 <a href="post.html">
					Post A Question
				 </a>
				</li>
				<li>
				 <a href="challenges.html">
					Thinking Review Forms
				 </a>
				</li>
			 </ul>
			</div>
		 </div>
		</li>
		<li>
		 <a href="chat.html">
			<span class="ion-chatbubble">
			</span>
			<span class="nav_title">
			 Chat
			</span>
		 </a>
		</li>
	 </ul>
	</nav>
	<script src="assets/js/jquery.min.js">
	</script>
	<script src="assets/js/jquery.easing.1.3.min.js">
	</script>
	<script src="assets/bootstrap/js/bootstrap.min.js">
	</script>
	<script src="assets/js/tinynav.js">
	</script>
	<script src="assets/lib/perfect-scrollbar/min/perfect-scrollbar-0.4.8.with-mousewheel.min.js">
	</script>
	<script src="assets/lib/select2/select2.min.js">
	</script>
	<script src="assets/js/tisa_common.js">
	</script>
<script type="text/javascript">
	$(document).ready(function(){

	});

</script>

<?php
load_view("template/bottomnew.php");
?>
