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
  if (isset($_POST['submit'])) {
    $tempxrqid=intval($_GET['txreqid']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $comnt = mysqli_real_escape_string($con, $_POST['comment']);
    $query = mysqli_query($con, "UPDATE tbltemporaryexit SET Status ='$status', Comment ='$comnt' WHERE ID ='$tempxrqid'");
  }

?>

<!DOCTYPE html>
<html lang="en">
  <?php 
    $tempxrqid=intval($_GET['txreqid']);
    $query=mysqli_query($con,"SELECT * FROM tbltemporaryexit WHERE ID = '$tempxrqid'");
    $getUserQuery = mysqli_query($con, "SELECT * FROM tbltemporaryexit WHERE ID = '$tempxrqid'");
    $result = mysqli_fetch_assoc($getUserQuery);
    $hodName = $result['Name'];
    $status = $result['Status'];
    $cnt=1;
    while($result=mysqli_fetch_array($query)){
  ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Opibus Management System |<?php echo $result['Name']."'s "?> &nbsp;Temporary Exit Requests</title>

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
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Accounts</a></li>
              <li class="breadcrumb-item active">Temporary Exit Requests</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6"> 
        </div>
        <div class="col-sm-6">                
        <ol class="float-right">
            <span style="font-weight:bolder; font-size: 18px;">Status :&nbsp;</span>
            <?php
            if ($status =='Pending') {
              $color ='orange';
            }
            elseif ($status == 'Approved') {
              $color ='forestgreen';
            }
            elseif ($status == 'Rejected') {
              $color ='crimson';
            }
            echo '<span class="" style="background-color:'.$color.'; padding:10px; margin-right:15px; color:white; border-radius:5px; font-weight:bolder;">' .$status ?></span>
        </ol>
        </div>
      </div>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-11 mx-auto text-center">
            <div class="card">
              <div class="card-header">
                <h3>Temporary Exit Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
       
                  <tbody>
                    <?php 
                    $tempxrqid=intval($_GET['txreqid']);
                    $query=mysqli_query($con,"SELECT * FROM tbltemporaryexit WHERE ID = '$tempxrqid'");
                    $cnt=1;
                    while($result=mysqli_fetch_array($query)){
                    ?>
                    <tr>
                      <th>Name</th>
                      <td colspan="3"><?php echo $result['Name']?></td>
                    </tr>
                    <tr>
                      <th>Date Request was Submitted</th>
                      <td colspan="3"><?php echo $result['Date']?></td>
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
                            echo '<a href="request/hodTemporaryExit/' . $fileName . '" download>' . $fileName . '</a><br>';
                        }
                        ?>
                      </td>
                    </tr>
                  </tbody>     
                </table>
                <?php if($result['Status']=='' || $result['Status']=='Pending'):?>
                  <div class="container" style="text-align:center;">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                      Update Status
                    </button>
                  </td>
                <?php endif;?>                 
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
      <!-- /.container-fluid-->
      <?php $cnt++;} ?>
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

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Request Status</h4>
            </div>
            <div class="modal-body">
                <form name="takeaction" method="post">

                    <p>
                        <select class="form-control" name="status" id="status" required>
                            <option value="Pending">Pending</option>
                            <option value="Approved">Approved</option>
                            <option value="Rejected">Rejected</option>
                        </select>
                    </p>

                    <p>
                      <textarea class="form-control" name="comment" placeholder="Official Remark" style="height:200px" required></textarea>
                    </p>

                    <input type="submit" class="btn btn-success" name="submit" style="text-align:center; margin-left:40%;" value="update">
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: crimson; color: white; font-weight:bolder; font-size:medium;">close</button>
            </div>
        </div>
    </div>
</div>

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