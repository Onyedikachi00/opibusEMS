<?php session_start();

error_reporting(0);
// Database Connection
include('../includes/config.php');

//Validating Session
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{
    if (isset($_POST['submit'])) {
        $staffid = intval($_GET['stfid']);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Opibus Management System | Temporary Exit Details</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php include_once("../includes/staff-navbar.php");?>
  <!-- /.navbar -->

 <?php include_once("../includes/sidebar.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Temporary Exit Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="staff-dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Temporary Exit Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-11 mx-auto text-center">
            <div class="card">
            <?php 
              $staffid=intval($_GET['stfid']);
              $query=mysqli_query($con,"SELECT * FROM tbltemporaryexit WHERE ID='$staffid'");
              $cnt=1;
              while($result=mysqli_fetch_array($query)){
              ?>
              <div class="card-header">
                <h3>Temporary Exit Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
       
                  <tbody>
                    <tr>
                      <th>Date Request was Submitted</th>
                      <td><?php echo $result['Date']?></td>
                      <th>Status</th>
                      <td>
                      <?php 
                        if ($result['Status'] == 'Pending') {
                          $color ='orange';
                        }
                        elseif ($result['Status'] == 'Approved') {
                          $color ='forestgreen';
                        }
                        elseif ($result['Status'] == 'Rejected') {
                          $color ='crimson';
                        }
                        echo '<span class="" style="background-color:'.$color.'; padding:10px; margin-right:15px; color:white; border-radius:5px; font-weight:bolder;">'.$result['Status']
                      ?>
                    </td>
                    </tr>
                    <tr>
                      <th>Date and Time of Exit</th>
                      <td><?php echo $result['StartTime']?></td>
                      <th>Date and Time of Return</th>
                      <td><?php echo $result['EndTime']?></td>
                    </tr>
                    <tr>
                      <th>Reason</th>
                      <td colspan="3"><?php echo $result['Reason']?></td>
                    </tr>
                    <tr>
                      <th>Substitute(s)</th>
                      <td colspan="3">
                        <?php                            
                        // Split the comma-separated courses into an array
                        $sub_list = explode(',', $result['Substitute']);
                        foreach ($sub_list as $sub) {
                            echo '<i class="fas fa-angle-right"></i> '. $sub . "<br>";
                        }
                        ?>                               
                      </td>
                    </tr>
                    <tr>
                      <th>Official's Comment</th>
                      <td colspan="3"><?php echo $result['Comment']?></td>
                    </tr>
                    <tr>
                      <th>File(s)</th>
                      <td colspan="3">
                        <?php
                        $fileNames = explode(', ', $result['filename']);
                        foreach ($fileNames as $fileName) {
                            echo '<a href="../request/StaffTemporaryExit/' . $fileName . '" download>' . $fileName . '</a><br>';
                        }
                        ?>
                      </td>
                    </tr>
                  </tbody>     
                </table>                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <?php $cnt++;} ?>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once('../includes/footer.php');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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