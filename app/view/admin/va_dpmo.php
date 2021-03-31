<!-- Content Header (Page header) -->
<div class='content-header'>
  <div class='container-fluid'>
    <div class='row mb-2'>
      <div class='col-sm-6'>
        <h1 class='m-0 text-dark'>DPMO Imports</h1>
      </div><!-- /.col -->          
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class='content'>
  <div class='container-fluid'>
  <!-- All the main content to be displayed can go in this div -->
  <p>View</p>
  <ul>
    <li>Display the last 14 runs with the data volume</li>
    <li>Supply a button to run the import manually</li>
  </ul>
  <div class="row">
    <div class="col-md-6">
      <h3>Button for the DPMO runs</h3>
      <?php
        include("../app/model/m_dpmo.php");

        if(isset($_POST["import_dpmo_btn"])) {
          $data = getDPMO_Data();

          pre_r($data);
        }
      ?>
      
      <form method="POST" id="import_dpmo_form">
        <input type="submit" name="import_dpmo_btn" id="import_dpmo_btn" class="btn btn-primary" value="Run DPMO Import" />
      </form>

    </div>
    <div class="col-md-4">
      <h3>Display table of last 14 days of runs</h3>
    </div>  
  </div>
  

  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.Main content -->