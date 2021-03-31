  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home" class="brand-link elevation-4">
      <img src="public/img/beyou_2.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">BeYou | Arete Build</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar scroll-hide">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="profile" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2 ">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="home" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home                
              </p>
            </a>            
          </li>

          <li class="nav-item">
            <a href="dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard                
              </p>
            </a>            
          </li>


          <li class="nav-item">
            <a href="challenge" class="nav-link">              
              <i class="nav-icon fas fa-gamepad"></i>
              <p>
                Challenges                
              </p>
            </a>
          </li>

          <!-- Report menu drop down -->
          <li class="nav-item has-treeview">
            <a href="reports" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Reports
                <i class="fas fa-angle-right right"></i>
                
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="beyouengagement_report" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BeYou Engagement</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="perception_report" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perception</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="twt_report" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>TWT</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="quality_report" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quality</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ssm_report" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SSM</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="production_report" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Production</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="projects_report" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Projects</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- END of Report menu drop down -->

          <!-- Projects menu option -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Projects
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="project?id=1" class="nav-link">
                  <i class="fas fa-tasks nav-icon"></i>
                  <p>Project 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="project?id=2" class="nav-link">
                  <i class="fas fa-tasks nav-icon"></i>
                  <p>Project 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="project?id=3" class="nav-link">
                  <i class="fas fa-tasks nav-icon"></i>
                  <p>Project 3</p>
                </a>
              </li>              
            </ul>
          </li>
          <!-- END projects menu -->

          <!--- ********************************************** Admin menu items ************************************ -->
          <li class="nav-header">ADMIN MENU</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Admin
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
                <a href="beyou_admin" class="nav-link">
                  <i class="fas fa-chess nav-icon"></i>
                  <p>BeYou</p>
                  <i class="fas fa-angle-right right"></i>
                </a>

                <!--- BeYou menu items -->
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="sched_tasks" class="nav-link">
                      <i class="fas fa-calendar-alt nav-icon"></i>
                      <p>Scheduled Tasks</p>
                    </a>
                  </li>
                </ul>
              </li>


              <!--- ********************** START Incentive menu options **************** -->
              <li class="nav-item has-treeview">
                <a href="incentive_admin" class="nav-link">
                  <i class="fas fa-balance-scale-left nav-icon"></i>
                  <p>Incentives</p>
                  <i class="fas fa-angle-right right"></i>
                </a>

                <ul class="nav nav-treeview">

                  <li class="nav-item">
                    <a href="masterfile" class="nav-link">
                      <i class="fa fa-circle nav-icon"></i>
                      <p>MasterFile</p>
                    </a>
                  </li>                 

                  <li class="nav-item">
                    <a href="import_bands" class="nav-link">
                      <i class="fa fa-circle nav-icon"></i>
                      <p>Import Bands</p>
                    </a>
                  </li>                 

                </ul>




              </li>
              <!--- ********************** END Incentive menu options **************** -->


              <!-- ********************** START Research menu options **************** -->
              <li class="nav-item has-treeview">
                <a href="research_admin" class="nav-link">
                  <i class="fas fa-bullhorn nav-icon"></i>
                  <p>Research</p>
                  <i class="fas fa-angle-right right"></i>
                </a>
                <!--- Research menu items -->
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="survey_periods" class="nav-link">
                      <i class="fas fa-calendar-alt nav-icon"></i>
                      <p>Survey periods</p>
                    </a>
                  </li>
                
                  <li class="nav-item">
                    <a href="upload_mbrfcr_data" class="nav-link">
                      <i class="fas fa-mail-bulk nav-icon"></i>
                      <p>Upload MBR and FCR data</p>
                    </a>
                  </li>
                
                  <li class="nav-item">
                    <a href="upload_sps_data" class="nav-link">
                      <i class="fas fa-handshake nav-icon"></i>
                      <p>Upload SPS data</p>
                    </a>
                  </li>
                
                  <li class="nav-item">
                    <a href="upload_survey_data" class="nav-link">
                      <i class="fas fa-headset nav-icon"></i>
                      <p>Upload Survey data</p>
                    </a>
                  </li>
                
                  <li class="nav-item">
                    <a href="manage_appeals" class="nav-link">
                      <i class="fas fa-exclamation nav-icon"></i>
                      <p>Manage appeals</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- ********************** END Research menu options **************** -->

              <li class="nav-item">
                <a href="lsa_admin" class="nav-link">
                  <i class="fas fa-route nav-icon"></i>
                  <p>LSA</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="dpmo" class="nav-link">
                <i class="fas fa-tasks nav-icon"></i>
                  <p>DPMO</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ssm_admin" class="nav-link">
                  <i class="fas fa-chart-bar nav-icon"></i>
                  <p>SSM</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="twt_admin" class="nav-link">
                  <i class="fas fa-inbox nav-icon"></i>
                  <p>TWT</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="user_admin" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Users</p>
                  <i class="fas fa-angle-right right"></i>
                </a>

                <!-- ********************** START User menu options **************** -->
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="uploadstaff" class="nav-link">
                      <i class="fas fa-user-plus nav-icon"></i>
                      <p>Upload staff file</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="edit_single_user" class="nav-link">
                      <i class="fas fa-user-tag nav-icon"></i>
                      <p>Edit single user</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="edit_team_structure" class="nav-link">
                      <i class="fas fa-user-friends nav-icon"></i>
                      <p>Edit team structure</p>
                    </a>
                  </li>
                </ul>
                <!-- ********************** END User menu options **************** -->



              </li>

            </ul>
          </li>
          <!-- END of Admin menu options -->

          

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>