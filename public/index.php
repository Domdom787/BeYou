<?php

  session_start();

  if(!isset($_SESSION['entity'])) {

    include("../app/view/v_login.php");

  } else {   

    include("../app/view/inc/header.inc.php");   

    include("../app/controller.php");

    include("../app/view/inc/footer.inc.php");

  }
  
 
?>
