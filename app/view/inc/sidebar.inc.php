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
    <div class="sidebar">
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
      <nav class="mt-2">
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
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Projects
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="project?id=1" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="project?id=2" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="project?id=3" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project 3</p>
                </a>
              </li>              
            </ul>
          </li>
          <!-- END projects menu -->

          <!--- Admin menu items -->
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
              <li class="nav-item">
                <a href="beyou_admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BeYou</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="incentive_admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Incentives</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="research_admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Research</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="lsa_admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LSA</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ssm_admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SSM</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="twt_admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>TWT</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="user_admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                  <i class="fas fa-angle-right right"></i>
                </a>
                <!--- User function additional menu item -->
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="uploadstaff" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Upload staff file</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Edit single user</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Edit team structure</p>
                    </a>
                  </li>
                </ul>



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