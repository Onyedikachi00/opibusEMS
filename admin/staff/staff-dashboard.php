<?php session_start();

include('../includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { 
header('location: ../index.php');
}
else{

  $staffId = intval($_SESSION['aid']);

  // Fetch staff name from stafftable
  $queryStaffName = mysqli_query($con, "SELECT Name FROM stafftable WHERE ID = $staffId");
  $rowStaffName = mysqli_fetch_assoc($queryStaffName);
  $staffName = $rowStaffName['Name']; 
  //<?php echo $staffName; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Opibus Management System | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <?php include_once('../includes/staff-navbar.php');?>

  <!-- Main Sidebar Container -->
  <?php include_once('../includes/sidebar.php');?>  


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="staff-dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-md-3 ">
            <!-- small box -->
            <div class="card" style="background-color: #fff; margin: 10px ; padding: 10px 10px; align-items:center;">
            <?php 
            $queryLate = mysqli_query($con, "SELECT * FROM tbllaterequest WHERE Name = '$staffName'");
            $lateRequestCount = mysqli_num_rows($queryLate);
            ?> 
            <p style="font-size: 35.5px; font-weight: bold;"><?php echo $lateRequestCount; ?></p>
            <p style="font-size: 16px;">Your Late Arrivals</p>
            <a href="staff-latearrival-requests.php" class="btn" style="background-color:firebrick; color:#fff;">More info <i class="fas fa-arrow-circle-right"></i></a>

            </div>
          </div>
          <!-- ./col -->

          <div class="col-md-3 ">
            <!-- small box -->
            <div class="card" style="background-color: #fff; margin: 10px ; padding: 10px 10px; align-items:center;">
            <?php 
            $queryExit = mysqli_query($con, "SELECT * FROM tbltemporaryexit WHERE Name = '$staffName'");
            $ExitRequestCount = mysqli_num_rows($queryExit);
            ?> 
            <p style="font-size: 35.5px; font-weight: bold;"><?php echo $ExitRequestCount; ?></p>
            <p style="font-size: 16px;">Your Exit Requests</p>
            <a href="staff-temporary-exit-requests.php" class="btn" style="background-color:darkorchid; color:#fff;">More info <i class="fas fa-arrow-circle-right"></i></a>

            </div>
          </div>
          <!-- ./col -->

          <div class="col-md-3 ">
            <!-- small box -->
            <div class="card" style="background-color: #fff; margin: 10px ; padding: 10px 10px; align-items:center;">
            <?php 
            $queryLeave = mysqli_query($con, "SELECT * FROM tblleaverequest WHERE Name = '$staffName'");
            $LeaveRequestCount = mysqli_num_rows($queryLeave);
            ?> 
            <p style="font-size: 35.5px; font-weight: bold;"><?php echo $LeaveRequestCount; ?></p>
            <p style="font-size: 16px;">Your Leave Requests</p>
            <a href="staff-leave-requests.php" class="btn" style="background-color: darkseagreen; color: #fff;">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        
          <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once('../includes/footer.php');?>


</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
</body>
</html>
<?php } ?>
