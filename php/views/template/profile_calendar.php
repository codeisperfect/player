<br><br>

<?php
if ($tid == User::loginId()) {
?>
<div class="row">
  <div class="col s12">

    <a class="modal-trigger" href="#fillalltsform">Click here for slots</a>


<!--     <a onclick="mohit.popup('addslots');" >Click here for slots</a>
 -->
    <?php
//      load_view("popup.php", array("name"=>"addslots", "body" => "Template/uploadslotform.php", "bodyinfo" => $inp, "title" => "Add your slots"));
    ?>
    <div id="fillalltsform" class="modal" class="width:1000px;">
      <div class="modal-content">
        <p>
          <?php
            load_view("Template/uploadslotform.php",$inp);
          ?>
        </p>
      </div>
      <div class="modal-footer" style="display:none;">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat"></a>
      </div>
    </div>
  </div>
</div>
<?php
}
?>

<!-- Calendar -->
<div class="row">
  <div class="col s12">
    <div id="divforcalender">
      <?php
        load_view("dispcal.php",$inp);
      ?>
    </div>
  </div>
</div>
