<?php 
include('../includes/config.php');

  $staffId = intval($_SESSION['aid']);

  $querystaffName = mysqli_query($con, "SELECT Name FROM stafftable WHERE ID = $staffId");
  $rowstaffName = mysqli_fetch_assoc($querystaffName);
  $staffName = $rowstaffName['Name']; 

?>
  
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="color: #000; font-size:20px"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <div class="user-panel mt-1 mb-3 d-flex">
        <div class="info">
          <a href="inbox.php" class="nav-link nav-link-lg message-toggle" style="color: #000; font-size:20px; margin:0 5px 5px 0;" title="View Mails"><i class="far fa-envelope"></i></a>
        </div>
        <!-- <div class="info">
          <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg" style="color: #000; font-size:20px; margin:0 5px 5px 0;" title="Notifications"><i class="far fa-bell"></i></a>
        </div> -->
        <div class="info">
          <a href="../staff/staff-profile.php" class="d-block" style="color: #000; font-size:20px; margin:0 10px 0 0;"><?php  echo "How's it going " .$staffName ."?😊 ";?></a>
        </div>
      </div>

    </ul>
  </nav>
  <!-- /.navbar -->