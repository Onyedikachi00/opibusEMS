<?php session_start();
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Opibus Management System | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
  <!-- Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <!-- Navbar -->
<?php include_once('includes/navbar.php');?>

  <!-- Main Sidebar Container -->

<?php include_once('includes/sidebar.php');?>
    <!-- Sidebar -->


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
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
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

              <?php $query=mysqli_query($con,"SELECT id from admintable WHERE UserType ='Super Admin' ");
               $subadmincount=mysqli_num_rows($query);
              ?>
              <p style="font-size: 35.5px; font-weight:bold;"><?php echo $subadmincount;?></p>
              <p style="font-size: 16px;">Super Admins</p>
              <a href="manage-subadmins.php" class="btn" style="background-color:black; color:#fff;">More info <i class="fas fa-arrow-circle-right"></i></a>

            </div>
          </div>
          <!-- ./col -->

          <div class="col-md-3 ">
            <!-- small box -->
            <div class="card" style="background-color: #fff; margin: 10px ; padding: 10px 10px; align-items:center;">

              <?php $query=mysqli_query($con,"SELECT id FROM admintable WHERE UserType = 'HR Officer'");
               $hrcount=mysqli_num_rows($query);
              ?>
              <p style="font-size: 35.5px; font-weight:bold;"><?php echo $hrcount;?></p>
              <p style="font-size: 16px;">HR Managers</p>
              <a href="manage-subadmins.php" class="btn" style="background-color:blueviolet; color:#fff;">More info <i class="fas fa-arrow-circle-right"></i></a>

            </div>
          </div>
          <!-- ./col -->

          <div class="col-md-3 ">
            <!-- small box -->
            <div class="card" style="background-color: #fff; margin: 10px ; padding: 10px 10px; align-items:center;">
           
              <?php $query3=mysqli_query($con,"select id from hodtable");
              $listedclasses=mysqli_num_rows($query3);
              ?>               
              <p style="font-size: 35.5px; font-weight:bold;"><?php echo $listedclasses;?></h3>
              <p style="font-size: 16px;">HODs</p>
              
              <a href="manage-subadmins.php" class="btn" style="background-color:indianred; color:#fff;">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-md-3 ">
            <!-- small box -->
            <div class="card" style="background-color: #fff; margin: 10px ; padding: 10px 10px; align-items:center;">
              <?php $query1=mysqli_query($con,"select id from stafftable");
              $staffs=mysqli_num_rows($query1);
              ?>
              <p style="font-size: 35.5px; font-weight:bold;"><?php echo $staffs;?></p>
              <p style="font-size: 16px;">Staff</p>
              <a href="manage-subadmins.php" class="btn" style="background-color:coral; color:#fff;">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-md-3 ">
            <!-- small box -->
            <div class="card" style="background-color: #fff; margin: 10px ; padding: 10px 10px; align-items:center;">
              
              <?php $query111=mysqli_query($con,"select id from department ");
              $tvisitors=mysqli_num_rows($query111);
              ?>
              <p style="font-size: 35.5px; font-weight:bold;"><?php echo $tvisitors;?></h3>
              <p style="font-size: 16px;">Total Departments</p>
              <a href="manage-department.php" class="btn" style="background-color:peru; color:#fff;">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
              
          <div class="col-md-3 ">
            <!-- small box -->
            <div class="card" style="background-color: #fff; margin: 10px ; padding: 10px 10px; align-items:center;">
              
              <?php $query11=mysqli_query($con,"select appid from tblapplication ");
              $tapplications=mysqli_num_rows($query11);
              ?>
              <p style="font-size: 35.5px; font-weight:bold;"><?php echo $tapplications;?></h3>
              <p style="font-size: 16px;">Total Applications</p>
              <a href="all-applications.php" class="btn" style="background-color:dodgerblue; color:#fff;">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-md-3 ">
            <!-- small box -->
            <div class="card" style="background-color: #fff; margin: 10px ; padding: 10px 10px; align-items:center;">

              <?php $query12=mysqli_query($con,"select appid from tblapplication where (applyStatus='' || applyStatus is null)");
              $newapplications=mysqli_num_rows($query12);
              ?>
              <p style="font-size: 35.5px; font-weight:bold;"><?php echo $newapplications;?></h3>
              <p style="font-size: 16px;">New Applications</p>
               
              <a href="new-applications.php" class="btn" style="background-color:lightgreen; color:#fff;">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <div class="col-md-3 ">
            <!-- small box -->
            <div class="card" style="background-color: #fff; margin: 10px ; padding: 10px 10px; align-items:center;">
              
              <?php $query13=mysqli_query($con,"select appid from tblapplication where (applyStatus='Accepted' && interviewStatus is NULL)");
              $scheduledinterviews=mysqli_num_rows($query13);
              ?>               
              <p style="font-size: 35.5px; font-weight:bold;"><?php echo $scheduledinterviews;?></h3>
              <p style="font-size: 16px;">Scheduled Interviews</p>
               
              <a href="scheduled-interview.php" class="btn" style="background-color:violet; color:#fff;">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-md-3 ">
            <!-- small box -->
            <div class="card" style="background-color: #fff; margin: 10px ; padding: 10px 10px; align-items:center;">
              
              <?php $query14=mysqli_query($con,"select appid from tblapplication where (approvalStatus='Approved')");
              $approvedinterviews = mysqli_num_rows($query14);
              ?>               
              <p style="font-size: 35.5px; font-weight:bold;"><?php echo $approvedinterviews;?></h3>
              <p style="font-size: 16px;">Approved Interviews</p>
               
              <a href="conducted-interview.php" class="btn" style="background-color:teal; color:#fff;">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>   
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once('includes/footer.php');?>


</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
</body>
</html>
<?php } ?>
