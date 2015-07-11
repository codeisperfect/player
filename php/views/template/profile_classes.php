<br><br>
<div class="row">
  <div class="col s12">
    <h5 class="teal-text text-darken-1">Upcoming Classes</h5>
  </div>
</div>
<div class="row">
  <div class="col s12">
    <table class="striped responsive-table">
      <thead>
        <tr>
          <th>Student</th>
          <th>Class</th>
          <th>Subject</th>
          <th>Topic</th>
          <th>Date</th>
          <th>Time</th>
          <th>Duration</th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        <?php
          foreach($newslots as $i => $row) {
        ?>
        <tr>
          <td><?php echo $row["studentname"] ?></td>
          <td><?php echo $row["classname"] ?></td>
          <td><?php echo $row["subjectname"] ?></td>
          <td><?php echo $row["topicname"] ?></td>
          <td><?php echo $row["startdate_disp"]; ?></td>
          <td><?php echo $row["starttime_disp"]; ?></td>
          <td><?php echo $row["duration_disp"]; ?> hrs</td>
          <td><a target="_blank" href="<?php echo Funs::wiziqurl($row); ?>" ><button class="btn waves-effect waves-light" >Start Class</button></a></td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
  </div>
</div>
<div class="row">
  <div class="col s12">
    <h5 class="teal-text text-darken-1">Previous Classes</h5>
  </div>
</div>
<div class="row">
  <div class="col s12">
    <table class="striped responsive-table">
      <thead>
        <tr>
          <th>Student</th>
          <th>Class</th>
          <th>Subject</th>
          <th>Topic</th>
          <th>Date</th>
          <th>Time</th>
          <th>Duration</th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        <?php
          foreach($oldslots as $i => $row) {
        ?>
        <tr>
          <td><?php echo $row["studentname"] ?></td>
          <td><?php echo $row["classname"] ?></td>
          <td><?php echo $row["subjectname"] ?></td>
          <td><?php echo $row["topicname"] ?></td>
          <td><?php echo $row["startdate_disp"]; ?></td>
          <td><?php echo $row["starttime_disp"]; ?></td>
          <td><?php echo $row["duration_disp"]; ?> hrs</td>
          <td><a target="_blank" href="<?php echo Funs::wiziqurl($row); ?>" ><button class="btn waves-effect waves-light" >Start Class</button></a></td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
  </div>
</div>