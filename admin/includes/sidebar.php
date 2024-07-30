    
      <aside class="main-sidebar sidebar-light-secondary elevation-4" style="color: #000; border:none; position:fixed; top:0; left:0; height:100%;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link  mt-3 pb-4 " >

      <span class="brand-text font-weight-heavy">Opibus | Admin </span>
    </a>
    <div class="sidebar">
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <?php if($_SESSION['utype']== 'Super Admin'):?>
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
          </li>

          <!-- Subadmins -->
          <li class="nav-item">
              <a href="manage-staff.php" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Accounts</p>
              </a>
          </li>

          <!-- Departments -->
          <li class="nav-item">
              <a href="manage-department.php" class="nav-link">
                  <i class="nav-icon fas fa-building"></i>
                  <p>Departments</p>
              </a>
          </li>

          <!-- Job Applications -->
          <li class="nav-item">
              <a href="new-applications.php" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Applications <i class="right fas fa-angle-left"></i></p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                      <a href="new-applications.php" class="nav-link">
                          <i class="fas fa-pen nav-icon"></i>
                          <p>New Applications</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="scheduled-interview.php" class="nav-link">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>Scheduled Interviews</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="approved-staff.php" class="nav-link">
                        <i class="nav-icon fas fa-check-circle"></i>
                        <p>Approved Interviews</p>
                      </a>
                  </li>
              </ul>
          </li>

          <!-- Profile -->
          <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>Account Settings <i class="right fas fa-angle-left"></i></p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                      <a href="profile.php" class="nav-link">
                          <i class="far fa-user nav-icon"></i>
                          <p>Profile</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="change-password.php" class="nav-link">
                          <i class="fas fa-key nav-icon"></i>
                          <p>Change Password</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="logout.php" class="nav-link">
                          <i class="fas fa-sign-out-alt nav-icon"></i>
                          <p>Logout</p>
                      </a>
                  </li>
              </ul>
          </li>

          <?php endif;?>

          <?php if($_SESSION['utype']== 'HR Officer'):?>
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
          </li>

          <!-- Accounts -->
          <li class="nav-item">
              <a href="manage-subadmins.php" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Accounts</p>
              </a>
          </li>

          <!-- Departments -->
          <li class="nav-item">
              <a href="manage-department.php" class="nav-link">
                  <i class="nav-icon fas fa-building"></i>
                  <p>Departments</p>
              </a>
          </li>

          <!-- Job Applications -->
          <li class="nav-item">
              <a href="new-applications.php" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Applications <i class="right fas fa-angle-left"></i></p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                      <a href="new-applications.php" class="nav-link">
                          <i class="fas fa-pen nav-icon"></i>
                          <p>New Applications</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="scheduled-interview.php" class="nav-link">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>Scheduled Interviews</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="approved-staff.php" class="nav-link">
                        <i class="nav-icon fas fa-check-circle"></i>
                        <p>Approved Interviews</p>
                      </a>
                  </li>
              </ul>
          </li>

          <!-- Profile -->
          <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>Account Settings <i class="right fas fa-angle-left"></i></p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                      <a href="profile.php" class="nav-link">
                          <i class="far fa-user nav-icon"></i>
                          <p>Profile</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="change-password.php" class="nav-link">
                          <i class="fas fa-key nav-icon"></i>
                          <p>Change Password</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="logout.php" class="nav-link">
                          <i class="fas fa-sign-out-alt nav-icon"></i>
                          <p>Logout</p>
                      </a>
                  </li>
              </ul>
          </li>

          <?php endif;?>

          <?php if($_SESSION['utype']=='Staff'):?>

            <li class="nav-item">
              <a href="staff-dashboard.php" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
              </a>
          </li>

          <!-- Request Permission -->
          <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user-clock"></i>
                  <p>
                      Request Permission
                      <i class="right fas fa-angle-left"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                      <a href="request-latearrival-staff.php" class="nav-link">
                          <i class="fas fa-clock nav-icon"></i>
                          <p>Request Late Arrival</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="request-temporary-exit-staff.php" class="nav-link">
                          <i class="fas fa-sign-out-alt nav-icon"></i>
                          <p>Request Temporary Exit</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="request-leave-staff.php" class="nav-link">
                          <i class="far fa-envelope nav-icon"></i>
                          <p>Request Leave</p>
                      </a>
                  </li>
              </ul>
          </li>

          <!-- My Requests -->
          <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>
                      My Requests
                      <i class="right fas fa-angle-left"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                      <a href="staff-latearrival-requests.php" class="nav-link">
                          <i class="fas fa-clock nav-icon"></i>
                          <p>Late Arrival Requests</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="staff-temporary-exit-requests.php" class="nav-link">
                          <i class="fas fa-sign-out-alt nav-icon"></i>
                          <p>Exit Requests</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="staff-leave-requests.php" class="nav-link">
                          <i class="far fa-envelope nav-icon"></i>
                          <p>Leave Requests</p>
                      </a>
                  </li>
              </ul>
          </li>

          <!-- Profile -->
          <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>Account Settings <i class="right fas fa-angle-left"></i></p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                      <a href="staff-profile.php" class="nav-link">
                          <i class="far fa-user nav-icon"></i>
                          <p>Profile</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="../logout.php" class="nav-link">
                          <i class="fas fa-sign-out-alt nav-icon"></i>
                          <p>Logout</p>
                      </a>
                  </li>
              </ul>
          </li>

          <?php endif;?>

          <?php if($_SESSION['utype']=='HOD'):?>

          <li class="nav-item">
            <a href="hod-dashboard.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
            Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="hod_manage-staff.php" class="nav-link">
            <?php
                $getUserQuery = mysqli_query($con, "SELECT Name,  department FROM hodtable WHERE ID = '$hodid'");
                $result = mysqli_fetch_assoc($getUserQuery);
                $hodDept = $result['department'];

                $cnt = 0;
                $query = mysqli_query($con, "
                    SELECT ID, Name FROM tbllaterequest WHERE Status = 'Pending' && department = '$hodDept'
                    UNION
                    SELECT ID, Name FROM tblleaverequest WHERE Status = 'Pending' && department = '$hodDept'
                    UNION
                    SELECT ID, Name FROM tbltemporaryexit WHERE Status = 'Pending' && department = '$hodDept'
                ");
                while ($result = mysqli_fetch_array($query)) {
              $cnt++;}?>
              <i class="nav-icon fas fa-building"></i>
              <p>My Department</p><?php 
              if ($cnt == 0) {
                echo '';
              }
              else {
                echo '<span style="background-color: red; color:white; padding: 2px 5px; border-radius:50%; margin-left: 10px; font-weight:bold;">'.$cnt.'</span>';
              }?>
            </a>
          </li>

          <!-- Permission -->
          <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user-clock"></i>
                  <p>
                      Request Permission
                      <i class="right fas fa-angle-left"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                      <a href="request-latearrival-hod.php" class="nav-link">
                          <i class="fas fa-clock nav-icon"></i>
                          <p>Request Late Arrival</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="request-temporary-exit-hod.php" class="nav-link">
                          <i class="fas fa-sign-out-alt nav-icon"></i>
                          <p>Request Temporary Exit</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="request-leave-hod.php" class="nav-link">
                          <i class="far fa-envelope nav-icon"></i>
                          <p>Request Leave</p>
                      </a>
                  </li>
              </ul>
          </li>

          <!-- Permission Update -->
          <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>
                      My Requests
                      <i class="right fas fa-angle-left"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                      <a href="hod-latearrival-requests.php" class="nav-link">
                          <i class="fas fa-clock nav-icon"></i>
                          <p>Late Arrival Requests</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="hod-temporary-exit-requests.php" class="nav-link">
                          <i class="fas fa-sign-out-alt nav-icon"></i>
                          <p>Exit Requests</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="hod-leave-requests.php" class="nav-link">
                          <i class="far fa-envelope nav-icon"></i>
                          <p>Leave Requests</p>
                      </a>
                  </li>
              </ul>
          </li>


          <!--Profile--->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i> 
              <p>
              Account Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="hod-profile.php" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../logout.php" class="nav-link">
                  <i class="fas fa-sign-out-alt nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li> 
          <?php endif;?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>