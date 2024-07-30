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
//Code For Updation the Application
if (isset($_POST['submit'])) {
  $eid = intval($_GET['applyid']);
  $intStatus = mysqli_real_escape_string($con, $_POST['intStatus']);
  $oremark = mysqli_real_escape_string($con, $_POST['officialremak']);

  $query = mysqli_query($con, "UPDATE tblapplication SET officialRemark='$oremark', interviewStatus='$intStatus' WHERE appid='$eid'");
}

if (isset($_POST['submitastats'])) {
  $eid = intval($_GET['applyid']);
  $approvalStatus = mysqli_real_escape_string($con, $_POST['approvalStatus']);

  $query = mysqli_query($con, "UPDATE tblapplication SET approvalStatus= '$approvalStatus' WHERE appid='$eid'");
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Opibus Management System  | Interview Details</title>

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
            <h1>Interview Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Interview Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php 
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-12">
            <div class="card">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
       
                  <tbody>
                    <?php 
                    $eid=intval($_GET['applyid']);
                    $query=mysqli_query($con,"select * from tblapplication where appid='$eid'");
                    $cnt=1;
                    while($result=mysqli_fetch_array($query)){
                      
                      $istatus = $result['interviewStatus'];
                      $astatus = $result['approvalStatus'];
                    ?>
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6">
                          <ol class="float-right">
                            <span style="font-weight:bolder; font-size: 18px;">Interview Status :&nbsp; </span>
                            <?php
                            if ($istatus =='Pending') {
                              $color ='orange';
                            }
                            elseif ($istatus == 'Conducted') {
                              $color ='forestgreen';
                            }
                            if ($astatus =='Disapproved') {
                              $acolor ='crimson';
                            }
                            elseif ($astatus == 'Approved') {
                              $acolor ='forestgreen';
                            }
                            if ($astatus =='Pending') {
                              $show ='display:none;';
                            }
                            echo '<span class="" style="background-color:'.$color.'; padding:10px; margin-right:15px; color:white; border-radius:5px; font-weight:bolder;">' .$istatus.'</span> <span class="" style="background-color:'.$acolor.'; padding:10px;'.$show.' margin-right:15px; color:white; border-radius:5px; font-weight:bolder;">' .$astatus.'</span>' ?>
                          </ol>
                        </div>
                      </div>
                    </div>
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6">
                          <ol class="float-right">
                            <?php
                            echo '' ?>
                          </ol>
                        </div>
                      </div>
                    </div>                  
                  <tr>
                  <th>Full Name</th>
                    <td><?php echo $result['appName']?></td>
                    <th>Job Title</th>
                   <td> <?php echo $result['appJob']?></td>
                  </tr>
                  <tr>
                    <th>Phone Number</th>
                    <td><?php echo $result['appNum']?></td>
                    <th>Email Address</th>
                    <td><?php echo $result['appEmail']?></td>
                  </tr>

                  <tr>
                  <th>About You</th>
                    <td colspan="3"><?php echo $result['message']?></td>
                  </tr>

                  <tr>
                    <th>Date of interview</th>
                    <td ><?php echo $result['acceptedDate']?></td>
                    <th>Time for interview</th>
                    <td><?php echo $result['acceptedTime']?></td>
                  </tr>
                  
                  <tr>
                    <th>Staff involved</th>
                    <td colspan="3"><?php echo $result['staffInvolved']?></td>
                  </tr>
                  
                  <?php if($result['interviewStatus']=='Conducted'):?>
                  <tr>
                    <th>Official Remark</th>
                    <td colspan="3"><?php echo $result['officialRemark']?></td>
                  </tr>

                  <?php endif;?>

                  
                </tbody>     
                </table>

                <?php 
                  // Fetch files associated with the user
                  $files_sql = "SELECT file_name FROM files WHERE appid='$eid'";
                  $files_result = $con->query($files_sql);

                  if ($files_result->num_rows > 0) {
                      echo "Files:<br>";
                      // output file names
                      while($file_row = $files_result->fetch_assoc()) {
                          $file_name = $file_row["file_name"];
                          echo "<a href='download.php?file=$file_name'>$file_name</a><br>";
                      }
                  } else {
                      echo "No files found.";
                  }

                  ?>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <?php if($result['interviewStatus']=='Pending'):?>
          <div class="container" style="text-align:center;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
              Interview Status
            </button>
          </div>
        <?php endif;?>
     
        <?php if ($result['interviewStatus'] =='Conducted' && ($result['approvalStatus'] =='' || $result['approvalStatus'] =='Pending')): ?>
          <div class="container" style="text-align:center;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
              Final Approval
            </button>
        </div>
        <?php endif; ?>

        <?php $cnt++;} ?>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once('includes/footer.php');?>


</div>
<!-- ./wrapper -->


<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Interview Status</h4>
                <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: crimson ; color: white; font-weight:bolder;">X</button>
            </div>
            <div class="modal-body">
                <form name="takeaction" method="post">

                    <p>
                        <select class="form-control" name="intStatus" id="statusSelect" required>
                            <option value="Pending">Pending</option>
                            <option value="Conducted">Conducted</option>
                        </select>
                    </p>

                    <p>
                      <textarea class="form-control" name="officialremak" placeholder="Official Remark" rows="5" required></textarea>
                    </p>

                    <input type="submit" class="btn btn-success" name="submit" style="text-align:center; margin-left:40%;" value="update">
                </form>
            </div>
        </div>
    </div>
</div>

<div id="myModal1" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Final Status</h4>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style=" color: white; font-weight: bolder; border-radius:50%">X</button>
            </div>
            <div class="modal-body text-center">
                <form name="takeaction" class="text-center mt-3" method="post">
                    <p>
                        <select class="form-control mt-3" name="approvalStatus" id="approvalStatus" required>
                            <option style="color: grey; font-weight: bolder; font-size:15px" value="">Update Status</option>
                            <option style="color: forestgreen; font-weight: bolder; margin: left 40%; font-size:20px" value="Approved">Approved</option>
                            <option style="color: crimson; font-weight: bolder; font-size:20px" value="Disapproved">Disapproved</option>
                        </select>
                    </p>
                    <input type="submit" class="btn btn-success mt-1" name="submitastats" style="text-align:center;" value="update">
                </form>
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