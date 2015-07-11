<?php
foreach($qresult as $row) {
?>
<div class="card teacherlistelm" style="padding:15px;">
  <div class="row">
    <div class="col s12 l3">
      <a href="<?php echo BASE."profile/".$row["tid"]; ?>" >
      <img src="<?php echo $row["profilepic"]; ?>" height="120px" width="120px" style="border:1px solid #9e9e9e;"/>
      </a>
    </div>
    <div class="col s12 l9">
      <div class="row">
        <div class="col s12 l6">
          <h6><strong><?php echo convchars($row["name"]); ?></strong></h6>

<!--           <h6>IIT Delhi</h6>
 -->
          <br>
          <h6><?php echo $row["subjectname"]; ?></h6>
          <h6>
            Fees :
            <span>
              <?php echo $row["minprice"].rit(" - ".$row["maxprice"], $row["maxprice"]!=$row["minprice"] ); ?>/hr
            </span>
          </h6>
        </div>
        <div class="col s12 l6">
          <h6>
            <?php
            for($i=0; $i<$row["avgrating"]; $i++){
            ?>
            <i class="material-icons tiny" style="width:1rem;">star_rate</i>
            <?php
            }
            ?>
          </h6>
<!--           <h6>
            3 Reviews
          </h6>
 -->
           <br><br>
          <a class="waves-effect waves-light btn" style="display:none;">
            Book slot
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
}
?>