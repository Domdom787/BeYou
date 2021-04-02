<!-- Content Header (Page header) -->
<div class='content-header'>
  <div class='container-fluid'>
    <div class='row mb-2'>
      <div class='col-sm-6'>
        <h1 class='m-0 text-dark'>All BeYou users</h1>
      </div><!-- /.col -->          
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class='content'>
  <div class='row'>
    <div class="col-12">
  
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All Be You users</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 900px;"">
          <!-- <table id="example1" class="table table-bordered table-striped"> -->
          <table id="example1" class="table display compact table-striped responsive nowrap table-head-fixed">
          <!-- <table id="example1" class="table table-head-fixed text-nowrap table-striped table-bordered"> -->
          
            <thead>
              <tr>
                <th>Entity</th>
                <th>Username</th>
                <th>Name</th>
                <th>Job Level</th>
                <th>Job Title</th>
                <th>Business unit</th>
                <th>Department</th>
                <th>Cost Center</th>
                <th>Team</th>
                <th>Line Manager</th>
                <th>Region</th>
                <th>Service Team</th>
                <th>Skill</th>
                <th>Inc_cat</th>
              </tr>
            </thead>
            <tbody>

            <?php
              include("../app/model/staff_db.php");
              $result = getAllUsers();

              $htmloutput = "";

              if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                  $htmloutput.= '<tr>';
                  $htmloutput.= '<td style="font-weight: bold;">' . $row["Entity"] .'</td>';
                  $htmloutput.= '<td>' . $row["Username"] .'</td>';
                  $htmloutput.= '<td>' . $row["KnownAsName"] . ' ' . $row["Surname"] .'</td>';
                  $htmloutput.= '<td>' . $row["JobLevelName"] .'</td>';
                  $htmloutput.= '<td>' . $row["JobTitleName"] .'</td>';
                  $htmloutput.= '<td>' . $row["BusinessUnitName"] .'</td>';
                  $htmloutput.= '<td>' . $row["DeparmentName"] .'</td>';
                  $htmloutput.= '<td>' . $row["CostCenterName"]  . ' - ' . $row["CostCenterCode"] .'</td>';                  
                  $htmloutput.= '<td>' . $row["DiscoveryTeamName"] .'</td>';
                  $htmloutput.= '<td>' . $row["LineManagerEntity"] .'</td>';
                  $htmloutput.= '<td>' . $row["RegionName"] .'</td>';
                  $htmloutput.= '<td>' . $row["ServiceTeamName"] .'</td>';
                  $htmloutput.= '<td>' . $row["SkillName"] .'</td>';
                  $htmloutput.= '<td>' . $row["CategoryName"] .'</td>';
                  $htmloutput.= '</tr>';
                }

              }

              echo $htmloutput;


            ?>           
            
            </tbody>                
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.Main content -->