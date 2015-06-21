<?php
load_view("template/topnew.php",array("addcss"=>array(),"title"=>"User Profile","closehead"=>false));
?>
  <link href="assets/icons/font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen" />
  <link href="assets/icons/ionicons/css/ionicons.min.css" rel="stylesheet" media="screen" />
  <link rel="stylesheet" href="assets/icons/flags/flags.css" />
  <link rel="stylesheet" href="assets/lib/select2/select2.css" />
  <link href="assets/lib/bootstrap-switch/build/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" media="screen" />
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400&amp;subset=latin-ext,latin" rel="stylesheet" type="text/css" />
  <script src="assets/lib/moment-js/moment.min.js">
  </script>
 </head>
 <body>
<?php
load_view("template/header.php");
?>
  <div id="main_wrapper">
   <div class="page_bar clearfix" style="background-color:#FDC589;">
    <div class="row">
     <div class="col-md-12">
      <div class="media">
       <img class="img-thumbnail pull-left" src="assets/img/avatars/avatar_3.jpg" alt="" />
       <div class="media-body">
        <h1 class="page_title">
         <?php echo $uinfo["smily_name"]; ?>
        </h1>
        <p>
         Change Photo
        </p>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class="page_content">
    <div class="container-fluid">
     <div class="row">
      <div class="col-md-12">
       <div class="panel panel-default">
        <div class="panel-body">
         <div class="user_profile">
          <div class="form-horizontal">
           <div class="tabbable tabs-right">
            <ul class="nav nav-tabs">
             <li class="active">
              <a data-toggle="tab" href="#profile_general_pane" class="tab-default">
               General Info
              </a>
             </li>
             <li>
              <a data-toggle="tab" href="#profile_contact_pane" class="tab-default">
               Contact Info
              </a>
             </li>
             <li>
              <a data-toggle="tab" href="#profile_account_pane" class="tab-default">
               My Account
              </a>
             </li>
            </ul>
            <div class="tab-content">
             <div id="profile_general_pane" class="tab-pane active">
              <form onsubmit='if(form.valid.action(this)){form.sendreq1(this,$(this).find("button[type=submit]")[0]);};return false;' method='post' data-action='saveuserdetails' data-res="success.push('All Details Saved ! ');" >
                <?php
                  hidinp("uid",$uid);
                  load_view("template/input1.php",array('label'=>"Name","name"=>"name",'inpattr'=>array("value"=>$uinfo["smily_name"])));
                  load_view("template/input1.php",array('label'=>"Email","name"=>"email","inpattr"=>array("value"=>$uinfo["smily_email"])));
                ?>
                <div class="form-group">
                 <label  class="col-md-2 control-label">
                  Signature
                 </label>
                 <div class="col-md-10">
                  <textarea name="sign" id="user_signature" cols="30" rows="4" class="form-control"><?php echo $uinfo["smily_sign"]; ?></textarea>
                 </div>
                </div>

                <div class="form-group">
                 <label for="user_languages" class="col-md-2 control-label">
                  Languages
                 </label>
                 <div class="col-md-10">
                  <input type="text" name="lang" id="user_languages" class="form-control" value="<?php echo $uinfo["smily_lang"]; ?>" />
                 </div>
                </div>
                <div class="form-group">
                 <label for="user_languages" class="col-md-2 control-label">
                  Newsletter
                 </label>
                 <div class="col-md-10">
                  <input type="checkbox" class="bs_switch" data-on-color="success" data-on-text="Yes" data-off-text="No" name="news" <?php echo $uinfo["news"]=='t'?"checked":"" ?> />
                 </div>
                </div>
                <?php
                load_view("profile_save_button");
                ?>
              </form>
             </div>
             <div id="profile_contact_pane" class="tab-pane">
              <form onsubmit='if(form.valid.action(this)){form.sendreq1(this,$(this).find("button[type=submit]")[0]);};return false;' method='post' data-action='saveuserdetails' data-res="success.push('All Details Saved ! ');" >
                <div class="form-group">
                 <div class="col-md-12">
                  <div class="heading_b">
                   Address
                  </div>
                 </div>
                </div>
                <?php
                hidinp("uid",$uid);
                if(false){
                  load_view("template/input1.php",array('label'=>"City","name"=>"city"));
                  load_view("template/input1.php",array('label'=>"Country","name"=>"country"));
                  load_view("template/input1.php",array('label'=>"Street","name"=>"street"));
                }
                 load_view("template/input1.php",array('label'=>"Full Address","name"=>"address",'inpattr'=>array("value"=>$uinfo["smily_address"])));
                ?>
                <div class="form-group">
                 <div class="col-md-12">
                  <div class="heading_b">
                   Social
                  </div>
                 </div>
                </div>
                <?php
                  load_view("template/input1.php",array('label'=>"Facebook ID","name"=>"fbid","dc"=>"idel",'inpattr'=>array("value"=>$uinfo["smily_fbid"])));
                  load_view("template/input1.php",array('label'=>"Skype ID","name"=>"skypeid","dc"=>"idel",'inpattr'=>array('value'=>$uinfo["smily_skypeid"])));
                  load_view("profile_save_button");
                ?>
              </form>
             </div>
             <div id="profile_account_pane" class="tab-pane">
              <form onsubmit='if(form.valid.action(this)){form.sendreq1(this,$(this).find("button[type=submit]")[0]);};return false;' data-action='changepassword' data-res='success.push("Password Changed Successfully");' >
                <div class="form-group">
                 <div class="col-md-12">
                  <div class="heading_b">
                   Change password
                  </div>
                 </div>
                </div>
                <?php
                  load_view("template/input1.php",array('label'=>"Old password","name"=>"opassword","type"=>"password",'inpattr'=>array("data-unfilled"=>"Old password")));
                  load_view("template/input1.php",array('label'=>"New password","name"=>"npassword","inpattr"=>array("id"=>"password","data-unfilled"=>"New password"),"type"=>"password"));
                  load_view("template/input1.php",array('label'=>"Confirm","name"=>"rpassword",'dc'=>"password","type"=>"password",'inpattr'=>array("data-unfilled"=>"Correct Confirm password")));
                ?>
                <hr/>
                <div class="text-center">
                 <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>Save profile</button>
                 <button type="reset" class="btn btn-default"><i class="fa fa-trash-o fa-lg"></i>Cancel</button>
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
  <script src="assets/js/tisa_common.js">
  </script>
  <script src="assets/lib/select2/select2.min.js">
  </script>
  <script src="assets/lib/bootstrap-switch/build/js/bootstrap-switch.min.js">
  </script>
  <script src="assets/js/apps/tisa_user_profile.js">
  </script>
<?php
load_view("template/bottomnew.php");
?>
