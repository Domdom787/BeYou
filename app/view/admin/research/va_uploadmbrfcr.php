
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1 class="m-0 text-dark">Discovery Research Center <small>Upload MBR and FCR data</small></h1>
      </div><!-- /.col -->          
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <!-- All the main content to be displayed can go in this div -->  

    <?php
        
      if(isset($_POST["import_mbrfcr_btn"])) {
                
        include("../app/model/m_research.php");
                
        $allowed_ext = array('xls', 'csv', 'xlsx');
        $fileName = $_FILES['input_mbrfcr']['name'];        
        $getExt = explode(".", $fileName);
        $file_ext = end($getExt);

        if(in_array($file_ext, $allowed_ext)) {

          $targetPath = $_FILES['input_mbrfcr']['tmp_name'];
          $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetPath);
          $data = $spreadsheet->getActiveSheet()->toArray();
          $surveytype = $_POST["survey_type"];

          if ($surveytype === "mbr") {
            $numrecords = upload_mbr_data($data);            
          } elseif ($surveytype === "fcr") {
            $numrecords = upload_fcr_data($data);
          }; 

          $discription = "Successfully uploaded " . $numrecords . " into the " . $surveytype . " table.";

          update_import_log($surveytype, $fileName, $numrecords, $discription);

          echo '<div class="alert alert-success">Uploaded ' . $numrecords . ' records </div>';

        } else {
          echo '<div class="alert alert-danger">Only allowed .xls .csv or .xlsx files</div>';
        }

      } // end if submit button was pressed
    ?>

    <br>
    <div class="row">
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="card">
          <div class="card-header bg_dark">
            <h3 class="card-title">Upload MBR or FCR data</h3>
          </div>

          <form method="POST" id="import_mbrfcr_form" enctype="multipart/form-data" role="form">

            <div class="card-body">

              <div class="form-group">
                <label for="input_mbrfcr">Select File</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="input_mbrfcr" id="input_mbrfcr" class="custom-file-input"/>
                    <label class="custom-file-label" for="input_mbrfcr">Choose file</label>
                  </div>
                </div>
              </div>

              <!-- select -->
              <div class="form-group">
                <label>Select Survey Type</label>
                <select class="form-control" name="survey_type" id="survey_type">
                  <option value="mbr">MBR Data</option>
                  <option value="fcr">FCR Data</option>
                </select>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">            
              <input type="submit" name="import_mbrfcr_btn" id="import_mbrfcr_btn" class="btn btn-primary" value="Import" />
            </div>

            
          </form>
        </div>
      </div>

      <div class="col-md-6">
        This is test content to show where the instructions will go
      </div>
    </div>  
      <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.Main content -->