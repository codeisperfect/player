<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0 user-scalable=no" />
<title>Get IITians | Review</title>

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
    	<div class="card-panel">
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
          	<h5 class="center teal-text">Reviews</h5>
            <div class="col s10"><p>Great help with Econ. He takes the time to understand what you're working with and provide strong feedback</p>
            </div>
            <div class="col s2">
            	<div class="row"><p>
				<div class="col s6"><span>50</span><a href="#"><img src="images/like.png"></a></div>
				<div class="col s6"><span>2</span><a href="#"><img src="images/dislike.png"></a></div>
				</p></div>
			</div>
			<div class="">
				<div class="input-field col m9">
          			<i class="mdi-editor-mode-edit prefix"></i>
          			<textarea id="icon_prefix2" class="materialize-textarea"></textarea>
			        <label for="icon_prefix2">Submit Your Review</label>
			    </div>
			    <div class="input-field col m3 right">
	                <button class="btn waves-effect waves-light" type="submit">submit
	                  <i class="mdi-content-send right"></i>
	                </button>
              	</div>
			</div>
          </div>
    		</div>
    	</div>
    </main>

<style>
@media screen and (min-width:992px ){
	.input-field button.btn{
		margin-top: 50px;
	}
}
</style>

<?php
include 'footer.php';
?>