<?php
  // This is the file that will be called by the cron job. This foie will also be called when a user manually clicks to run the upload.
  
  function check_for_uploads($from_dir){

    include("inc/global_vars.inc.php");
    include("m_calls.php");
    include("m_production.php");

    $files = clean_scandir($from_dir);

    for($i=0;$i<count($files);$i++) {
      
      if(is_file($from_dir."/".$files[$i])) {
        $reportname = substr($files[$i], 0, 10);     // used to determine the data type and therefore the function to run
        $upload_file = $from_dir . "/" . $files[$i]; // used in the function to get the actual file from it locaiton
        $filetitle = $files[$i];                     // used to pass onto the log update onc eimport has run
        
        switch ($reportname) {

          case $call_report:
            if(!check_if_imported($files[$i])){
              $numrecords = call_data_in_file($upload_file,$filetitle);
              move_file($data_network_dir,$uploded_dir,$filetitle);              
            } else {
              move_file($data_network_dir,$uploded_dir,$filetitle);
            }         
            break;

          case $production_report:
            if(!check_if_imported($files[$i])){
              $numrecords = production_data_in_file($upload_file,$filetitle);
              move_file($data_network_dir,$uploded_dir,$filetitle);              
            } else {
              move_file($data_network_dir,$uploded_dir,$filetitle);
            }
            break;
        }
      }      

      set_time_limit(90);

    } // END for loop over the files
    
    

  } // END check_for_upload function

?>