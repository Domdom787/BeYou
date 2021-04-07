<?php


// ------------ UPLOAD STAFF functions -----------------------------------------------------
  // Function for when a admin user uploads a staff file
  function uploadstaffdetails($data){
    include("inc/dbconn.inc.php");

    $numrecords = count($data);

    for($i = 1; $i < $numrecords; $i++) {

        $record = array(
          "Username"      => mysqli_real_escape_string($conn, $data[$i][1]),
          "Entity"        => mysqli_real_escape_string($conn, $data[$i][0]),
          "Knownas"       => mysqli_real_escape_string($conn, $data[$i][2]),
          "Surname"       => mysqli_real_escape_string($conn, $data[$i][3]),
          "StartDate"     => mysqli_real_escape_string($conn, $data[$i][4]),
          // Sequence umber is the 5 element in array. No need for this value
          "EndDate"       => mysqli_real_escape_string($conn, $data[$i][6]),
          "EmpStatus"     => mysqli_real_escape_string($conn, $data[$i][7]),
          "EmpClass"      => mysqli_real_escape_string($conn, $data[$i][8]),
          "LineManager"   => mysqli_real_escape_string($conn, $data[$i][9]),
          "JobCode"       => mysqli_real_escape_string($conn, $data[$i][10]),
          "JobTitle"      => mysqli_real_escape_string($conn, $data[$i][11]),
          "JobEntryDate"  => mysqli_real_escape_string($conn, $data[$i][12]),
          "JobLevel"      => mysqli_real_escape_string($conn, $data[$i][13]),
          "CostCenterCode"=> mysqli_real_escape_string($conn, $data[$i][14]),
          "CostCenterName"=> mysqli_real_escape_string($conn, $data[$i][15]),
          "BusUnitCode"   => mysqli_real_escape_string($conn, $data[$i][16]),
          "BusUnitName"   => mysqli_real_escape_string($conn, $data[$i][17]),
          "DivisionCode"  => mysqli_real_escape_string($conn, $data[$i][18]),
          "DivisionName"  => mysqli_real_escape_string($conn, $data[$i][19]),
          "DepartmentCode"=> mysqli_real_escape_string($conn, $data[$i][20]),
          "DepartmentName"=> mysqli_real_escape_string($conn, $data[$i][21]),
          "DiscTeamCode"  => mysqli_real_escape_string($conn, $data[$i][22]),
          "DiscTeamName"  => mysqli_real_escape_string($conn, $data[$i][23]),
          "IASCategory"   => mysqli_real_escape_string($conn, $data[$i][24])
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

        update_staff_attributes($record);                        
        
        //Add bu user
        add_buuser($record);        

      set_time_limit(10);     

    } // end loop through data array  
    
    //header("Location: ../index.php");
    return $numrecords;
    exit();

  } // End uploadstaffdetails function


// --------- Upload staff detail | Helper or additional functions ------------

  // Cost Center function: Check if it exists and if NOT then ADD
  function add_costcenter ($id, $name) {
    
    include("inc/dbconn.inc.php");

    $sql = "SELECT * FROM lk_costcenter WHERE CostCenterCode = '" . $id . "';";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      $outcome = "cost center exists";      
      return $outcome;
    } else {
      
      $sql = "INSERT INTO lk_costcenter (CostCenterCode, CostCenterName) VALUES ('" . $id . "', '" . $name . "');";
      mysqli_query($conn, $sql);
      mysqli_close($conn);

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

  // Get the Job Lvel ID given the Job Level name
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

    if(strlen($incCatID) == 0) {
      $incCatID = 0;
    }

    if(strlen($jobLevelID) == 0) {
      $incCatID = 0;
    }

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
        //Run the update function. Update existing record Eff_ToDate and Insert new record
        add_staffattribute($user_id, $record);       

      } 
    
    } else {
      //Add in the new staff member
      $incCatID   = getIncCatID($record['IASCategory']);
      $jobLevelID = getJobLevelID($record['JobLevel']);      

      if(strlen($incCatID) == 0) {
        $incCatID = 0;
      }

      if(strlen($jobLevelID) == 0) {
        $incCatID = 0;
      }

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
    }

  }

  // ----------------- Functions for the Maintain users menu option -----------------------------
  // Function to get Staff details given the entity 
  function getUserDetails($entity) {
    include("inc/dbconn.inc.php");

    $sql = "
        SELECT u.Entity,
        u.Username,
        u.KnownAsName,
        u.Surname,
        a.JobCode,
        jt.JobTitleName,
        a.JobLevelId,
        jl.JobLevelName,
        a.BusinessUnitCode,
        b.BusinessUnitName,
        a.CostCenterCode,
        cc.CostCenterName,
        a.DepartmentCode,
        d.DeparmentName,
        a.DiscoveryTeamCode,
        t.DiscoveryTeamName,
        a.RegionId,
        r.RegionName,
        a.ServiceTeamId,
        st.ServiceTeamName,
        a.SkillId,
        sk.SkillName,
        a.IncCategoryId,
        i.CategoryName
        
    FROM bu_user u
      LEFT JOIN bu_staffattributes a ON u.Entity = a.Entity
      LEFT JOIN lk_jobtitle jt ON a.JobCode = jt.JobTitleCode
      LEFT JOIN lk_joblevel jl on a.JobLevelId = jl.JobLevelID
      LEFT JOIN lk_businessunit b on b.BusinessUnitCode = a.BusinessUnitCode
      LEFT JOIN lk_costcenter cc on cc.CostCenterCode = a.CostCenterCode
      LEFT JOIN lk_department d on d.DepartmentID = a.DepartmentCode
      LEFT JOIN lk_discoveryteam t on t.DiscoveryTeamID = a.DiscoveryTeamCode
      LEFT JOIN lk_division ds on ds.DivisionCode = a.DivisionCode
      LEFT JOIN lk_region r on r.RegionID = r.RegionName
      LEFT JOIN lk_serviceteam st on st.ServiceTeamID = a.ServiceTeamId
      left JOIN lk_skill sk on sk.SkillID = a.SkillId
      LEFT JOIN inc_category i on i.CategoryID = a.IncCategoryId
        
    WHERE u.entity = " . $entity . " and a.Eff_ToDate = '9999-12-31'
    ";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    mysqli_close($conn); 

    return $row;

  }

  function getAllUsers() {
    include("inc/dbconn.inc.php");

    $sql = "
        SELECT u.Entity,
        u.Username,
        u.KnownAsName,
        u.Surname,
        a.JobCode,
        jt.JobTitleName,
        a.JobLevelId,
        jl.JobLevelName,
        a.BusinessUnitCode,
        b.BusinessUnitName,
        a.CostCenterCode,
        cc.CostCenterName,
        a.DepartmentCode,
        d.DeparmentName,
        a.DiscoveryTeamCode,
        t.DiscoveryTeamName,
        a.LineManagerEntity,
        a.RegionId,
        r.RegionName,
        a.ServiceTeamId,
        st.ServiceTeamName,
        a.SkillId,
        sk.SkillName,
        a.IncCategoryId,
        i.CategoryName
        
    FROM bu_user u
      LEFT JOIN bu_staffattributes a ON u.Entity = a.Entity
      LEFT JOIN lk_jobtitle jt ON a.JobCode = jt.JobTitleCode
      LEFT JOIN lk_joblevel jl on a.JobLevelId = jl.JobLevelID
      LEFT JOIN lk_businessunit b on b.BusinessUnitCode = a.BusinessUnitCode
      LEFT JOIN lk_costcenter cc on cc.CostCenterCode = a.CostCenterCode
      LEFT JOIN lk_department d on d.DepartmentID = a.DepartmentCode
      LEFT JOIN lk_discoveryteam t on t.DiscoveryTeamID = a.DiscoveryTeamCode
      LEFT JOIN lk_division ds on ds.DivisionCode = a.DivisionCode
      LEFT JOIN lk_region r on r.RegionID = r.RegionName
      LEFT JOIN lk_serviceteam st on st.ServiceTeamID = a.ServiceTeamId
      left JOIN lk_skill sk on sk.SkillID = a.SkillId
      LEFT JOIN inc_category i on i.CategoryID = a.IncCategoryId
        
    WHERE a.Eff_ToDate = '9999-12-31'
    ORDER by b.BusinessUnitName,
		        ds.DivisionName,
            d.DeparmentName,
            cc.CostCenterName,
            t.DiscoveryTeamName,
            a.LineManagerEntity;
    
    ";

    $result = mysqli_query($conn, $sql);    

    mysqli_close($conn); 

    return $result;

  }

  // --------- GENERAL user related functions -----------------------------------
  // get user's name given entity
  function getUsersName($entity) {
    include("inc/dbconn.inc.php");
    $sql = "SELECT KnownAsName, Surname FROM bu_user WHERE Entity = " . $entity . ";";
    $result = mysqli_query($conn, $sql); 
    mysqli_close($conn); 
    $row = mysqli_fetch_assoc($result);
    $name = $row["KnownAsName"] . ' ' . $row["Surname"];

    return $name;
  }

  // get user's direct reports given a line manager entity
  function getUserTeam($entity) {
    include("inc/dbconn.inc.php");
    $sql = "SELECT Entity FROM bu_staffattributes WHERE LineManagerEntity = " . $entity . ";";
    $result = mysqli_query($conn, $sql); 
    mysqli_close($conn); 
    

    return $result;

  }

?>