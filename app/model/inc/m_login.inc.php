<?php  

  $entity = str_replace(' ', '', $_POST["entity"]);
  
  if (strlen($entity) !== 10) {
    echo '<div class="alert alert-danger">The Entity Number length is incorrect</div>';  
    
  } else {
    //set the session var, entity to this number
    $_SESSION["entity"] = $entity;
    header("location: home");

    //get the users roles and permission and store in session var, roles
  }

?>