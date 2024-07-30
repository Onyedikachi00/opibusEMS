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
  <title>Opibus Management System | Staff Details</title>

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
<?php include_once("../includes/hod-navbar.php");?>
  <!-- /.navbar -->

 <?php include_once("../includes/sidebar.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Staff Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="hod_manage-staff.php">My Department</a></li>
              <li class="breadcrumb-item active">Staff Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid-->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-11 mx-auto text-center">
          <div class="card">
                <?php 
                $staffid=intval($_GET['stfid']);
                $query=mysqli_query($con,"select * from stafftable where ID='$staffid'");
                $cnt=1;
                while($result=mysqli_fetch_array($query)){
                ?>
            
              <div class="card-header">
                <h3><?php echo $result['Name']. "'s"?> Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
       
                  <tbody>
                    <tr>
                      <th>User Name</th>
                      <td><?php echo $result['UserName']?></td>
                      <th>Name</th>
                      <td><?php echo $result['Name']?></td>
                    </tr>
                    <tr>
                      <th>Department</th>
                      <td colspan="3"><?php echo $result['department']?></td>
                    </tr>
                    <tr>
                      <th>Mobile Number</th>
                      <td><?php echo $result['MobileNumber']?></td>
                      <th>Email</th>
                      <td><?php echo $result['Email']?></td>
                    </tr>
                    <tr>
                      <th>Home Address</th>
                      <td><?php echo $result['Address']?></td>
                      <th>Gender</th>
                      <td><?php echo $result['Gender']?></td>
                    </tr>
                    <tr>
                      <th>Marital Status</th>
                      <td><?php echo $result['MaritalS']?></td>
                      <th>Date of Birth</th>
                      <td><?php echo $result['DoB']?></td>
                    </tr>
                    <tr>
                      <th>Next of Kin</th>
                      <td><?php echo $result['NoK']?></td>
                      <th>Next of Kin's Contact</th>
                      <td><?php echo $result['NoKphone']?></td>
                    </tr>
                    <tr>
                      <th>Other Position(s)</th>
                      <td colspan="3">
                        <?php                            
                        // Split the comma-separated courses into an array
                        $position_list = explode(',', $result['Position']);
                        foreach ($position_list as $position) {
                            echo '<i class="fas fa-angle-right"></i> '. $position . "<br>";
                        }
                        ?>                               
                      </td>
                    </tr>
                    <tr>
                      <th>File(s)</th>
                      <td colspan="3">
                      <?php
                        $fileNames = explode(', ', $result['filename']);
                        foreach ($fileNames as $fileName) {
                            echo '<a href="accounts_files/' . $fileName . '" download>' . $fileName . '</a><br>';
                        }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <th>Links</th>
                      <td><a class="btn" style="background-color:firebrick; color:#fff;" href="hod_stafflatearrivalrequest.php?ltreqid=<?php echo $result['ID'];?>">Late Requests</a></td>
                      <td><a class="btn" style="background-color:darkseagreen; color:#fff;" href="hod_staffleaverequests.php?lvreqid=<?php echo $result['ID'];?>">Leave Requests</a></td>
                      <td><a class="btn" style="background-color:darkorchid; color:#fff;" href="hod_stafftemporaryexitrequests.php?txreqid=<?php echo $result['ID'];?>" >Exit Requests</a></td>
                    </tr>
                    <!-- <tr>
                      <th>Other Links</th>
                      <td><a class="btn" style="background-color:black; color:#fff;" href="staff-details.php?stfid=<?php echo $result['ID'];?>">Payroll</a></td>
                      <td></td>
                    </tr> -->
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