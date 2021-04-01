<?php
  // This file inlcudes a bunch of function that will be used throughout the app

  // smaller helper function primarily for testing. Prints out an array in a readable way
  function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '<pre>';
  }

  // return an array of the files within a supplied directory
  // To determine whether or not you have a folder or file use the functions is_dir() and is_file()
  function clean_scandir($dir){
    return array_values(array_diff(scandir($dir),array('.','..')));
  }


  // copy files from one directory to another
  function move_file($from_dir,$to_dir,$filetitle) {
      include("global_vars.inc.php");
        
      if (!file_exists("$to_dir/$filetitle")) {
        copy("$from_dir/$filetitle", "$to_dir/$filetitle");        
      }
      
      if(file_exists("$from_dir/$filetitle") && file_exists("$to_dir/$filetitle")) {
        unlink("$from_dir/$filetitle");
      }
  } // END move_file function


  function check_if_imported($filename) {
    //function to read the log table to dermine if the file has been imported
    include("dbconn.inc.php");

    $sql = "SELECT * FROM log_imports WHERE file_name = '" . $filename . "';";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {            
      return TRUE;
    } else {
      return FALSE;
    }
  } // END Check if imported function

  
  // Update the log files with the uploads that happened
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

  // get log item give data type
  function getLogrecords($datatype) {
    include("dbconn.inc.php");

    $date = date("Y-m-d");

    $sql = '
    SELECT file_name, 
           num_records, 
           discription, 
           date_added, 
           user_entity 
    FROM log_imports 
    WHERE date_added > ' . $date . ' AND 
          data_type = "' . $datatype . '"
    ORDER BY date_added DESC';

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);    

    return $result;

  }

  

?>


