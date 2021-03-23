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
      include('view/beyou/profile.php');
      break;

    case 'home':
      include('view/beyou/home.php');
      break;
    
    case 'dashboard':
      include('view/beyou/dashboard.php');
      break;

    case 'challenge':
      include('view/beyou/challenge.php');
      break;

    // Report related views --------------------------------------------------------------------------------------------------



    // Admin related views ---------------------------------------------------------------------------------------------------

    // research menu options
    case 'research_admin':
      include("view/admin/research/va_research.php");
      break;
    
    case 'upload_mbrfcr_data':
      include("view/admin/research/va_uploadmbrfcr.php"); 
      break;


      
    // user menu options  
    case 'uploadstaff':
      include("view/admin/va_upload_staff_file.php");        
      break;

      

  }

?>