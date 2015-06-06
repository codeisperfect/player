<!doctype html>
<html>
<head>
  <title>Get IITians | LogIn</title>
  <link rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link rel="stylesheet" href="css/custom-stylesheet.css"  media="screen,projection"/>
  <link rel="stylesheet" href="css/jquery.bxslider.css" media="screen,projection"/>

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
            <h4 class="teal-text text-darken-1 center" style="font-weight:bold; font-variant: small-caps;">LogIn</h4>
          </div>
        </div>
        <div class="row center">
          <form class="col s12 m8 offset-m2">
            <div class="row">
              <div class="input-field col s12 m12">
                <input id="email" type="email" class="validate">
                <label for="email">Email Id</label>
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
                <button class="btn waves-effect waves-light" type="submit">LOGIN
                  <i class="mdi-content-send right"></i>
                </button>
              </div>
            </div>
          </form>
        </div>

          <div class="container">
          	<div class="row">
          		<a href="#">New User? Create Account</a><br><br>
          		<a href="#">Forgot Password</a>
          	</div>
          </div>
        
      </div>
    </div>
    </div>
  </main>

<?php
include 'footer.php';
?>