<?php
if($needpopup){
//	load_view("popup.php",array("name"=>"alert"));
//	load_view("popup.php",array("name"=>"confirm"));
//	load_view("Template/success.php");
}
?>
	<script src="js/jquery-2.1.1.min.js"></script>
	<script src="js/materialize.min.js"></script>
	<script src="js/jquery.bxslider.min.js"></script>
	<script src="js/custom-script.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.raty.js"></script>
	<script src="assets/lib/select2/select2.min.js"></script>
<?php
addmyjs();
if($needbody){
	?>

</body></html><?php
}
?>