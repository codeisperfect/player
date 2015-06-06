<!doctype html>
<html>
<head>
  <title>Get IITians | Sign Up</title>
  <link rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link rel="stylesheet" href="css/custom-stylesheet.css"  media="screen,projection"/>

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
            <h4 class="teal-text text-darken-1 center" style="font-weight:bold; font-variant: small-caps;">Sign Up</h4>
          </div>
        </div>
        <div class="row center">
          <form class="col s12 m10 offset-m1">
            <div class="row">
              <div class="input-field col s12 m12">
                <input id="fullname" type="text" class="validate">
                <label for="fullname">Full Name</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m12">
                <input id="email" type="email" class="validate">
                <label for="email">Email</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m12">
                <input id="password" type="password" class="validate">
                <label for="password">Password</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m12">
                <input id="confirm_password" type="password" class="validate">
                <label for="confirm_password">Confirm Password</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m12">
                <button class="btn waves-effect waves-light" type="submit">Submit
                  <i class="mdi-content-send right"></i>
                </button>
                <button class="btn waves-effect waves-light" type="reset">Reset</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  </main>

<?php
include 'footer.php';
?>
