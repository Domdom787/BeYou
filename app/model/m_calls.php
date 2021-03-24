<?php
  // model to upload call data, calculate the call statistics given parameters.

  function call_data_in_file($file,$filetitle) {    

    $filename = explode(".", $file);
    // check if it is a csv file
    if($filename[1] == 'csv') {  

      $handle = fopen($file, "r");
      $data = array();

      while (!feof($handle)) {
        $data[] = fgetcsv($handle, null, ',');
      }

      fclose($handle);          
      import_call_data($data,$filetitle);

    }
  } // END import_call_data function


  function import_call_data($data,$filetitle) {
    include("inc/dbconn.inc.php");

    $numrecords = count($data);

    for($i = 1; $i < $numrecords; $i++) {

      $record = array(
        "entity"          => mysqli_real_escape_string($conn, $data[$i][0]),
        "data_date"       => date("Y-m-d", strtotime(mysqli_real_escape_string($conn, $data[$i][1]))),
        "call_count"      => mysqli_real_escape_string($conn, $data[$i][2]),
        "tot_handle_time" => mysqli_real_escape_string($conn, $data[$i][3]),
        "tot_hold_time"   => mysqli_real_escape_string($conn, $data[$i][4]),
        "hold_count"      => mysqli_real_escape_string($conn, $data[$i][5]),
        "trf_count"       => mysqli_real_escape_string($conn, $data[$i][6])
      );

      if($record['entity'] <> "") {
        $sql = "INSERT INTO data_call 
                    (entity,
                    data_date,
                    call_count,
                    total_handle_time,
                    total_hold_time,
                    hold_count,
                    transfer_count) 
              VALUES ('" . $record['entity'] . "',
                      '" . $record['data_date'] . "',
                      '" . $record['call_count'] . "',
                      '" . $record['tot_handle_time'] . "',
                      '" . $record['tot_hold_time'] . "',
                      '" . $record['hold_count'] . "',
                      '" . $record['trf_count'] . "');";

        mysqli_query($conn, $sql);
      }
    }

    mysqli_close($conn);

    // Update the log fiel with the import
    $imported_records = $numrecords - 2;    
    update_import_log("call",$filetitle,$imported_records,"");
       
    
  } // END import_call_data function

?>