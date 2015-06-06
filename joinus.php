<!doctype html>
<html>
<head>
  <title>Get IITians | Join Us</title>
  <link rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link rel="stylesheet" href="css/custom-stylesheet.css"  media="screen,projection"/>
  <script src="js/jquery-2.1.1.min.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
</head>

<body>

<?php
include 'navbar.php';
?>
<main>
    <div class="container">
      <div class="container">
      <div class="card-panel">
        <div class="row">
          <div class="col s12">
            <h4 class="teal-text text-darken-1 center" style="font-weight:bold; font-variant: small-caps;">IITians Join Us</h4>
          </div>
        </div>
        <div class="row center">
          <form class="col s12 m10 offset-m1">
            <div class="row">
              <div class="input-field col s12 m6">
                <input id="fullname" type="text" class="validate" required="required">
                <label for="fullname">Full Name</label>
              </div>
              <div class="input-field col s12 m6">
                <input id="email" type="email" class="validate" required="required">
                <label for="email">Email</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m6">
                <select>
          				<option value="" disabled selected>Choose your IIT</option>
          				<option value="Bhubaneswar">IIT Bhubaneswar</option>
        					<option value="Bombay">IIT Bombay</option>
        					<option value="Delhi">IIT Delhi</option>
        					<option value="Gandhinagar">IIT Gandhinagar</option>
        					<option value="Guwahati">IIT Guwahati</option>
        					<option value="Hyderabad">IIT Hyderabad</option>
        					<option value="Indore">IIT Indore</option>
        					<option value="Jodhpur">IIT Jodhpur</option>
        					<option value="Kanpur">IIT Kanpur</option>
        					<option value="Kharagpur">IIT Kharagpur</option>
        					<option value="Madras">IIT Madras</option>
        					<option value="Mandi">IIT Mandi</option>
        					<option value="Patna">IIT Patna</option>
        					<option value="Roorkee">IIT Roorkee</option>
        					<option value="Ropar">IIT Ropar</option>
        					<option value="Varanasi">IIT (BHU) Varanasi</option>
    			      </select>
              </div>
              <div class="input-field col s12 m6">
                <input id="year" type="text" class="validate" required="required">
                <label for="year">Year Of Joining IIT</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m6">
                <input id="degree" type="text" class="validate" required="required">
                <label for="degree">Degree</label>
              </div>
              <div class="input-field col s12 m6">
                <input id="phone" type="tel" class="validate" maxlength="10" required="required">
                <label for="phone">Phone No.</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m6">
                <input id="password" type="password" class="validate" required="required">
                <label for="password">Choose Password</label>
              </div>
              <div class="input-field col s12 m6">
                <input id="password" type="password" class="validate" required="required" oninput="check(this)">
                <label for="password">Re-Password</label>
              </div>

              <script language='javascript' type='text/javascript'>
                function check(input) {
                  if (input.value != document.getElementById('password').value) {
                  input.setCustomValidity('Password Must be Matching.');
                  } else {
                  input.setCustomValidity('');
                  }
                  }
              </script>
            </div>

            <div class="row">
              <div class="input-field col s12 m12">
                <button class="btn waves-effect waves-light" type="submit">JOIN
                  <i class="mdi-content-send right"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>

<style>
.select-wrapper input.select-dropdown {
  color:#9e9e9e;
}

.dropdown-content {
  z-index:2;
}
</style>

<script>
$(document).ready(function() {
    $('select').material_select();
  });
</script>

<?php
include 'footer.php';
?>