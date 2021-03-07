<?php

  include("../models/inc/dbconn.inc.php");



  // create functions to do the various checks against the lookup tables
  // check if staff member exists


  // get id for cost center. if does not exist then add to lookup table



  if(isset($_POST["submit"])) {

    //check if file included
    if($_FILES['file']['name']) {
      
      $filename = explode(".", $_FILES['file']['name']);
      // check if it is a csv file
      if($filename[1] == 'csv') {

        $handle = fopen($_FILES['file']['tmp_name'], "r");

        $row = 0;

        while($data = fgetcsv($handle)) {
          //skip header row
          $row++;
          if( $row == 1 ) {            
            continue;
          } else {

            $item1 = mysqli_real_escape_string($conn, $data[0]);
            $item2 = mysqli_real_escape_string($conn, $data[1]);

            //insert into DB
            $sql = "INSERT into lk_costcenter (CostCenterCode, CostCenterName) values ('$item1', '$item2')";

            mysqli_query($conn, $sql);

          }          

        } // end while loop

        fclose($handle);

        print "Import done";

      } // end if file format check
    } // end if  a file was submitted
  } // end if submit button was pressed

  header("../index.php");

?>