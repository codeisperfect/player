<?php
Fun::gotohome($DB);
Fun::issetlogout($DB);

$msg="";
if(Fun::isSetP("fname","lname","gender","email","dob","phone")){
  $update_data=Fun::getflds(array("gender","email","dob","phone"),$_POST);
  $update_data["name"]=$_POST["fname"]." ".$_POST["lname"];
  $update_data["dob"]=strtotime($update_data["dob"]);
  Sqle::updateVal("users", $update_data, array("id"=>User::loginId() ));
  $msg="Saved";
}

if(isset($_FILES["profilepic"])){
  $fd=Fun::uploadfile_post($_FILES["profilepic"],array());
  if($fd["ec"]>0){
    Sqle::updateVal("users",array("profilepic"=>$fd["fn"]), array("id"=>User::loginId()) );
  }
}

$sid=User::loginId();
//$sinfo=Sql::query("select * from users where id=? limit 1",'i',array(&$sid));
$sinfo=Sqle::selectVal("users","*",array("id"=>User::loginId()),1);
$flname=explode(" ",$sinfo["name"]." ");
$fname=$flname[0];
$lname=$flname[1];

?>
<body>  
  <main>
    <div class="container">
      <div class="card-panel">
        <div class="row">
          <div class="col s12">
            <h3 class="teal-text text-darken-1 center">Account</h3>
          </div>
        </div>
        <div class="row center">
          <form class="col s12 m8 offset-m2">
            <div class="row">
              <div class="input-field col s12">
                <div class="">
                  <i class="mdi-action-face-unlock large"></i>
                  <br>
                   <form method="post" enctype="multipart/form-data"> 
                  <a href="#">Change Profile Picture</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 l6">
                <input id="first-name" name="fname" type="text" value="<?php echo Fun::displayMsgBody($fname); ?>"  class="validate">
                <label for="first-name">First Name</label>
              </div>
              <div class="input-field col s12 l6">
                <input id="last-name" name="lname" type="text"  class="validate">
                <label for="last-name">Last Name</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 l6">
                <select>
                  <option value="" disabled selected>Gender</option>
                   <?php
                      $olist=array("Male","Female");
                      foreach($olist as $i=>$disp){
                    ?>
                      <option <?php if($sinfo["gender"]==$disp[0]) echo "selected"; ?> value="<?php echo $disp[0]; ?>" ><?php echo $disp; ?></option>
                    <?php
                       }
                    ?>
                </select>
              </div>
              <div class="input-field col s12 l6">
                <label for="date-of-birth">Date of Birth</label>
                <input type="date" id="date-of-birth" name="dob" value="<?php echo $sinfo["dob"]>0 ? Fun::timetodate_v2($sinfo["dob"]):""; ?>"  class="datepicker">
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 l6">
                <input id="emailid" type="email" name="email"  value="<?php echo $sinfo["email"]; ?>" class="validate">
                <label for="emailid">Email</label>
              </div>
              <div class="input-field col s12 l6">
                <input id="phone-number" type="text" name="phone" value="<?php echo Fun::displayMsgBody($sinfo["phone"]); ?>" class="validate">
                <label for="phone-number">Phone Number</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m12">
                <button class="btn waves-effect waves-light" type="submit">Save
                  <i class="mdi-content-save right"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
