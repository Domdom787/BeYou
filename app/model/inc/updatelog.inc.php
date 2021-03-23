<?php  

  function update_import_log($data_type, $file_name, $numrecords, $discription) {
    include("dbconn.inc.php");

    $sql = '
      INSERT INTO log_imports
             (data_type, 
             file_name, 
             num_records, 
             discription)
      VALUES ("' . $data_type . '",
              "' . $file_name . '",
              "' . $numrecords . '",
              "' .$discription . '");
      ';

      mysqli_query($conn, $sql);
      mysqli_close($conn);
  }


?>