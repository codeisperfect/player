<?php
load_view("template/top.php");
load_view("template/navbarnew.php");

$defopen="otpwindow";
$defopen="signupwindow";

?>
  <main>
    <div class="container">
    <br>
      <div class="row">
        <div class="col s12 l10 offset-l1">
          <div class="card-panel">
            <?php
              load_view('template/form_errors.php',array("msg"=>$signupmsg));
            ?>

            <div class="row">
              <div class="col s12 l3 offset-l1">
                <h4 class="teal-text text-darken-1 center">Sign Up</h4>
              </div>
              <div class="col s12 l8">
                <div class="row grey-text">
                  <div class="col s12">
                    <ul>
                      <li><i class="material-icons tiny left">chevron_right</i>
                        This form is meant only for users.
                      </li>
                      <li><i class="material-icons tiny left">chevron_right</i>
                        All fields are mandatory.
                      </li>                      
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="row center">
              <form class="col s12 l10 offset-l1" method="post" onsubmit='return form.valid.action1(this);' autocomplete="off" >
                <div id="signupwindow" style='<?php dit($defopen=="signupwindow"); ?>' >
                  <div class="row">
                    <div class="input-field col s12 l6">
                      <input id="fullname" name="name" type="text"  data-condition='simple' >
                      <label for="fullname">Full Name</label>
                    </div>
                    <div class="input-field col s12 l6">
                      <input id="email" name="email" type="text" data-condition='email' >
                      <label for="email">Email</label>
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
                <div id="otpwindow" style='<?php dit($defopen=="otpwindow"); ?>' >

                  <div class="col s12">
                    An OTP has been sent to your phone. Please enter it below.
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="otp" name="otp" type="text" class="validate" >
                      <label for="otp">One Time Password</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <button class="btn waves-effect waves-light"  name="signup" type="submit" >Submit
                        <i class="material-icons right">send</i>
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    <br><br>
    </div>
  </main>

<?php
load_view("template/footer.php",$inp);
load_view("template/bottom.php");
?>
