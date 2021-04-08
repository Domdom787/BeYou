<?php
  // Generate the various Dashboard views

  // Check if a URL parameter (entity) has been passed. Based on this entity then determine whch view to display.
  // If not URL parameter then display the current session users applicable view


  // Generate a Line Manager view
  // get user's direct reports given a line manager entity
  function getUserTeam($entity) {
    include("inc/dbconn.inc.php");
    $sql = "
    SELECT a.Entity,
           u.KnownAsName,
           u.Surname,
           j.JobTitleName

        FROM bu_staffattributes  a
          JOIN bu_user u ON u.Entity = a.Entity
          JOIN lk_jobtitle j ON j.JobTitleCode = a.JobCode

        WHERE a.LineManagerEntity = " . $entity . " AND
              a.Eff_ToDate = '9999-12-31' AND
              a.EmployeeStatus = 'Active'
        ORDER BY u.KnownAsName;
    ";
    $result = mysqli_query($conn, $sql); 
    mysqli_close($conn);   

    return $result;
  }

  function generateTeamTable($entity){

    $name =  getUsersName($entity);

    $htmloutput = '<!--- Team Leader View -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title"><strong>' . ucwords($name) . '</strong> Team Dashboard</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-sm table-hover table-responsive">
                        <thead>
                          <tr>
                            <th style="width: 200px">Name</th>
                            <th>Skill</th>
                            <th>Call Avg</th>
                            <th>AHT</th>
                            <th>Transfer %</th>
                            <th>Avg hold time</th>
                            <th>Production</th>
                            <th>MBR</th>
                            <th>FCR</th>
                            <th>Attendance</th>
                            <th>Adherence</th>
                            <th>TWT</th>
                            <th>Kowledge</th>
                            <th>BeYou enagement</th>
                            <th>Incentive</th>
                            <th>BeYou win ratio</th>
                          </tr>
                        </thead>
                        <tbody>';
    
    $result = getUserTeam($entity);

    

    if (mysqli_num_rows($result) > 0) {
      
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        
        $htmloutput.='
        <tr>
          <td><a href="?e=' . $row["Entity"] . '">' . $row["KnownAsName"] . ' ' . $row["Surname"] . '</a></td>
          <td>' . $row["JobTitleName"] . '</td>
          <td>45</td>
          <td>378</td>
          <td>12%</td>
          <td>12</td>
          <td>14</td>
          <td>8.72 (12)</td>
          <td>79.2% (8)</td>
          <td>100%</td>
          <td>89%</td>
          <td>99.2%</td>
          <td>-</td>
          <td>23%</td>
          <td><span class="badge bg-danger">98%</span></td>
          <td>50%</td>
        </tr>
        ';
      } // end while loop
    } // end if stmt

    $htmloutput .= '
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      </div>
      <!-- /.card -->'; 
    
                          

    return $htmloutput;


  }

  // Generate the Staff member view


  //

?>