<?php
  // The controller will read the url and route the user to the selected page and pass on any Get or post value to the model or view

  if(isset($_GET['url'])) {
    $action = strtolower($_GET['url']);
  } else {
    $action = 'home';
  }

  
  
  switch ($action) {

    // General related views ---------------------------------------------------------------------------------------------------
    case 'profile':
      include('view/profile.php');
      break;

    case 'home':
      include('view/home.php');
      break;
    
    case 'dashboard':
      include('view/dashboard.php');
      break;

    case 'challenge':
      include('view/challenge.php');
      break;

    // Report related views --------------------------------------------------------------------------------------------------



    // Admin related views ---------------------------------------------------------------------------------------------------

    case 'uploadstaff':
      include("view/admin/va_upload_staff_file.php");        
      break;

  }

?>