<!-- Content Header (Page header) -->
<div class='content-header'>
  <div class='container-fluid'>
    <div class='row mb-2'>
      <div class='col-sm-6'>
        <h1 class='m-0 text-dark'>Maintain BeYou user</h1>
      </div><!-- /.col -->          
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class='content'>
  <div class='container-fluid'>
  <!-- All the main content to be displayed can go in this div -->
  <div class="row">
    <div class="col-md-2">

    </div>

    <div class="col-md-4">
      <div class="card">
        <div class="card-header bg_dark">
          <h3 class="card-title">Search for Entity</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" method="POST" id="search_entity">
          <div class="card-body">
            <div class="form-group row">
              <label for="inputEntity" class="col-sm-2 col-form-label">Entity</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name= "inputEntity" id="inputEntity" placeholder="Entity">
              </div>
              <button type="submit" class="btn btn-primary float-right" name="search_entity_btn">Search</button>  
            </div>
          </div>
          <!-- /.card-body -->        
        </form>
      </div>
      <!-- /.card -->

    </div>
    <div class="col-md-4">

    </div>

  </div>
  <!-- /.search row -->
  <hr>
  <?php
      if(isset($_POST["search_entity_btn"])) {
        if(strlen($_POST["inputEntity"]) != 10) {
          $message = "Entity is not appear correct";

          echo $message;

        } else {
          include("../app/model/staff_db.php");
          $entity = $_POST["inputEntity"];

          $result = getUserDetails($entity);

          //pre_r($result);
          

        }        
      } // end if stmt
    ?>
  <!-- Results row -->
  <div class="row">
    <div class="col-md-2">

    </div>

    <div class="col-md-8">
     
      <div class="card">
        <div class="card-header bg_dark">
          <h3 class="card-title"><?php echo $result['KnownAsName'] . ' ' . $result['Surname']; ?> details</h3>
        </div>
      
        <div class="card-body">
          <table>
            <tr>
              <th style="width: 50%;">Entity</th>
              <td><?php echo $result['Entity'] ?></td>
            </tr>
            <tr>
              <th>Username</th>
              <td><?php echo $result['Username'] ?></td>
            </tr>
            <tr>
              <th>Job level</th>
              <td><?php echo $result['JobLevelName'] ?></td>
            </tr>
            <tr>
              <th>Job Title</th>
              <td><?php echo $result['JobTitleName'] ?></td>
            </tr>
            <tr>
              <th>Business Unit</th>
              <td><?php echo $result['BusinessUnitName'] ?></td>
            </tr>
            <tr>
              <th>Department</th>
              <td><?php echo $result['DeparmentName'] ?></td>
            </tr>
            <tr>
              <th>Cost Center</th>
              <td><?php echo $result['CostCenterCode'] . ' - ' . $result['CostCenterName'] ?></td>
            </tr>
            <tr>
              <th>Team</th>
              <td><?php echo $result['DiscoveryTeamName'] ?></td>
            </tr>
            <tr>
              <th>Inentive category</th>
              <td><?php echo $result['CategoryName'] ?></td>
            </tr>
          </table>
        
          <div class="form-group">
            <label>Service Team</label>
            <select class="form-control select2" style="width: 100%;">
              <option selected="selected"><?php echo $result['ServiceTeamName'] ?></option>
              <option>Bankmed ST</option>
              <option>WCP ST</option>
              <option>KZN ST</option>
              <option>GAU ST</option>
              <option>ECP ST - GK</option>
              <option>ECP ST - AB</option>
            </select>
          </div>

          <div class="form-group">
            <label>Skill</label>
            <select class="form-control select2" style="width: 100%;">
              <option selected="selected"><?php echo $result['SkillName'] ?></option>
              <option>CCC</option>
              <option>SCCC</option>
              <option>PreAuth</option>
              <option>CH</option>
              <option>Specialist</option>
              <option>HP</option>
            </select>
          </div>
                   
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-info">Sign in</button>
          <button type="submit" class="btn btn-default float-right">Cancel</button>
        </div>
        <!-- /.card-footer -->
      </div>

      <div class="row">
        <!-- item we can change row attributes row -->
      </div>

    </div>    
  </div>




  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.Main content -->
