<?php
load_view("template/topnew.php",array("addcss"=>array("assets/css/login.css"),"title"=>"Login"));
?>
 <body>
  <div class="login_container">
   <form id="login_form"  method="post" onsubmit='return form.valid.action(this);' action="" style='<?php dit($defopen=="login"); ?>' >
    <h1 class="login_heading">
     Login
     <span>
      /
      <a href="#" class="open_register_form">
       register
      </a>
     </span>
    </h1>
    <div style="margin-top:-10px;margin-bottom:10px;color:red;" ><?php echo $loginmsg; ?></div>
    <?php
    load_view("template/input.php",array("name"=>"email","label"=>"Username","dc"=>"email",'inpattr'=>array("autofocus"=>"")));
    load_view("template/input.php",array("name"=>"password","label"=>"Password","type"=>"password","closediv"=>false));
    ?>
     <span class="help-block" >
      <a href="#" class="open_forget_form" >
       Forgot password?
      </a>
     </span>
    </div>

     <div class="submit_section">
     <button class="btn btn-lg btn-success btn-block" name="login" >
      Continue
     </button>
    </div>
   </form>
   <form id="forget_form" method="post" style="<?php dit($defopen=="forget"); ?>" onsubmit='submitForm(this);return false;'  >
    <h1 class="login_heading" style='margin-bottom:10px;' >
     Forget password ?
    </h1>
    <span>Don't worry! we knew you will do so. that's why we made this option.</span>
    <br><br>
    <?php
    load_view("template/input.php",array("name"=>"fpemail","label"=>"Email Id","inpattr"=>array("dc"=>"email")));
    ?>
    <div class="form-group">
     <span class="help-block">
      <a href="#" class="open_login_form" >
       Oh, you remembered password ?
      </a>
     </span>
    </div>
    <div class="submit_section">
     <button class="btn btn-lg btn-success btn-block">
      Reset
     </button>
    </div>
   </form>
   <form id="register_form" style="<?php dit($defopen=="signup"); ?>" action="" onsubmit="return form.valid.action(this);" method="post" >
    <h1 class="login_heading">
     Register
     <span>
      /
      <a href="#" class="open_login_form">
       login
      </a>
     </span>
    </h1>
    <div style="margin-top:-10px;margin-bottom:10px;color:red;" ><?php echo $signupmsg; ?></div>
    <?php
      load_view("template/input.php",array("label"=>"Full Name","name"=>"name"));
      load_view("template/input.php",array("label"=>"Email ID","name"=>"email","dc"=>"email"));
      load_view("template/input.php",array("label"=>"Password","name"=>"password","type"=>"password"));
      load_view("template/input.php",array("label"=>"Phone","name"=>"phone","dc"=>"phone"));
    ?>
    <div class="form-group">
     <label class="checkbox-inline">
      <input type="checkbox" name="tnc" id="register_terms" data-condition='checkcheckbox' data-unfilled='Terms & Conditions' checked />
      Agree to
      <a href="javascript:void(0)" data-toggle="modal" data-target="#terms_modal">
       terms&conitions;
      </a>
     </label>
    </div>
    <div class="submit_section">
     <button type="submit" class="btn btn-lg btn-success btn-block" name="signup" >
      Continue
     </button>
    </div>
   </form>
  </div>
  <div class="modal fade" id="terms_modal">
   <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">
       &times;
      </button>
      <h4 class="modal-title">
       Terms & Conditions
      </h4>
     </div>
     <div class="modal-body">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus eaque tempora! Porro cumque labore voluptate dolore alias libero commodi deserunt unde aspernatur dignissimos quaerat similique maiores quasi eos optio quidem.
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus eaque tempora! Porro cumque labore voluptate dolore alias libero commodi deserunt unde aspernatur dignissimos quaerat similique maiores quasi eos optio quidem.
     </div>
    </div>
   </div>
  </div>
  <script src="assets/js/jquery.min.js">
  </script>
  <script src="assets/bootstrap/js/bootstrap.min.js">
  </script>

<?php
load_view("template/bottomnew.php",array("closebody"=>false));
?>
  <script>
   $(function(){
      var allids=["login_form","forget_form","register_form"];

      doforall(allids,function(elm){
        $('.open_'+elm).click(function(e){
          animreplce(e,elm,allids,function(d){
            var inputs=$('#'+elm).find("input");
            if(inputs.length>0){
              $(inputs[0]).focus();
            }
          });
        });
      });
		})
  </script>
 </body>
</html>