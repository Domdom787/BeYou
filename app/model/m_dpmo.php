<?php

  function getDPMO_Data () {
    include("inc/dbconn.inc.php");

    $baseurl = "https://gssapi.discovery.co.za/QMC_API/api/Qmc/";
    $AuthKey = "77A6B132-4A3A-494F-BE5F-9F289D56A3EB";
    $date = "2021-03-29";
    $tokenPrefix = "Exact_SharePoint_App~";
    $token = "ee3adaca-9cce-47b8-be64-e80cbf50fef7";

    $url = $baseurl . "GetAgentAuditResultsViaAuditPeriod?date=".$date;
    
    $ch = curl_init(); 

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Authorization: ' . $tokenPrefix . $token
      ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);

    $result = curl_exec($ch);
    curl_close($ch);
    
    $data = json_decode($result, true);
    $numrecords = count($data);
    

    for ($i=0; $i < $numrecords; $i++) { 
      $record = array(
        "period_id"      => mysqli_real_escape_string($conn, $data[$i]["AuditPeriodID"]),
        "period_name"    => mysqli_real_escape_string($conn, $data[$i]["AuditPeriodName"]),
        "int_id"         => mysqli_real_escape_string($conn, $data[$i]["InteractionReference"]),
        "int_date"       => date("Y-m-d H:i:s", strtotime($data[$i]["InteractionDate"])),
        "agent_entity"   => mysqli_real_escape_string($conn, $data[$i]["AgentEntityName"]),
        "tl_entity"      => mysqli_real_escape_string($conn, $data[$i]["TeamLeadEntityName"]),
        "audit_id"       => mysqli_real_escape_string($conn, $data[$i]["AuditID"]),
        "audit_date"     => date("Y-m-d H:i:s", strtotime($data[$i]["AuditDate"])),
        "std_opp"        => mysqli_real_escape_string($conn, $data[$i]["NumberOfStandardOpportunities"]),
        "std_defect"     => mysqli_real_escape_string($conn, $data[$i]["NumberOfStandardDefects"]),
        "quant_opp"      => mysqli_real_escape_string($conn, $data[$i]["NumberOfQuantOpp"]),
        "quant_defect"   => mysqli_real_escape_string($conn, $data[$i]["NumberOfQuantDefects"]),
        "qual_opp"       => mysqli_real_escape_string($conn, $data[$i]["NumberOfQualOpp"]),
        "qual_defect"    => mysqli_real_escape_string($conn, $data[$i]["NumberOfQualDefects"])
      );

      //Check if each record exists
      $id = auditExists($record["audit_id"]);

      if ($id == 0) {        
        insertDPMO($record);
      } else {
        updateDPMO($record, $id);
      }  
      
      set_time_limit(10); 
    } // end for loop    
  }


  function updateDPMO ($record, $id) {
    include("inc/dbconn.inc.php");

    $sql = '
    UPDATE `data_dpmo` 
    SET 
        `audit_period_id`="'. $record["period_id"] .'",
        `audit_period_name`="'. $record["period_name"] .'",
        `interaction_id`="'. $record["int_id"] .'",
        `interaction_date`="'. $record["int_date"] .'",
        `agent_entity`="'. $record["agent_entity"] .'",
        `team_leader_entity`="'. $record["tl_entity"] .'",        
        `audit_date`="'. $record["audit_date"] .'",
        `standard_opportunities`='. $record["std_opp"] .',
        `standard_defects`='. $record["std_defect"] .',
        `quant_opportunities`='. $record["quant_opp"] .',
        `quant_defects`='. $record["quant_defect"] .',
        `qual_opportunities`='. $record["qual_opp"] .',
        `qual_defects`='. $record["qual_defect"] .',
        `date_updated`="'. date("Y-m-d H:i:s") .'" 
    WHERE `id`='.$id;
    
    mysqli_query($conn, $sql); 
    
    echo "updateDPMO: Updated record on ID " . $id . "<br>";

    mysqli_close($conn);

  }

  function auditExists ($auditID) {
    include("inc/dbconn.inc.php");

    $sql = 'SELECT id FROM data_dpmo WHERE audit_id='.$auditID;

    $id = mysqli_query($conn, $sql);  

    if(mysqli_num_rows($id) > 0 ) {
      echo "auditExists: Found a record for audiID " . $auditID . "<br>";
      return $result;
    } else {
      echo "auditExists: No Record for audiID " . $auditID . "<br>";
      return 0;

    }

    mysqli_close($conn);
  }


  function insertDPMO ($record) {
    include("inc/dbconn.inc.php");
    echo "insertDPMO: Started <br>";

    $sql = '
    INSERT INTO `data_dpmo`
      (`audit_period_id`, 
      `audit_period_name`, 
      `interaction_id`, 
      `interaction_date`, 
      `agent_entity`, 
      `team_leader_entity`, 
      `audit_id`, 
      `audit_date`, 
      `standard_opportunities`, 
      `standard_defects`, 
      `quant_opportunities`, 
      `quant_defects`, 
      `qual_opportunities`, 
      `qual_defects`) 
    VALUES 
      ("'. $record["period_id"] .'",
      "'. $record["period_name"] .'",
      "'. $record["int_id"] .'",
      "'. $record["int_date"] .'",
      "'. $record["agent_entity"] .'",
      "'. $record["tl_entity"] .'",
      "'. $record["audit_id"] .'",
      "'. $record["audit_date"] .'",      
      '. $record["std_opp"] .',
      '. $record["std_defect"] .',
      '. $record["quant_opp"] .',
      '. $record["quant_defect"] .',
      '. $record["qual_opp"] .',
      '. $record["qual_defect"].")";
      
    
    mysqli_query($conn, $sql); 
    echo "insertDPMO: Inserted a record for  AuditID " . $record["audit_id"] . "<br>";

    mysqli_close($conn);

  }
?>