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
  <div class="row">
    <div class="col-md-7">
      <h3>DPMO Import log - last 14 days</h3>   
      <div class="card-body table-responsive p-0" style="height: 600px;">   
      
        <?php
          $result = getLogrecords("dpmo");

          if (mysqli_num_rows($result) > 0) {

            $htmloutput = '<table class="table table-sm table-striped table-head-fixed text-nowrap">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Records</th>
                  <th>Comments</th>
                  <th>User</th>                
                </tr>
              </thead>
              <tbody>';

            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              $htmloutput.= '<tr>';
              $htmloutput.= '<td>' . $row["date_added"] .'</td>';
              $htmloutput.= '<td>' . $row["num_records"] .'</td>';
              $htmloutput.= '<td>' . $row["discription"] .'</td>';
              $htmloutput.= '<td>' . $row["user_entity"] .'</td>';
              $htmloutput.= '</tr>';
            }

            $htmloutput.= '
                </tbody>
              </table>';
            
            echo $htmloutput;

          } else {
            echo "0 results";
          }

          

        ?>
      </div>
    </div>  

    <div class="col-md-4">
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
  </div> 
  

  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.Main content -->