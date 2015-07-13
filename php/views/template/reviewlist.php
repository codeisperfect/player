<!-- Review Cards  -->
<?php
  $rlist = array(1,2,3);
  foreach($rlist as $i => $row) {
?>
<div class="row">
  <div class="col s12 l10 offset-l1">
    <div class="card white">
      <div class="card-content grey-text">
        <h6>
          <a <?php pit("href='".BASE."profile/".$row["tid"]."'", $reviewname == "teachername" ); ?> >

            <i class="mdi-action-face-unlock small left"></i>

<!--             <img src=""  >
 -->
            <?php echo convchars($row[$reviewname]); ?>
          </a>
        </h6><br>
        <p><?php echo convchars($row["feedback"]); ?>.</p>
      </div>
      <div class="card-action" style="display:none;" >
        <a href="#">Upvote</a>
        <a href="#">Downvote</a>
        <a class="modal-trigger" href="#upvote_modal" onclick="smgPreloader();">15&nbsp;<i class="mdi-action-thumb-up"></i></a>
        <a class="modal-trigger" href="#downvote_modal" onclick="smgPreloader();">2&nbsp;<i class="mdi-action-thumb-down"></i></a>
      </div>
    </div>
  </div>
</div>
<?php
  }
?>
