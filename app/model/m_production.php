<?php
  // model to upload production data, calculate the production statistics given parameters.

  function production_data_in_file($file,$filetitle) {    

    $filename = explode(".", $file);
    // check if it is a csv file
    if($filename[1] == 'csv') {  

      $handle = fopen($file, "r");
      $data = array();

      while (!feof($handle)) {
        $data[] = fgetcsv($handle, null, ',');
      }

      fclose($handle);          
      import_production_data($data,$filetitle);

    }
  } // END produciton_data_in_file function


  function import_production_data($data,$filetitle) {
    include("inc/dbconn.inc.php");

    $numrecords = count($data);

    for($i = 1; $i < $numrecords; $i++) {      

      $record = array(
        "entity"            => mysqli_real_escape_string($conn, $data[$i][5]),
        "data_date"         => date("Y-m-d", strtotime(mysqli_real_escape_string($conn, $data[$i][14]))),
        "job_level"         => mysqli_real_escape_string($conn, $data[$i][3]),
        "job_title"         => mysqli_real_escape_string($conn, $data[$i][4]),
        "manager_entity"    => mysqli_real_escape_string($conn, $data[$i][6]),
        "division"          => mysqli_real_escape_string($conn, $data[$i][2]),
        "department"        => mysqli_real_escape_string($conn, $data[$i][1]),
        "team"              => mysqli_real_escape_string($conn, $data[$i][0]),
        "process_type_id"   => mysqli_real_escape_string($conn, $data[$i][7]),
        "process_type_name" => mysqli_real_escape_string($conn, $data[$i][8]),
        "action_id"         => mysqli_real_escape_string($conn, $data[$i][9]),
        "action_name"       => mysqli_real_escape_string($conn, $data[$i][10]),
        "pool_id"           => mysqli_real_escape_string($conn, $data[$i][11]),
        "pool_name"         => mysqli_real_escape_string($conn, $data[$i][12]),
        "production_count"  => mysqli_real_escape_string($conn, $data[$i][13])
      );

      // first check if there are duplicates befoe inserting

      if($record['entity'] <> "") {
        $sql = "INSERT INTO data_production 
                    (entity,
                    data_date,
                    job_level, 
                    job_title, 
                    manager_entity, 
                    division, 
                    department, 
                    team, 
                    process_type_id, 
                    process_type_name, 
                    action_id, 
                    action_name, 
                    pool_id, 
                    pool_name, 
                    production_count) 
              VALUES ('" . $record['entity'] . "',
                      '" . $record['data_date'] . "',
                      '" . $record['job_level'] . "',
                      '" . $record['job_title'] . "',
                      '" . $record['manager_entity'] . "',
                      '" . $record['division'] . "',
                      '" . $record['department'] . "',
                      '" . $record['team'] . "',
                      '" . $record['process_type_id'] . "',
                      '" . $record['process_type_name'] . "',
                      '" . $record['action_id'] . "',
                      '" . $record['action_name'] . "',
                      '" . $record['pool_id'] . "',
                      '" . $record['pool_name'] . "',
                      '" . $record['production_count'] . "');";

        mysqli_query($conn, $sql);
      }
    }

    mysqli_close($conn);

    // Update the log fiel with the import
    $imported_records = $numrecords - 2;    
    update_import_log("production",$filetitle,$imported_records,"");
       
    
  } // END import_call_data function

?>