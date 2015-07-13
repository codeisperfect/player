<?php

$msg="";
if(Fun::isSetP("class","subject","topic","timer","price")){
  $temp=User::loginID();
  
  if($temp>0){
    $datatoinsert=Fun::getflds(array("class","subject","topic","timer","price"),$_POST);
    $datatoinsert["tid"]=$temp;
    $odata=Sqle::insertVal("subjects",$datatoinsert);
    Fun::redirect(BASE."topics");
  }
  else{
    $msg="Error occured";
  }
}
$query="select * from all_csk";
$result=Sql::getArray($suqery);
?>
<!doctype html>
<html>
<head>

    <script>
    var topics=<?php echo json_encode($result); ?>;
    topics['']=[];
    </script>

  <title>Get IITians | Join Us</title>
  <link rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link rel="stylesheet" href="css/custom-stylesheet.css"  media="screen,projection"/>
  <script src="js/jquery-2.1.1.min.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
</head>

<body>



<main>
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h3 class="teal-text center">Topics</h3>
      </div>
    </div>
    <div class="row">
      <div class="col s12 l3">
        <div class="card-panel">
          <span class="grey-text text-darken-2">Add your subject</span>
          <br>
          <div class="row">
            <form class="col s12" method = post>
              <div class="row">
                <div class="input-field col s12">
                  
                  <select id="class" name="class" onchange='$("#top-sub").html(selects.arraytooptionlist(others.keys(topics[this.value]),"Select Subject"));' > 

                    <option value="" disabled selected>Select Class</option>
                    <?php
                      $sql="select * from all_classes";
                      $result=Sql::getArray($sql);

                      for($i=0;$i<count($result);$i++){?>
                        <option value="<?php echo $result[$i]['id']; ?>"><?php echo $result[$i]['classname'];?></option>
                        <?php
                      }
                    ?>

                  </select>
                </div>

                <div class="input-field col s12">
                  <select name = "subject" id="top-sub">
                    <option value=""  disabled selected>Select Subject</option>
                    <option value="physics">Physics</option>
                    <option value="chemistry">Chemistry</option>
                    <option value="mathematics">Mathematics</option>
                    <option value="english">English</option>
                    <option value="hindi">Hindi</option>
                    <option value="compapps">Computer</option>
                  </select>
                </div>
                <div class="input-field col s12">
                  <input id="topic" type="text" class="validate" name = "topic">
                  <label for="topic">Topic</label>
                </div>
                <div class="input-field col s12">
                  <input id="duration" type="text" class="validate" name = "timer">
                  <label for="duration">Class duration (in hrs)</label>
                </div>
                <div class="input-field col s12">
                  <input id="fees" type="text" class="validate" name = "price">
                  <label for="fees">Fees per hour</label>
                </div>
                 <button class="btn waves-effect waves-light" type="submit">JOIN
                  <i class="mdi-content-send right"></i>
                </button>
                </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col s12 l9">
        <div class="card-panel">
          <table class="hoverable responsive-table">
            <thead>
              <tr>
                <th data-field="class">Class</th>
                <th data-field="subject">Subject</th>
                <th data-field="topic">Topic</th>
                <th data-field="duration">Duration (hrs)</th>
                <th data-field="fees">Fees</th>
                <th data-field=""></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>XI</td>
                <td>Physics</td>
                <td>Quantum Physics</td>
                <td>2</td>
                <td>&#8377;3000</td>
                <td><a class="btn waves-effect waves-light red darken-1">Delete</a></td>
              </tr>
              <tr>
                <td>X</td>
                <td>Chemistry</td>
                <td>Inorganic</td>
                <td>1</td>
                <td>&#8377;1400</td>
                <td><a class="btn waves-effect waves-light red darken-1">Delete</a></td>
              </tr>
              <tr>
                <td>III</td>
                <td>English</td>
                <td>Comprehension</td>
                <td>1&#189;</td>
                <td>&#8377;950</td>
                <td><a class="btn waves-effect waves-light red darken-1">Delete</a></td>
              </tr>
              <tr>
                <td>IV</td>
                <td>Hindi</td>
                <td>Short Stories</td>
                <td>2</td>
                <td>&#8377;2500</td>
                <td><a class="btn waves-effect waves-light red darken-1">Delete</a></td>
              </tr>
              <tr>
                <td>VII</td>
                <td>Mathematics</td>
                <td>Linear Algebra</td>
                <td>3</td>
                <td>&#8377;3900</td>
                <td><a class="btn waves-effect waves-light red darken-1">Delete</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>