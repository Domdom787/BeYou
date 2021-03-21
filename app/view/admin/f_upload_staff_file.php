
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Upload new staff details</h1>
        </div>          
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">


          <!-- Form to import the staff file -->
          <form action="model/staff_db.php" method="POST" enctype="multipart/form-data">
              <div align="center">
                <p>Upload Staff File: <input type="file" name="file"></p>
                <p><input type="submit" name="submit" valie="Import"></p>    
              </div>  
          </form>



        <!-- /.card -->
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
