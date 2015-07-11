  <header class="navbar navbar-fixed-top" role="banner">
   <div class="container-fluid">
    <div class="navbar-header">
     <a href="#" class="navbar-brand">
      <img src="assets/img/blank.gif" alt="Logo" />
     </a>
    </div>
    <ul class="top_links">
     <li>
      <a href="#">
       <span>
        3
       </span>
       Notification
      </a>
     </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
     <li class="user_menu">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
       <span class="navbar_el_icon ion-person">
       </span>
       <span class="caret">
       </span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
<?php
        load_view("templates/headerdd.php", array("links"=>Funs::headerddlist()));
?>
      </ul>
     </li>
    </ul>
   </div>
  </header>
