<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8" />
  <title>
   <?php echo $title; ?>
  </title>
  <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400&amp;subset=latin-ext,latin" rel="stylesheet" type="text/css" />
  <script>
  	var HOST="<?php echo HOST; ?>";
  </script>
<?php

addall_css($addcss);
addmycss();

if($closehead){
  closet("head");
}
?>
