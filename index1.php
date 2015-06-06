<!doctype html>
<html>
<head>
  <title>Get IITians</title>
  <link rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link rel="stylesheet" href="css/custom-stylesheet.css"  media="screen,projection"/>
  <link rel="stylesheet" href="css/jquery.bxslider.css" media="screen,projection"/>

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
</head>

<body>

<?php
include 'navbar.php';
?>

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br>
        <h2 class="header center green-text text-accent-3">Get IITians</h2>
        <div class="row center">
          <h5 class="col s12 light white-text">Get an IITian Tutor Anytime, Anywhere</h5>
        </div>
        <div class="row center">
          <form class="col s12">
            <div class="row center">
              <div class="input-field col s12">
                <input placeholder="Search by Topic, Subject, Time, Teacher" type="text" class="validate" id="main-search-bar" autocomplete="off">
              </div>              
            </div>
            <div class="row center">
              <div class="col s6 l2">
                <input type="radio" name="search-classes" class="with-gap" id="classes-all" checked/>
                <label for="classes-all" class="white-text">All classes</label>
              </div>
              <div class="col s6 l2">
                <input type="radio" name="search-classes" class="with-gap" id="classes-topic"/>
                <label for="classes-topic" class="white-text">By Topic</label>
              </div>
              <div class="col s6 l2">
                <input type="radio" name="search-classes" class="with-gap" id="classes-subject"/>
                <label for="classes-subject" class="white-text">By Subject</label>
              </div>
              <div class="col s6 l2">
                <input type="radio" name="search-classes" class="with-gap" id="classes-time"/>
                <label for="classes-time" class="white-text">By Time</label>
              </div>
              <div class="col s6 l2">
                <input type="radio" name="search-classes" class="with-gap" id="classes-teacher"/>
                <label for="classes-teacher"  class="white-text">By Teacher</label>
              </div>
              <div class="col s6 l2">
                <a href="https://instaedu.com/tutors/" target="_blank" class="">See&nbsp;Tutors<i class="mdi-navigation-chevron-right"></i></a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="images/banner.png" alt="Banner"></div>
  </div>

  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col s12">
          <h4 class="center green-text text-darken-1">How it works?</h4>
        </div>
        <div class="col s12 m4">
          <h2 class="center"><i class="mdi-image-remove-red-eye"></i></h2>
          <h5 class="center grey-text">Look for topics</h5>
          <p class="light">
          </p>
        </div>
        <div class="col s12 m4">
          <h2 class="center"><i class="mdi-device-access-time"></i></h2>
          <h5 class="center grey-text">Schedule a class</h5>
          <p class="light">
          </p>
        </div>
        <div class="col s12 m4">
          <h2 class="center"><i class="mdi-hardware-desktop-windows"></i></h2>
          <h5 class="center grey-text">Start tutorial online</h5>
          <p class="light">
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col s12">
          <h4 class="center green-text text-darken-1">Reviews</h4>
        </div>
        <div class="col s12 m6">
          <h2 class="center"><i class="mdi-action-face-unlock"></i></h2>
          <p class="light center">
            A great helpful tutor. Keep it up.
          </p>
        </div>
        <div class="col s12 m6">
          <h2 class="center"><i class="mdi-action-face-unlock"></i></h2>
          <p class="light center">
            Awesome online resource.<br>Better than my professor at college.
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col s12">
          <h4 class="center green-text text-darken-1">Users</h4>
        </div>
        <div class="col s12 m6 l6">
          <div class="card-panel white grey-text text-darken-2 center">
            <h6>Total Students Registered</h6>
            <h5>1337</h5>
          </div>
        </div>
        <div class="col s12 m6 l6">
          <div class="card-panel grey lighten-1 white-text center">
            <h6>Total Teachers Registered</h6>
            <h5>1001</h5>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col s12">
          <div class="slider-container">
            <ul class="bxslider">
              <li><img src="logos/IITGandhinagar.png" title="IIT Gandhinagar"></li>
              <li><img src="logos/roorkee.png"></li>
              <li><img src="logos/mandi-iit.png"></li>
              <li><img src="logos/indore.png"></li>
              <li><img src="logos/indianinstitutetercgnologygujrat.png"></li>
              <li><img src="logos/IIT-JODHPUR-LOGO.png"></li>
              <li><img src="logos/IIT-Guwahati-Logo.png"></li>
              <li><img src="logos/iit-delhi.png"></li>
              <li><img src="logos/iit-bombay.png"></li>
              <li><img src="logos/IIT_Kanpur_Logo.png"></li>
              <li><img src="logos/iit_hydrabad_logo.png"></li> 
              <li><img src="logos/iiit-varanasi.png"></li>  
              <li><img src="logos/bhuvneshwar.png"></li>
              <li><img src="logos/IITKharagpurLogo.png"></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
include 'footer.php';
?>
