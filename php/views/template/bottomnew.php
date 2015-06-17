<?php
if($needpopup){
	load_view("template/popup.php",array("name"=>"alert"));
	load_view("template/popup.php",array("name"=>"confirm"));
	load_view("template/success.php");
}

?>
  <script src="assets/js/jquery.min.js">
  </script>
  <script src="assets/bootstrap/js/bootstrap.min.js">
  </script>
  <?php
  addmyjs();
if($closebody){
?>
</body></html>
<?php
}
  ?>
