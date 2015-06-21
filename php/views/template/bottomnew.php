<?php
if($needpopup){
	load_view("template/popup.php",array("name"=>"alert", "title"=>"Alert"));
	load_view("template/popup.php",array("name"=>"confirm", "title"=>"Confirm"));
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
