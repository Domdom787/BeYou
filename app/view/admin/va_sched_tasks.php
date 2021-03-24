<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Scheduled tasks</h1>
      </div><!-- /.col -->          
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
  <!-- All the main content to be displayed can go in this div -->
  <p>Tasks</p>
  <ul>
    <li>Display a summary of scheduled tasks and when they ran from the log file</li>
    <li>Give the user a button to run the scheduled task manually</li>
  </ul>

  <hr>
  

  <?php
    include($root. "/app/model/m_scheduled_upload.php");

    check_for_uploads($data_network_dir);
    
  

    
  ?>



  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.Main content -->