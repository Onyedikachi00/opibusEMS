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

  if (isset($_POST['submitStatus'])) {
    $eid = intval($_GET['applyid']);
    $estatus = mysqli_real_escape_string($con, $_POST['status']);
    $query = mysqli_query($con, "UPDATE tblapplication SET applyStatus='$estatus' WHERE appid='$eid'");
  }
  
  if (isset($_POST['submitDateTime'])) {
    $eid = intval($_GET['applyid']);
    $acceptedDate = mysqli_real_escape_string($con, $_POST['acceptedDate']);
    $acceptedTime = mysqli_real_escape_string($con, $_POST['acceptedTime']);
    $staffinvld = implode(', ', $_POST['staffInvolved']);
    $query = mysqli_query($con, "UPDATE tblapplication SET acceptedDate='$acceptedDate', acceptedTime='$acceptedTime', staffInvolved= '$staffinvld' WHERE appid='$eid'");

    if($query){
      // echo "<script>alert(' Interview Scheduled');</script>";
      echo "<script type='text/javascript'> document.location = 'scheduled-interview.php'; </script>";
    } else {
    echo "<script>alert('Something went wrong. Plase try again.');</script>";
    }
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Opibus Management System  | Application Details</title>

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
            <h1>Application Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Application Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-11 mx-auto">
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
                    ?>
                                     
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

                  <?php if($result['applyStatus']!='' || $result['applyStatus']!='Pending'):?>
                  <tr>
                    <th>Application Status</th>
                    <td colspan="3" class=" text-center">
                      <?php 
                        if ($result['applyStatus'] == 'Rejected') {
                          $color ='orange';
                        }
                        elseif($result['applyStatus'] == 'Accepted') {
                          $color ='forestgreen';
                        }
                        elseif ($result['approvalStatus'] == 'Pending') {
                          $color ='orange';
                        }
                        echo '<span style="background-color:'.$color.'; padding:10px; margin:5px; color:white; border-radius:5px; font-weight:bolder;">'.$result['applyStatus'].'</span>'
                      ?>
                    </td>
                  </tr>
                  <?php endif;?>

                  <?php if($result['approvalStatus']!='' || $result['approvalStatus']!='Pending'):?>
                  <tr>
                    <th>Final Status</th>
                    <td colspan="3" class=" text-center">
                      <?php 
                        if ($result['approvalStatus'] == 'Pending') {
                          $color ='orange';
                        }
                        elseif($result['approvalStatus'] == 'Approved') {
                          $color ='forestgreen';
                        }
                        elseif($result['approvalStatus'] == 'Disapproved') {
                          $color ='crimson';
                        }
                        echo '<span class="" style="background-color:'.$color.'; padding:10px; margin:10px; color:white; border-radius:5px; font-weight:bolder;">'.$result['approvalStatus'].'</span>'
                      ?>
                  </tr>

                  <?php endif;?>

                  <?php if(!empty($result['acceptedDate']) && !empty($result['acceptedTime'])): ?>
                    <tr>
                      <th>Date of interview</th>
                      <td ><?php echo $result['acceptedDate']?></td>
                      <th>Time for interview</th>
                      <td><?php echo $result['acceptedTime']?></td>
                    </tr>
                    <tr>
                      <th>Staff members for the interview</th>
                      <td colspan="3"><?php echo $result['staffInvolved']?></td>
                    </tr>
                  <?php endif;?>               

                  <?php if($result['applyStatus']=='Pending'):?>
                  <tr>
                    <td colspan="4" style="text-align:center;">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Take Action</button>
                  </td>
                  <?php endif;?>
                  <?php if($result['applyStatus'] == 'Accepted' && (empty($result['acceptedDate']) || empty($result['acceptedTime']))): ?>
                  <tr>
                    <td colspan="4" style="text-align:center;">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">Schedule Interview</button>
                  </td>
                  <?php endif;?>

                  <?php $cnt++;} ?>
             
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
                <h4 class="modal-title">Update Application Status</h4>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style=" color: white; font-weight: bolder; border-radius:50%">X</button>
            </div>
            <div class="modal-body text-center">
                <form name="takeaction" class="text-center mt-3" method="post">
                    <p>
                        <select class=" text-center form-control mt-3" name="status" id="statusSelect" required>
                            <option style="color: grey; font-weight: bolder; font-size:15px" value="">Update Status</option>
                            <option style="color: forestgreen; font-weight: bolder; font-size:20px" value="Accepted">Accepted</option>
                            <option style="color: crimson; font-weight: bolder; font-size:20px" value="Rejected">Rejected</option>
                        </select>
                    </p>
                    <input type="submit" class="btn btn-success mt-1" name="submitStatus" style="text-align:center;" value="update">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal for scheduling date and time -->
<div id="myModal2" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Schedule time for Interview</h4>
                <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: crimson; color: white; font-weight: bolder;">X</button>
            </div>
            <div class="modal-body">
                <form name="takeaction" method="post">

                  <p id="secondModalContent">
                    
                    <div class="form-group">
                      <label for="exampleInputTime">Time for interview</label>
                      <input type="time" class="form-control" name="acceptedTime" id="acceptedTimeInput" placeholder="Accepted Time" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputDate">Date for Interview</label>
                      <input type="date" class="form-control" name="acceptedDate" id="acceptedDateInput" placeholder="Accepted Date" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputDate">Staff involved</label>
                      <p class="mt-3 mb-2" style="color:red; font-weight: bold; font-size: 14px;"> Please use the 'ctrl' or 'cmd' button and left click to select multiple options </p>
                      <select class="form-control select2-multiple" name="staffInvolved[]" multiple="multiple" required>
                        <?php
                        $queri = mysqli_query($con, "SELECT Name FROM hodtable");
                        while ($row = mysqli_fetch_array($queri)) {
                          echo '<option value="'.$row['Name'].'">'.$row['Name'].'</option>';
                        }
                        $query = mysqli_query($con, "SELECT Name FROM stafftable");
                        while ($row = mysqli_fetch_array($query)) {
                          echo '<option value="'.$row['Name'].'">'.$row['Name'].'</option>';
                        }
                        ?>
                      </select>
                    </div>
                    
                  </p>
                  <input type="submit" class="btn btn-success" name="submitDateTime" style="text-align:center;" value="update">
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
<script>
  $(document).ready(function() {
    $('.select2-multiple').select2();
  });
</script>
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