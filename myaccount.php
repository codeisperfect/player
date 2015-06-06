<!doctype html>
<html>
<head>
  <title>Get IITians | My Account</title>
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
                  <a href="#">Change Profile Picture</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 l6">
                <input id="first-name" type="text" class="validate">
                <label for="first-name">First Name</label>
              </div>
              <div class="input-field col s12 l6">
                <input id="last-name" type="text" class="validate">
                <label for="last-name">Last Name</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 l6">
                <select>
                  <option value="" disabled selected>Gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
              <div class="input-field col s12 l6">
                <label for="date-of-birth">Date of Birth</label>
                <input type="date" id="date-of-birth" class="datepicker">
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 l6">
                <input id="emailid" type="email" class="validate">
                <label for="emailid">Email</label>
              </div>
              <div class="input-field col s12 l6">
                <input id="phone-number" type="text" class="validate">
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

<?php
include 'footer.php';
?>
