<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Discovery Research Center <small>Admin</small></h1>
      </div><!-- /.col -->          
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!--

   *** Still need to add in a function I can call on each page to determine if the current user has the needed permissions to view the page. ***

-->


<!-- Main content -->
<div class="content">
  <div class="container-fluid">

    <!-- ./row -->
    <div class="row">
      <div class="col-12 col-sm-12 col-lg-12">
        <div class="card card-primary card-outline card-outline-tabs">

          <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">

              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#survey_period" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Survey periods</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#upload_mbr_and_fcr" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Upload MBR and FCR data</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#upload_sps" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Upload SPS data</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#upload_survey_data" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Upload Survey data</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#tmbr_setup" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">TMBR survey setup</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#appeals" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Appeals</a>
              </li>

            </ul>
          </div>

          <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">

            <!-- SURVEY PERIOD tab content --->
              <div class="tab-pane fade show active" id="survey_period" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                <h4>Survey periods</h4>
                <ul>
                  <li>List the survey periods</li>
                  <li>Update survey periods</li>
                  <li>LIst the definitions of each data</li>
                </ul> 


                <!-- Current Survey period table -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Survey periods in DB</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table table-sm">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Task</th>
                          <th>Progress</th>
                          <th style="width: 40px">Label</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1.</td>
                          <td>Update software</td>
                          <td>
                            <div class="progress progress-xs">
                              <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                            </div>
                          </td>
                          <td><span class="badge bg-danger">55%</span></td>
                        </tr>
                        <tr>
                          <td>2.</td>
                          <td>Clean database</td>
                          <td>
                            <div class="progress progress-xs">
                              <div class="progress-bar bg-warning" style="width: 70%"></div>
                            </div>
                          </td>
                          <td><span class="badge bg-warning">70%</span></td>
                        </tr>
                        <tr>
                          <td>3.</td>
                          <td>Cron job running</td>
                          <td>
                            <div class="progress progress-xs progress-striped active">
                              <div class="progress-bar bg-primary" style="width: 30%"></div>
                            </div>
                          </td>
                          <td><span class="badge bg-primary">30%</span></td>
                        </tr>
                        <tr>
                          <td>4.</td>
                          <td>Fix and squish bugs</td>
                          <td>
                            <div class="progress progress-xs progress-striped active">
                              <div class="progress-bar bg-success" style="width: 90%"></div>
                            </div>
                          </td>
                          <td><span class="badge bg-success">90%</span></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                




              </div>

              <!-- MBR and FCR Upload tab content --->
              <div class="tab-pane fade" id="upload_mbr_and_fcr" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                <h4>Upload MBR and FCR data</h4>
                <ul>
                  <li>List the most recent uploads (scheduled and manual) with the volume</li>
                  <li>Present a form for user to select file to upload</li>
                  <li>Highlight the fields required for successful upload</li>
                </ul>   











              <!-- End MBR and FCR upload tab -->
              </div>  

              <div class="tab-pane fade" id="upload_sps" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                <h4>Upload SPS data</h4>
                <ul>
                  <li>List the most recent uploads (scheduled and manual) with the volume</li>
                  <li>Present a form for user to select file to upload</li>
                  <li>Highlight the fields required for successful upload</li>
                </ul>   
              </div>

              <div class="tab-pane fade" id="upload_survey_data" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                <h4>Upload General Survey data</h4>
                  <ul>
                    <li>List the most recent uploads (scheduled and manual) with the volume</li>
                    <li>Present a form for user to select file to upload</li>
                    <li>Highlight the fields required for successful upload</li>
                  </ul> 
                
              </div>

              <div class="tab-pane fade" id="tmbr_setup" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                <h4>TMRB setup</h4>
                  <ul>
                    <li>Define a survey type</li>
                    <li>Define the quesiton and quesiton types</li>
                    <li>View and confirm the questionnaire</li>
                    <li>Uplaod the data</li>
                    <li>Distribute the leads</li>
                  </ul>  
              </div>

              <div class="tab-pane fade" id="appeals" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                <h4>Appeals</h4>
                  <ul>
                    <li>List and maintain the appeal categories</li>
                    <li>Action an appeal with a unique idenifier</li>
                    <li>Display some statistics on the appeals</li>                        
                  </ul>  
              </div>

            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.Main content -->