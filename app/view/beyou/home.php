<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-1">
      <div class="col-sm-1">
       
      </div><!-- /.col -->          
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- Main content -->
<div class="content">
  <div class="container-fluid">
  <!-- All the main content to be displayed can go in this div -->  
    <div class="row">

      <!-- ************ Leaderboard view ******** -->
      <div class="col-sm-4">        
        <div class="card">
          <div class="card-header bg_dark">
            <h3 class="card-title">BeYou Leaderboard</h3>
          </div>

          <div class="card card-outline">
            <div class="card-header p-0 pt-1">
              <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">All</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Skill</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Region</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-one-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                  <!-- /.card-header -->
                  <div class="card-body scroll-hide table-responsive p-0" style="height: 800px;">
                    <table class="table table-sm table-hover table-head-fixed text-nowrap">
                      <thead>
                        <tr>
                          <th style="width: 10px">Rank</th>
                          <th>Name</th>
                          <th>Job Title</th>
                          <th style="width: 40px">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          for($i=1;$i<100;$i++) {
                            echo '
                            <tr>
                              <td>' . $i . '</td>
                              <td>BeYou User - ' . $i . '</td>
                              <td>CCC</td>
                              <td><span class="badge bg-warning">Gold</span></td>
                            </tr>
                            ';
                          }
                        ?>                
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                    
                

                </div> <!-- End tab 1 -->

                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                  Display the rank by Skill                    
                

                </div>


                <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                    Display the rank by Region / Service Team . 
                </div>

              </div>
            </div>
            <!-- /.card -->
          </div>  <!-- End the tabs -->
          
        </div>
      </div> 
      <!-- End Leaderboard div -->


      <!-- ************ Timeline view ******** -->
      <div class="col-sm-5">        
        
          <div class="card-header bg_dark">
            <h3 class="card-title">Feed</h3>
            <h4 class="card-title float-right">filter</h4>
          </div>

          <div class="beyou-wall">
            <div class="wall-content scroll-hide"> 
              <div class="wall-feed ">
                <?php
                  for($i=0;$i<20;$i++) {
                    echo '
                    <div class="wall-item">
                      <h2> Content # ' . $i . '</h2>

                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus scelerisque faucibus lorem, non elementum tortor dictum vel. Donec vehicula quam non consequat tincidunt. Nunc viverra orci sed turpis faucibus congue. Morbi ipsum lectus, tincidunt nec rutrum nec, cursus nec metus. Nullam dictum pretium dolor, ut ultrices lectus euismod a. Fusce id finibus eros. Vestibulum finibus eleifend felis et molestie. Nam volutpat sapien dui, ut faucibus eros rutrum id. Etiam rutrum, felis at auctor cursus, nisl lorem elementum nisl, ac imperdiet purus eros non metus. Vivamus blandit feugiat nisl, quis interdum ante blandit vel. Aliquam volutpat nisl ac nisi euismod porttitor. Morbi molestie aliquam mi eu commodo. </p>
                      
                    </div>
                    <hr>
                    ';
                  }
                ?>
              </div> 
            </div>  
          </div>
      </div>
      <!-- END Timeline view div -->



      <!-- ************ KPI and To-do and notes view ******** -->            
      <div class="col-sm-3 ">
        
        <!-- To do list row in column 3 -->
        <div class="row">
          
          <!-- TO DO List -->
          <div class="card">
            <div class="card-header bg_dark">
              <h3 class="card-title">                
                To Do List
              </h3>

              <div class="card-tools">
                <ul class="pagination pagination-sm">
                  <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                  <li class="page-item"><a href="#" class="page-link">1</a></li>
                  <li class="page-item"><a href="#" class="page-link">2</a></li>
                  <li class="page-item"><a href="#" class="page-link">3</a></li>
                  <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <ul class="todo-list" data-widget="todo-list">
                <li>
                  <!-- drag handle -->
                  <span class="handle">
                    <i class="fas fa-ellipsis-v"></i>
                    <i class="fas fa-ellipsis-v"></i>
                  </span>
                  <!-- checkbox -->
                  <div  class="icheck-primary d-inline ml-2">
                    <input type="checkbox" value="" name="todo1" id="todoCheck1">
                    <label for="todoCheck1"></label>
                  </div>
                  <!-- todo text -->
                  <span class="text">Design a nice theme</span>
                  <!-- Emphasis label -->
                  <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                    <i class="fas fa-edit"></i>
                    <i class="fas fa-trash-o"></i>
                  </div>
                </li>
                <li>
                  <span class="handle">
                    <i class="fas fa-ellipsis-v"></i>
                    <i class="fas fa-ellipsis-v"></i>
                  </span>
                  <div  class="icheck-primary d-inline ml-2">
                    <input type="checkbox" value="" name="todo2" id="todoCheck2" checked>
                    <label for="todoCheck2"></label>
                  </div>
                  <span class="text">Make the theme responsive</span>
                  <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                  <div class="tools">
                    <i class="fas fa-edit"></i>
                    <i class="fas fa-trash-o"></i>
                  </div>
                </li>
                <li>
                  <span class="handle">
                    <i class="fas fa-ellipsis-v"></i>
                    <i class="fas fa-ellipsis-v"></i>
                  </span>
                  <div  class="icheck-primary d-inline ml-2">
                    <input type="checkbox" value="" name="todo3" id="todoCheck3">
                    <label for="todoCheck3"></label>
                  </div>
                  <span class="text">Let theme shine like a star</span>
                  <small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>
                  <div class="tools">
                    <i class="fas fa-edit"></i>
                    <i class="fas fa-trash-o"></i>
                  </div>
                </li>
                <li>
                  <span class="handle">
                    <i class="fas fa-ellipsis-v"></i>
                    <i class="fas fa-ellipsis-v"></i>
                  </span>
                  <div  class="icheck-primary d-inline ml-2">
                    <input type="checkbox" value="" name="todo4" id="todoCheck4">
                    <label for="todoCheck4"></label>
                  </div>
                  <span class="text">Let theme shine like a star</span>
                  <small class="badge badge-success"><i class="far fa-clock"></i> 3 days</small>
                  <div class="tools">
                    <i class="fas fa-edit"></i>
                    <i class="fas fa-trash-o"></i>
                  </div>
                </li>
                <li>
                  <span class="handle">
                    <i class="fas fa-ellipsis-v"></i>
                    <i class="fas fa-ellipsis-v"></i>
                  </span>
                  <div  class="icheck-primary d-inline ml-2">
                    <input type="checkbox" value="" name="todo5" id="todoCheck5">
                    <label for="todoCheck5"></label>
                  </div>
                  <span class="text">Check your messages and notifications</span>
                  <small class="badge badge-primary"><i class="far fa-clock"></i> 1 week</small>
                  <div class="tools">
                    <i class="fas fa-edit"></i>
                    <i class="fas fa-trash-o"></i>
                  </div>
                </li>
                <li>
                  <span class="handle">
                    <i class="fas fa-ellipsis-v"></i>
                    <i class="fas fa-ellipsis-v"></i>
                  </span>
                  <div  class="icheck-primary d-inline ml-2">
                    <input type="checkbox" value="" name="todo6" id="todoCheck6">
                    <label for="todoCheck6"></label>
                  </div>
                  <span class="text">Let theme shine like a star</span>
                  <small class="badge badge-secondary"><i class="far fa-clock"></i> 1 month</small>
                  <div class="tools">
                    <i class="fas fa-edit"></i>
                    <i class="fas fa-trash-o"></i>
                  </div>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i>Add item</button>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- End The To do list row -->
      
        <hr>

        <div class="row">

          <div class="col-md-12">
            <div class="card">
              <div class="card-header bg_dark">
                <h3 class="card-title">KPI</h3>
              </div>

              <div class="card-body">

                <div class="progress-group">
                  DPMO
                  <span class="float-right"><b>0</b>/0</span>
                  <div class="progress progress-sm">                    
                    <div class="progress-bar bg-primary" style="width: 100%"></div>                  
                  </div>                  
                </div>
                <!-- /.progress-group -->

                <div class="progress-group">
                  MBR
                  <span class="float-right"><b>8.76</b>/8.82</span>
                  <div class="progress progress-sm">
                    <div class="progress-bar bg-danger" style="width: 85%"></div>
                  </div>
                </div>

                <!-- /.progress-group -->
                <div class="progress-group">
                  <span class="progress-text">FCR</span>
                  <span class="float-right"><b>90%</b>/82%</span>
                  <div class="progress progress-sm">
                    <div class="progress-bar bg-success" style="width: 100%"></div>
                  </div>
                </div>

                <!-- /.progress-group -->
                <div class="progress-group">
                  TWT
                  <span class="float-right"><b>92%</b>/95%</span>
                  <div class="progress progress-sm">
                    <div class="progress-bar bg-warning" style="width: 95%"></div>
                  </div>
                </div>
                <!-- /.progress-group -->
              </div>
            </div>          
          </div>
        </div>   
        <!-- end of the proress bar row -->    
      
      </div>
      <!-- end of Column three on the hom page -->

    </div>
    <!-- end of the row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.Main content -->