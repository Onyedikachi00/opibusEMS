<?php session_start();
error_reporting(0);
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Opibus Management System  | Conducted Interviews</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php include_once("includes/navbar.php");?>
  <!-- /.navbar -->

 <?php include_once("includes/sidebar.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Scheduled Interview</h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Scheduled Interviews</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6"> 
                </div>
                <div class="col-sm-6">         
                  <ol class="float-right">
                    <a href="conducted-interview.php" class="btn" style=" padding:8px; color:white; background-color:black; border-radius:5px; font-weight:bolder;">Conducted Interviews</a>
                  </ol>
                </div>
              </div>
            </div>
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th> 
                    <th>Full Name</th>
                    <th>Job Title</th>
                    <th>Phone Number</th>
                    <th>Status</th>
                    <th>Interview Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
<?php $query=mysqli_query($con,"select * from tblapplication where (applyStatus='Accepted' && (interviewStatus = 'Conducted' || interviewStatus = 'Pending') && approvalStatus = 'Pending') ORDER BY postingDate DESC");
$cnt=1;
while($result=mysqli_fetch_array($query)){
?>

                  <tr>
                    <td><?php echo $cnt;?></td>  
                    <td><?php echo $result['appName']?></td>
                    <td><?php echo $result['appJob']?></td>
                    <td><?php echo $result['appNum']?></td>
                    <td>
                      <?php 
                        if ($result['interviewStatus'] == 'Pending') {
                          $color ='orange';
                        }
                        elseif($result['interviewStatus'] == 'Conducted' && $result['approvalStatus'] == 'Pending') {
                          $color ='forestgreen';
                          $astats = '<span style="background-color: orange; padding:10px 5px; margin-right:15px; color:white; border-radius:5px; font-weight:bolder;"> &nbsp; Waiting... &nbsp;</span>';
                        }
                        echo '<span class="" style="background-color:'.$color.'; padding:10px; margin-right:15px; color:white; border-radius:5px; font-weight:bolder;">'.$result['interviewStatus'].'</span>'. $astats
                      ?>
                    </td>  
                    <td><?php echo $result['acceptedDate']?></td>
                    <th>
     <a href="interview-details.php?applyid=<?php echo $result['appid'];?>" title="View Details" class="btn btn-primary btn-xm"> View Details</a> 
 </th>
                  </tr>
         <?php $cnt++;} ?>
             
                  </tbody>
                  <tfoot>
   <tr>
                    <th>#</th> 
                    <th>Full Name</th>
                    <th>Job Title</th>
                    <th>Phone Number</th>
                    <th>Status</th>
                    <th>Interview Date</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /card -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once('includes/footer.php');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
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