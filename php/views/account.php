<?php
load_view("Template/top.php",$inp);
load_view("Template/navbarnew.php",$inp);
?>
  <main>
    <div class="container">
      <div class="card-panel">
        <div class="row">
          <div class="col s12">
            <h3 class="teal-text text-darken-1 center">Account</h3>
          </div>
        </div>
        <div class="row center">
          <div class="col s12 m8 offset-m2">
            <div class="row">
              <div class="input-field col s12">
                <div class="">
                  <img src='<?php echo $sinfo["profilepic"]; ?>' width='100'  height='100' style='border-radius:50px;' />
                  <br>
                   <form method="post" enctype="multipart/form-data"> 
                    <a onclick='uploadfile(this,"profilepic");' >Change Profile Picture</a>
                   </form>
                </div>
              </div>
            </div>
            <form method="post" >
              <div class="row">
                <div class="input-field col s12 l6">
                  <input id="first-name" name="fname" type="text" value="<?php echo Fun::displayMsgBody($fname); ?>"  class="validate">
                  <label for="first-name">First Name</label>
                </div>
                <div class="input-field col s12 l6">
                  <input id="last-name" name="lname" type="text"  class="validate" value="<?php echo Fun::displayMsgBody($lname); ?>" >
                  <label for="last-name">Last Name</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 l6">
                  <select name="gender" >
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
                  <input type="date" id="date-of-birth" name="dob" value="<?php echo $dob; ?>"  class="datepicker">
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
    </div>
  </main>
<?php
load_view("Template/footer.php",$inp);
load_view("Template/bottom.php",$inp);
?>