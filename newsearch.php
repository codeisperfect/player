<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0 user-scalable=no" />
<title>Get IITians</title>

<link rel="stylesheet" href="jquery/jRating.jquery.css" type="text/css" />
<link rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
<link rel="stylesheet" href="css/custom-stylesheet.css"  media="screen,projection"/>
<script src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="jquery/jRating.jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('select').material_select();
	});
</script>

</head>

<body>

<?php
include 'navbar.php';
?>

<main>
    <div class="container">
    	<div class="row">
    		<div class="col m4 s12 card-panel">
    			<div class="row" style="margin-bottom:0;">
    				<h5 class="center teal-text">Refine Your Search</h5>
    				<div class="divider teal"></div>
  					<ul class="">
  						<li class="no-padding">
  							<ul class="collapsible collapsible-accordion">
  								<li class="bold">
          							<a class="collapsible-header">By Classes<i class="mdi-navigation-arrow-drop-down right"></i></a>
          							<div class="collapsible-body white">
           								<ul id="options" class="classes">
								            <li><a href="#!">Class VI</a></li>
								            <li><a href="#!">Class VII</a></li>
								            <li><a href="#!">Class VIII</a></li>
								            <li><a href="#!">Class IX</a></li>
								            <li><a href="#!">Class X</a></li>
								            <li><a href="#!">Class XI</a></li>
								            <li><a href="#!">Class XII</a></li>
								            <li><a href="#!">IIT Mains</a></li>
								            <li><a href="#!">IIT Advance</a></li>
								          </ul>
							          </div>
						        </li>
						        <li class="bold">
          							<a class="collapsible-header">By Subject<i class="mdi-navigation-arrow-drop-down right"></i></a>
          							<div class="collapsible-body white">
           							<ul class="checks" id="options">
								        <li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box"/>
      											<label for="filled-in-box">Maths</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box1"/>
      											<label for="filled-in-box1">Physics</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box2"/>
      											<label for="filled-in-box2">Chemistry</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box3"/>
      											<label for="filled-in-box3">Biology</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box4"/>
      											<label for="filled-in-box4">Science</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box5"/>
      											<label for="filled-in-box5">History</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box6"/>
      											<label for="filled-in-box6">Geography</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box7"/>
      											<label for="filled-in-box7">Civics</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box8"/>
      											<label for="filled-in-box8">Psychology</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box9"/>
      											<label for="filled-in-box9">Economics</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box11"/>
      											<label for="filled-in-box11">Sociology</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box12"/>
      											<label for="filled-in-box12">Political Science</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box13"/>
      											<label for="filled-in-box13">Accountancy</label>
    											</p>
    										</li>
    										<li><p>
      											<input type="checkbox" class="filled-in" id="filled-in-box14"/>
      											<label for="filled-in-box14">Business Studies</label>
    											</p>
    										</li>
								        </ul>
							        </div>
						        </li>
                    <li class="bold">
                        <a class="collapsible-header">By Topics<i class="mdi-navigation-arrow-drop-down right"></i></a>
                        <div class="collapsible-body white">
                          <ul id="options" class="checks">
                            <li><p>
                              <input type="checkbox" class="filled-in" id="topic-box1"/>
                              <label for="topic-box1">Knowing Our Number</label>
                              </p>
                            </li>
                            <li><p>
                              <input type="checkbox" class="filled-in" id="topic-box2"/>
                              <label for="topic-box2">Whole Numbers</label>
                              </p>
                            </li>
                            <li><p>
                              <input type="checkbox" class="filled-in" id="topic-box3"/>
                              <label for="topic-box3">Basic Geometrical Ideas</label>
                              </p>
                            </li>
                            <li><p>
                              <input type="checkbox" class="filled-in" id="topic-box4"/>
                              <label for="topic-box4">Understanding Shapes</label>
                              </p>
                            </li>
                            <li><p>
                              <input type="checkbox" class="filled-in" id="topic-box5"/>
                              <label for="topic-box5">Integers</label>
                              </p>
                            </li>
                            <li><p>
                              <input type="checkbox" class="filled-in" id="topic-box6"/>
                              <label for="topic-box6">Fractions</label>
                              </p>
                            </li>
                            <li><p>
                              <input type="checkbox" class="filled-in" id="topic-box7"/>
                              <label for="topic-box7">Decimals</label>
                              </p>
                            </li>
                            <li><p>
                              <input type="checkbox" class="filled-in" id="topic-box8"/>
                              <label for="topic-box8">Data Handling</label>
                              </p>
                            </li>
                            <li><p>
                              <input type="checkbox" class="filled-in" id="topic-box9"/>
                              <label for="topic-box9">Mensuration</label>
                              </p>
                            </li>
                            <li><p>
                              <input type="checkbox" class="filled-in" id="topic-box10"/>
                              <label for="topic-box10">Algebra</label>
                              </p>
                            </li>
                            <li><p>
                              <input type="checkbox" class="filled-in" id="topic-box11"/>
                              <label for="topic-box11">Ratios and Proportions</label>
                              </p>
                            </li>
                            <li><p>
                              <input type="checkbox" class="filled-in" id="topic-box12"/>
                              <label for="topic-box12">Symmetry</label>
                              </p>
                            </li>
                            <li><p>
                              <input type="checkbox" class="filled-in" id="topic-box13"/>
                              <label for="topic-box13">Practical Geometry</label>
                              </p>
                            </li>
                          </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header">By language<i class="mdi-navigation-arrow-drop-down right"></i></a>
                        <div class="collapsible-body white">
                          <ul class="checks">
                            <li><p>
                              <input type="checkbox" class="filled-in" id="language-box1"/>
                              <label for="language-box1">English</label>
                              </p>
                            </li>
                            <li><p>
                              <input type="checkbox" class="filled-in" id="language-box2"/>
                              <label for="language-box2">Hindi</label>
                              </p>
                            </li>
                            <li><p>
                              <input type="checkbox" class="filled-in" id="language-box3"/>
                              <label for="language-box3">Tamil</label>
                              </p>
                            </li>
                            <li><p>
                              </p>
                            </li>                           
                          </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header">By Sessions<i class="mdi-navigation-arrow-drop-down right"></i></a>
                        <div class="collapsible-body white">
                          <ul class="checks">
                            <li><p>
                              <input type="checkbox" class="filled-in" id="session-box1"/>
                              <label for="session-box1">12:00 am - 12:59 am</label>
                              </p>
                            </li>
                            <li><p>
                              <input type="checkbox" class="filled-in" id="session-box2"/>
                              <label for="session-box2">01:00 am - 01:59 am</label>
                              </p>
                            </li>
                            <li><p>
                              <input type="checkbox" class="filled-in" id="session-box3"/>
                              <label for="session-box3">02:00 am - 02:59 am</label>
                              </p>
                            </li>
                            <li><p>
                              </p>
                            </li>                           
                          </ul>
                        </div>
                    </li>

                    <li>
                      <label for="amount" style="margin-left:15px; font-size:14px;">Consultation fee</label>
                      <input type="text" id="amount" readonly style="border:0; color:#602703; font-weight:bold;"></p>
                      <div id="slider-range"></div>
                    </li>

		   			      </ul>
						</li>
  					</ul>
    			</div>
    		</div>
    		<div class="col m7 s12 offset-m1  card-panel">
    			<div class="result card">Showing 1-10 of 1000 results (402 online)</div>
          <div class="divider"></div>
          <div class="row card">
            <div class="col s3"><img src="images/searchpropic.png"></div>
            <div class="col s9">
              <h5>Himanshu Jain</h5>
              <blockquote>State University : of New York at Brockport</blockquote>
              <p>"I have a Bachelor's degree in Chemistry from New Jersey and am currently pursuing my PhD. in Chemistry.</p>
              <div class="divider"></div>
            </div>
            <div class="">
              Fee(hourly):000
            </div>
          </div>
          <div class="row card">
            <div class="col s3"><img src="images/searchpropic.png"></div>
            <div class="col s9">
              <h5>Himanshu Jain</h5>
              <blockquote>State University : of New York at Brockport</blockquote>
              <p>"I have a Bachelor's degree in Chemistry from New Jersey and am currently pursuing my PhD. in Chemistry.</p>
              <div class="divider"></div>
            </div>            
            <div class="">
              Fee(hourly):000
            </div>
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

.collapsible-accordion li a,label{
	color:#009688;
	font-weight: bold;
}

.classes{
  margin-left: 26px;
}

#options{
  max-height:290px;
  overflow: scroll;
}
#options li{
	padding:4px;
}
.checks li{
	height:30px;
}
.card-panel .row h5{
  font-size: 18px;
}

</style>

<?php
include 'footer.php';
?>