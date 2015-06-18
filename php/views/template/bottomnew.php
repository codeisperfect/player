<?php
if($needpopup){
	load_view("template/popup.php",array("name"=>"alert"));
	load_view("template/popup.php",array("name"=>"confirm"));
	load_view("template/success.php");
}

?>
  <?php
  addmyjs();
if($closebody){
?>
</body></html>
<?php
}
  ?>
