
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

        <?php
        // First check if we updating via a 1) uploaded file 2) a user update or 3) a scheduled task
        if(isset($_POST["submit"])) {
          
         // include($root . "/app/model/staff_db.php");
          
          //check if file included
          if($_FILES['file']['name']) {      
            $filename = explode(".", $_FILES['file']['name']);
            // check if it is a csv file
            if($filename[1] == 'csv') {  
              
              $handle = fopen($_FILES["file"]["tmp_name"], "r");
              $data = array();
              
              while (!feof($handle)) {
                $data[] = fgetcsv($handle, null, '|','"');
              }

              fclose($handle);

              $result = uploadstaffdetails($data);

              echo "You have uploaded " . $result . " records into the DB";
              
            } // end if file format check
          } // end if  a file was submitted
        } // end if submit button was pressed
        ?>

          <!-- Form to import the staff file -->
          <form action="" method="POST" enctype="multipart/form-data">
              <div align="center">
                <p>Upload Staff File: <input type="file" name="file"></p>
                <p><input type="submit" name="submit" value="Import"></p>    
              </div>  
          </form>



        <!-- /.card -->
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
