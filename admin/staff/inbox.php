<?php session_start();
include('../includes/config.php');
if(strlen($_SESSION['aid'])==0)
  { header('location:index.php');
}
else{ 
  $staffid = $_SESSION['aid'];
  $getUserQuery = mysqli_query($con, "SELECT Name FROM stafftable WHERE ID = '$staffid'");
  $result = mysqli_fetch_assoc($getUserQuery);
  $fname = $result['Name'];
   
  if (isset($_GET['ID'])) {
    $ID = intval($_GET['ID']);
    $updateQuery = "UPDATE tblmessages SET status = status + 1 WHERE ID = $ID";
    mysqli_query($con, $updateQuery);

    // Redirect to the actual link
    header("Location: message.php?messageid=$ID");
    exit();
  }
    
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Opibus Management System | Inbox</title>

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
  <!-- Sidebar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Inbox</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Inbox</li>
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
        <div class="col-md-12 mx-auto">
                <div class="">
                    <div class="card-body mt-3">
                        <div class="row">
                        <div class="col-10 col-sm-10 col-md-2">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active show" href="inbox.php" aria-selected="true">Inbox</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="outbox.php" aria-selected="false">Outbox</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card mt-3">
                                <div class="card-body">
                                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" style="background-color:darkgray; color:white; font-weight:bold;" href="composemail.php" aria-selected="true"><i class="nav-icon fas fa-pen"></i> &nbsp;Write Mail</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-10 col-sm-10 col-md-9">
                            <div class="card">
                                <div class="card-body mt-3">
                                    <div class="tab-content no-padding" id="myTab2Content">
                                        <div class="tab-pane fade active show" id="inbox4" role="tabpanel" aria-labelledby="inbox-tab4">
                                          <table id="example1" class="table table-bordered table-striped mt-3 mb-3">
                                            <thead>
                                            <td style="width: 100%;"> 
                                                <span style="display: flex; justify-content: space-between;"> 
                                                  <span style="margin-left:3%; ">From</span>
                                                  <span style="margin-left:3%"> Message</span>
                                                  <span style="margin-left:3%"> Time</span>
                                                </span>
                                              </td>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $query=mysqli_query($con,"SELECT * FROM tblmessages WHERE Name='$fname' ORDER BY MailDate DESC");
                                            $cnt=1;
                                            while($result=mysqli_fetch_array($query)){
                                            ?>

                                            <tr>
                                              <td style="width: 100%;"> 
                                                <form method="POST">
                                                  <a a href="?ID=<?php echo $result['ID'];?>" style="display: flex; justify-content: space-between;"> 
                                                  <?php 
                                                    $statusQuery = mysqli_query($con, "SELECT status FROM tblmessages WHERE ID = '".$result['ID']."'");
                                                    $statusResult = mysqli_fetch_assoc($statusQuery);
                                                    $status = $statusResult['status'];

                                                    $color = ($status != 0) ? 'gray' : 'black';

                                                    echo '<span style="margin-left:3%; font-size:20px; font-weight:bold; color:'.$color.'">'.$result['SentBy'].'</span>'; 
                                                  ?>
                                                    <?php
                                                      $fullContent = $result['MailContent'];
                                                      $words = explode(' ', $fullContent);
                                                      $firstTenWords = implode(' ', array_slice($words, 0, 8));
                                                      echo '<span style="margin-left:3%; font-size:16px; font-weight:normal; color:'.$color.'">'. $firstTenWords. '</span>';
                                                    ?>
                                                    <?php
                                                      echo '<span style="font-size:16px; font-weight:bold; color:'.$color.'">'. $result['MailDate'].'</span>';
                                                    ?> 
                                                  </a>
                                                </form>
                                              </td>
                                            </tr>
                                            <?php $cnt++;} ?>
                                      
                                            </tbody>
                                          </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,"searching": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
<?php } ?>
