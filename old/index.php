<?php


include "includes/app.php";
load_view("template/top.php");


//Disp::disp_form($form,"myform");

?>


<div align=center >
<div style="width:600px;" align=left >
<?php
load_view("makeform.php");
?>
</div>
</div>


<?php




//load_view("template/mselect.php",array("labels"=>array("timepass","Mohit"),"selectall"=>true,"selectallselected"=>true,"name"=>"mohit","data"=>array(1)));





load_view("template/bottom.php");

closedb();
?>