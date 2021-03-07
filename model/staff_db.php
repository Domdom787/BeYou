<?php

  
  // First check if we updating via a 1) uploaded file 2) a user update or 3) a scheduled task
  if(isset($_POST["submit"])) {
    //check if file included
    if($_FILES['file']['name']) {      
      $filename = explode(".", $_FILES['file']['name']);
      // check if it is a csv file
      if($filename[1] == 'csv') {        

        uploadstaffdetails($filename);
        
      } // end if file format check
    } // end if  a file was submitted
  } // end if submit button was pressed


  // Cost Center function: Check if it exists and if NOT then ADD
  function add_costcenter ($id, $name) {
    
    include("inc/dbconn.inc.php");

    $sql = "SELECT * FROM lk_costcenter WHERE CostCenterCode = '" . $id . "';";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      $outcome = "exists";
      return $outcome; 

    } else {
      
      $sql = "INSERT INTO lk_costcenter (CostCenterCode, CostCenterName) VALUES ('" . $id . "', '" . $name . "');";
      mysqli_query($conn, $sql);
      mysqli_close($conn);
      $outcome = "added";
      return $outcome;  
    }
  } // End function
  
   // Business Unit function: Check if it exists and if NOT then ADD
   function add_businessunit ($id, $name) {  

    include("inc/dbconn.inc.php");

    $sql = "SELECT * FROM lk_businessunit WHERE BusinessUnitCode = " . $id . ";";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      
      $outcome = "exists";
      return $outcome; 

    } else {
      
      $sql = "INSERT INTO lk_businessunit (BusinessUnitCode, BusinessUnitName) VALUES (" . $id . ", '" . $name . "');";
      mysqli_query($conn, $sql);
      mysqli_close($conn);
      $outcome = "added";
      return $outcome;  
    }
  } // End function

  // Division function: Check if it exists and if NOT then ADD
  function add_division ($id, $name) {
    
    include("inc/dbconn.inc.php");

    $sql = "SELECT * FROM lk_division WHERE DivisionCode = " . $id . ";";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      
      $outcome = "exists";
      return $outcome; 

    } else {
      
      $sql = "INSERT INTO lk_division (DivisionCode, DivisionName) VALUES (" . $id . ", '" . $name . "');";
      mysqli_query($conn, $sql);
      mysqli_close($conn);
      $outcome = "added";
      return $outcome;  
    }
  } // End function

  // Department function: Check if it exists and if NOT then ADD
  function add_department ($id, $name) {
  
    include("inc/dbconn.inc.php");

    $sql = "SELECT * FROM lk_department WHERE DepartmentID = " . $id . ";";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      
      $outcome = "exists";
      return $outcome; 

    } else {
      
      $sql = "INSERT INTO lk_department (DepartmentID, DeparmentName) VALUES (" . $id . ", '" . $name . "');";
      mysqli_query($conn, $sql);
      mysqli_close($conn);
      $outcome = "added";
      return $outcome;  
    }
  } // End function

  // Discovery Team function: Check if it exists and if NOT then ADD
  function add_discteam ($id, $name) {
  
    include("inc/dbconn.inc.php");

    $sql = "SELECT * FROM lk_discoveryteam WHERE DiscoveryTeamID = " . $id . ";";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      
      $outcome = "exists";
      return $outcome; 

    } else {
      
      $sql = "INSERT INTO lk_discoveryteam (DiscoveryTeamID, DiscoveryTeamName) VALUES (" . $id . ", '" . $name . "');";
      mysqli_query($conn, $sql);
      mysqli_close($conn);
      $outcome = "added";
      return $outcome;  
    }
  } // End function

  // Job Title function: Check if it exists and if NOT then ADD
  function add_jobtitle ($id, $name) {
  
    include("inc/dbconn.inc.php");

    $sql = "SELECT * FROM lk_jobtitle WHERE JobTitleCode = " . $id . ";";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      
      $outcome = "exists";
      return $outcome; 

    } else {
      
      $sql = "INSERT INTO lk_jobtitle (JobTitleCode, JobTitleName) VALUES (" . $id . ", '" . $name . "');";
      mysqli_query($conn, $sql);
      mysqli_close($conn);
      $outcome = "added";
      return $outcome;  
    }
  } // End function

  // Job Level function: Check if it exists and if NOT then ADD
  function add_joblevel ($name) {
  
    include("inc/dbconn.inc.php");

    $sql = "SELECT * FROM lk_joblevel WHERE JobLevelName LIKE '" . $name . "';";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      
      $outcome = "exists";
      return $outcome; 

    } else {
      
      $sql = "INSERT INTO lk_joblevel (JobLevelName) VALUES ('" . $name . "');";
      mysqli_query($conn, $sql);
      mysqli_close($conn);
      $outcome = "added";
      return $outcome;  
    }
  } // End function

  // IAS Category function: Check if it exists and if NOT then ADD
  function add_iascat ($name) {
  
    include("inc/dbconn.inc.php");

    $sql = "SELECT * FROM inc_category WHERE CategoryName LIKE '" . $name . "';";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      
      $outcome = "exists";
      return $outcome; 

    } else {
      
      $sql = "INSERT INTO inc_category (CategoryName) VALUES ('" . $name . "');";
      mysqli_query($conn, $sql);
      mysqli_close($conn);
      $outcome = "added";
      return $outcome;  
    }
  } // End function

  // Update bu_user
  function add_buuser ($record) {
    include("inc/dbconn.inc.php");    

    $Entity     = $record['Entity'];
    $Username   = $record['Username'];
    $KnownAs    = $record['Knownas'];
    $Surname    = $record['Surname'];
    $JoinDate   = date("Y-m-d", strtotime($record['JobEntryDate']));

    $sql = "SELECT * FROM bu_user WHERE Entity LIKE '" . $Entity . "';";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

      $sql = "UPDATE bu_user 
              SET (Username = '" . $Username . "', 
                   KnownAsName = '" . $KnownAs . "',
                   Surname = '" . $Surname . "',
                   DiscoveryJoinDate'" . $JoinDate . "')
              WHERE Entity = '" . $Entity . "';"; 

      mysqli_query($conn, $sql);
      mysqli_close($conn);
      $outcome = "updated";
      return $outcome;           

    } else {

      $sql = "INSERT INTO bu_user (Entity,Username,KnownAsName,Surname,DiscoveryJoinDate) 
              VALUES ('" . $Entity . "',
                      '" . $Username . "',
                      '" . $KnownAs . "',
                      '" . $Surname . "',
                      '" . $JoinDate . "');";

      mysqli_query($conn, $sql);
      mysqli_close($conn);
      $outcome = "added";
      return $outcome;
    }
  }
 
  // Get the Incentive cat ID given the name
  function getIncCatID($IncCatName) {
    include("inc/dbconn.inc.php"); 

    $sql = "SELECT * FROM inc_category WHERE CategoryName LIKE '" . $IncCatName . "';";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($conn);

    return $row["CategoryID"];

  }

  // Get the Incentive cat ID given the name
  function getJobLevelID($JobLevelName) {
    include("inc/dbconn.inc.php"); 

    $sql = "SELECT * FROM lk_joblevel WHERE JobLevelName LIKE '" . $JobLevelName . "';";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($conn);

    return $row["JobLevelID"];

  }

  // If any attribute has changed then will add a new record for the user and updte the existing records eff_todate
  function add_staffattribute($user_id, $record) {

    include("inc/dbconn.inc.php"); 

    $date = date("Y-m-d");
    
    //First update the existing db record with todays date as the Eff_ToDate
    $sql = "UPDATE bu_staffattributes SET Eff_ToDate = '" . $date . "' WHERE id = " . $user_id . ";";
    mysqli_query($conn, $sql);

    //Second insert a new record in DB with the new attributes
    $incCatID   = getIncCatID($record['IASCategory']);
    $jobLevelID = getJobLevelID($record['JobLevel']);      

    $sql = "INSERT INTO bu_staffattributes 
                    (Entity,
                    JobCode,
                    JobLevelId,
                    EmployeeClass,
                    LineManagerEntity,
                    BusinessUnitCode,
                    DivisionCode,
                    CostCenterCode,
                    DepartmentCode,
                    DiscoveryTeamCode,
                    IncCategoryId
                    ) 
            VALUES ('" . $record['Entity'] . "',
                    '" . $record['JobCode'] . "',
                      " . $jobLevelID . ",
                    '" . $record['EmpClass'] . "',
                    '" . $record['LineManager'] . "',
                    '" . $record['BusUnitCode'] . "',
                    '" . $record['DivisionCode']  . "',
                    '" . $record['CostCenterCode']  . "',
                    '" . $record['DepartmentCode']  . "',
                    '" . $record['DiscTeamCode']  . "',
                      " . $incCatID . ");";

    mysqli_query($conn, $sql);
    mysqli_close($conn);
    $outcome = "New Record";    
    return $outcome;

  }

  // Function to add or update a users attributes
  function update_staff_attributes($record) {
    include("inc/dbconn.inc.php"); 

    $Entity     = $record['Entity'];

    $sql = "SELECT * FROM bu_staffattributes WHERE Entity LIKE '" . $Entity . "' AND Eff_ToDate = '9999-12-31';";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);        

    $user_id = $row['id'];    //use this to update the Eff_ToDate of the existing record

    //if user in DB then check and update any attributes that have changed
    if (mysqli_num_rows($result) > 0) {
      $NeedUpdate = 0;      
      
      $NeedUpdate += abs(strcmp($record['JobCode'],$row['JobCode']));
      $NeedUpdate += (getJobLevelID($record['JobLevel']) == intval($row['JobLevelId'])) ? 0 : 1;
      $NeedUpdate += abs(strcmp($record['EmpClass'],$row['EmployeeClass']));
      $NeedUpdate += abs(strcmp($record['LineManager'],$row['LineManagerEntity']));
      $NeedUpdate += abs(strcmp($record['BusUnitCode'],$row['BusinessUnitCode']));
      $NeedUpdate += abs(strcmp($record['DivisionCode'],$row['DivisionCode']));
      $NeedUpdate += abs(strcmp($record['CostCenterCode'],$row['CostCenterCode']));
      $NeedUpdate += abs(strcmp($record['DepartmentCode'],$row['DepartmentCode']));
      $NeedUpdate += abs(strcmp($record['DiscTeamCode'],$row['DiscoveryTeamCode']));
      $NeedUpdate += (getIncCatID($record['IASCategory']) == $row['IncCategoryId']) ? 0 : 1;
      
      if ($NeedUpdate > 0) {
        //Run the update funciton. Update existing record Eff_ToDate and Insert new record
        add_staffattribute($user_id, $record);       

      } 
    
    } else {
      //Add in the new staff member
      $incCatID   = getIncCatID($record['IASCategory']);
      $jobLevelID = getJobLevelID($record['JobLevel']);      

      $sql = "INSERT INTO bu_staffattributes 
                     (Entity,
                     JobCode,
                     JobLevelId,
                     EmployeeClass,
                     LineManagerEntity,
                     BusinessUnitCode,
                     DivisionCode,
                     CostCenterCode,
                     DepartmentCode,
                     DiscoveryTeamCode,
                     IncCategoryId
                     ) 
              VALUES ('" . $record['Entity'] . "',
                      '" . $record['JobCode'] . "',
                       " . $jobLevelID . ",
                      '" . $record['EmpClass'] . "',
                      '" . $record['LineManager'] . "',
                      '" . $record['BusUnitCode'] . "',
                      '" . $record['DivisionCode']  . "',
                      '" . $record['CostCenterCode']  . "',
                      '" . $record['DepartmentCode']  . "',
                      '" . $record['DiscTeamCode']  . "',
                       " . $incCatID . ");";

      mysqli_query($conn, $sql);
      $outcome = "added";
      mysqli_close($conn);
      echo "Added NEW user with entity: " . $record['Entity'] . "<br>";
      return $outcome;
    }

  }


  // Function for when a admin user uploads a staff file
  function uploadstaffdetails($filename){
    include("inc/dbconn.inc.php");

    $handle = fopen($_FILES['file']['tmp_name'], "r");

    $row = 0;

    //while($data = fgetcsv($handle,10000,"|")) {
    while (($raw_string = fgets($handle)) !== false) {

      $data = str_getcsv($raw_string,"|");

      //skip header row
      $row++;
      if( $row == 1 ) {            
        continue;
      } else {

        $record = array(
          "Entity"        => mysqli_real_escape_string($conn, $data[0]),
          "Username"      => mysqli_real_escape_string($conn, $data[1]),
          "Knownas"       => mysqli_real_escape_string($conn, $data[2]),
          "Surname"       => mysqli_real_escape_string($conn, $data[3]),
          "StartDate"     => mysqli_real_escape_string($conn, $data[4]),
          // Squency is the 5 element in arrayc. No need for this value
          "EndDate"       => mysqli_real_escape_string($conn, $data[6]),
          "EmpStatus"     => mysqli_real_escape_string($conn, $data[7]),
          "EmpClass"      => mysqli_real_escape_string($conn, $data[8]),
          "LineManager"   => mysqli_real_escape_string($conn, $data[9]),
          "JobCode"       => mysqli_real_escape_string($conn, $data[10]),
          "JobTitle"      => mysqli_real_escape_string($conn, $data[11]),
          "JobEntryDate"  => mysqli_real_escape_string($conn, $data[12]),
          "JobLevel"      => mysqli_real_escape_string($conn, $data[13]),
          "CostCenterCode"=> mysqli_real_escape_string($conn, $data[14]),
          "CostCenterName"=> mysqli_real_escape_string($conn, $data[15]),
          "BusUnitCode"   => mysqli_real_escape_string($conn, $data[16]),
          "BusUnitName"   => mysqli_real_escape_string($conn, $data[17]),
          "DivisionCode"  => mysqli_real_escape_string($conn, $data[18]),
          "DivisionName"  => mysqli_real_escape_string($conn, $data[19]),
          "DepartmentCode"=> mysqli_real_escape_string($conn, $data[20]),
          "DepartmentName"=> mysqli_real_escape_string($conn, $data[21]),
          "DiscTeamCode"  => mysqli_real_escape_string($conn, $data[22]),
          "DiscTeamName"  => mysqli_real_escape_string($conn, $data[23]),
          "IASCategory"   => mysqli_real_escape_string($conn, $data[24])
        );
        
        // Check the csv has values. Only if it does then create the new lk value
        if(strlen($record['CostCenterCode']) != 0) {
          add_costcenter($record['CostCenterCode'], $record['CostCenterName']);
        };

        if(strlen($record['BusUnitCode']) != 0) {
          add_businessunit($record['BusUnitCode'], $record['BusUnitName']);
        };

        if(strlen($record['DivisionCode']) != 0) {
          add_division($record['DivisionCode'],$record['DivisionName']);
        };

        if(strlen($record['DepartmentCode']) != 0) {
          add_department($record['DepartmentCode'],$record['DepartmentName']);
        };

        if(strlen($record['DiscTeamCode']) != 0) {
          add_discteam($record['DiscTeamCode'],$record['DiscTeamName']);
        };

        if(strlen($record['JobCode']) != 0) {
          add_jobtitle($record['JobCode'],$record['JobTitle']);
        };    

        if(strlen($record['JobLevel']) != 0) {
          add_joblevel($record['JobLevel']);
        };   
        
        if(strlen($record['IASCategory']) != 0) {
          add_iascat($record['IASCategory']);
        };  

        //Add bu user
        add_buuser($record);

        update_staff_attributes($record);        

      }     

      set_time_limit(10);     

    } // end while loop

    fclose($handle);
  } // End uploadstaffdetails function
?>