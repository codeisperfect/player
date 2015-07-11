<?php
load_view("Template/top.php",$inp);
load_view("Template/navbarnew.php",$inp);
?>

<main>
  <div class="container">
  <br>
    <div class="row">
      <div class="col s12 l6">
        <div class="card-panel">
          <div class="row">
            <div class="col s12 offset-l1 l10">
              <h3 class="teal-text text-darken-1">Review</h3><br>
              <h6 class="grey-text">Rate using stars and provide a review about your experience with the tutor.</h6>
            </div>
          </div>
          <div class="row">
            <form class="col s12 offset-l1" method="post">
              <div class="row">
                <div class="input-field col s12 l10">
                  <div id="review_stars"></div>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 l10">
                  <textarea id="review_comment" class="materialize-textarea"></textarea>
                  <label for="review_comment">Review</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <button class="btn waves-effect waves-light">
                    Save
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php
load_view("Template/footer.php",$inp);
load_view("Template/bottom.php",Fun::mergeifunset($inp,array("needbody"=>false)));
?>
  <script>
    
  </script>
</body>
</html>
