<?php
//  This file is to maintain all the functions relating to research surveys
//  This would include survey periods, uploading of survey data (mbr, fcr, general, sps)
//  also inlcudes creating tmbr surveys which can be assigned to tmbr agents.
//  Need to think about to cron jobs. do they only call a page (if so then have a unique page that would call each of the scheduled upload funcitons individually)
//  or can I schedule a unique function within a page and/or pass parameters as part of the cron job.

// functions required
// Survey periods

  include('../app/vendor/autoload.php') ;  // Used for xls or xlsx related files  

  use \PhpOffice\PhpSpreadsheet\Spreadsheet;
  use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;

  function upload_mbr_data($data) {
    include("inc/dbconn.inc.php");

    $numrecords = count($data);

    for($i = 1; $i < $numrecords; $i++) {   
      $record = array(

        "survey_id"         => mysqli_real_escape_string($conn, $data[$i][0]),
        "survey_type"       => mysqli_real_escape_string($conn, $data[$i][1]),
        "division"          => mysqli_real_escape_string($conn, $data[$i][2]),
        "costcenter"        => mysqli_real_escape_string($conn, $data[$i][3]),
        "teamname"          => mysqli_real_escape_string($conn, $data[$i][4]),
        "teamleaderentity"  => mysqli_real_escape_string($conn, $data[$i][5]),
        "agententity"       => mysqli_real_escape_string($conn, $data[$i][7]),
        "jobtitle"          => mysqli_real_escape_string($conn, $data[$i][9]),
        "surveyentity"      => mysqli_real_escape_string($conn, $data[$i][10]),
        "callid"            => mysqli_real_escape_string($conn, $data[$i][11]),
        "calldate"          => date("Y-m-d H:i:s", strtotime($data[$i][12])),
        "keyword"           => mysqli_real_escape_string($conn, $data[$i][13]),
        "responseid"        => mysqli_real_escape_string($conn, $data[$i][14]),
        "surveydate"        => date("Y-m-d H:i:s", strtotime($data[$i][15])),
        "score"             => mysqli_real_escape_string($conn, $data[$i][16]),
        "capturedate"       => date("Y-m-d H:i:s", strtotime($data[$i][17])),
        "comments"          => mysqli_real_escape_string($conn, $data[$i][18]),
        "plancode"          => mysqli_real_escape_string($conn, $data[$i][19]),
        "planname"          => mysqli_real_escape_string($conn, $data[$i][20])
      );         
      
      $sql = '
      INSERT INTO drc_mbr_data 
             (survey_id, 
             survey_type, 
             division_name, 
             costcenter_name,
             team_name,
             teamleader_entity,
             agent_entity,
             job_title,
             survey_entity,
             call_id,
             call_answer_date,
             survey_date,
             capture_date,
             response_id,
             survey_score,
             comments,
             keyword,
             plan_code,
             plan_name)
      VALUES ("' . $record['survey_id'] . '",
              "' . $record['survey_type'] . '",
              "' . $record['division'] . '",
              "' . $record['costcenter'] . '",
              "' . $record['teamname'] . '",
              "' . $record['teamleaderentity'] . '",
              "' . $record['agententity'] . '",
              "' . $record['jobtitle'] . '",
              "' . $record['surveyentity'] . '",
              "' . $record['callid'] . '",
              "' . $record['calldate'] . '",
              "' . $record['surveydate'] . '",
              "' . $record['capturedate'] . '",
              "' . $record['responseid'] . '",
              ' . $record['score'] . ',
              "' . $record['comments'] . '",
              "' . $record['keyword'] . '",
              "' . $record['plancode'] . '",              
              "' . $record['planname'] . '");
      ';

      mysqli_query($conn, $sql);      
      
    }

    mysqli_close($conn);

    return $numrecords;

  } // END upload_mbr_data function

  function upload_fcr_data($data) {
    include("inc/dbconn.inc.php");

    $numrecords = count($data);

    for($i = 1; $i < $numrecords; $i++) {   
      $record = array(

        "survey_id"         => mysqli_real_escape_string($conn, $data[$i][0]),
        "survey_type"       => mysqli_real_escape_string($conn, $data[$i][1]),
        "division"          => mysqli_real_escape_string($conn, $data[$i][2]),
        "costcenter"        => mysqli_real_escape_string($conn, $data[$i][3]),
        "teamname"          => mysqli_real_escape_string($conn, $data[$i][4]),
        "teamleaderentity"  => mysqli_real_escape_string($conn, $data[$i][5]),
        "agententity"       => mysqli_real_escape_string($conn, $data[$i][7]),
        "jobtitle"          => mysqli_real_escape_string($conn, $data[$i][9]),
        "surveyentity"      => mysqli_real_escape_string($conn, $data[$i][10]),
        "callid"            => mysqli_real_escape_string($conn, $data[$i][11]),
        "calldate"          => date("Y-m-d H:i:s", strtotime($data[$i][12])),
        "keyword"           => mysqli_real_escape_string($conn, $data[$i][13]),
        "responseid"        => mysqli_real_escape_string($conn, $data[$i][14]),
        "surveydate"        => date("Y-m-d H:i:s", strtotime($data[$i][15])),
        "score"             => mysqli_real_escape_string($conn, $data[$i][16]),
        "capturedate"       => date("Y-m-d H:i:s", strtotime($data[$i][17])),
        "comments"          => mysqli_real_escape_string($conn, $data[$i][18]),        
        "planname"          => mysqli_real_escape_string($conn, $data[$i][19])
      );         
      
      $sql = '
      INSERT INTO drc_fcr_data 
             (survey_id, 
             survey_type, 
             division_name, 
             costcenter_name,
             team_name,
             teamleader_entity,
             agent_entity,
             job_title,
             survey_entity,
             call_id,
             call_answer_date,
             survey_date,
             capture_date,
             response_id,
             survey_score,
             comments,
             keyword,             
             plan_name)
      VALUES ("' . $record['survey_id'] . '",
              "' . $record['survey_type'] . '",
              "' . $record['division'] . '",
              "' . $record['costcenter'] . '",
              "' . $record['teamname'] . '",
              "' . $record['teamleaderentity'] . '",
              "' . $record['agententity'] . '",
              "' . $record['jobtitle'] . '",
              "' . $record['surveyentity'] . '",
              "' . $record['callid'] . '",
              "' . $record['calldate'] . '",
              "' . $record['surveydate'] . '",
              "' . $record['capturedate'] . '",
              "' . $record['responseid'] . '",
              "' . $record['score'] . '",
              "' . $record['comments'] . '",
              "' . $record['keyword'] . '",                            
              "' . $record['planname'] . '");
      ';

      mysqli_query($conn, $sql);      
      
    }

    mysqli_close($conn);

    return $numrecords;

  } // END upload_fcr_data function
  

?>