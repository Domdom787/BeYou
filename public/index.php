
<?php
  include("../app/view/inc/header.inc.php");
 


  

  if (isset($_POST['a'])) {
    $action = $_POST['a'];
  } else if (isset($_GET['a'])) {
    $action = $_GET['a'];
  } else {
    $action = 'dashboard';
  }

  $a = strtolower($action);
  switch ($action) {
    case 'dashboard':
      include('../app/view/dashboard.php');
      break;

    case 'uploadstaff':
      include("../app/view/admin/f_upload_staff_file.php");
      break;
  }



  include("../app/view/inc/footer.inc.php");
 
?>
