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
//Code For Deletion the subadmin
if($_GET['action']=='delete'){
$subadminid=intval($_GET['said']);
$query=mysqli_query($con,"delete from admintable where ID='$subadminid'");

$staffid=intval($_GET['stfid']);
$query=mysqli_query($con,"delete from stafftable where ID='$staffid'");

$hodid=intval($_GET['hdid']);
$query=mysqli_query($con,"delete from hodtable where ID='$hodid'");
if($query){
  // echo "<script>alert('Account Deleted successfully.');</script>";
  echo "<script type='text/javascript'> document.location = 'manage-subadmins.php'; </script>";
} else {
  echo "<script>alert('Something went wrong. Please try again.');</script>";
}

$queryAdmin = mysqli_query($con, "SELECT * FROM admintable");
$adminData = mysqli_fetch_all($queryAdmin, MYSQLI_ASSOC);

// Fetch data from stafftable
$queryStaff = mysqli_query($con, "SELECT * FROM stafftable");
$staffData = mysqli_fetch_all($queryStaff, MYSQLI_ASSOC);

// Fetch data from hodtable
$queryHOD = mysqli_query($con, "SELECT * FROM hodtable");
$hodData = mysqli_fetch_all($queryHOD, MYSQLI_ASSOC);

// Combine data from all three tables
$combinedData = array_merge($adminData, $staffData, $hodData);

}
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Opibus Management System | Manage Sub Admins</title>

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
            <h1>Manage Accounts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Manage Accounts</li>
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
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6"> 
                </div>
                <div class="col-sm-6">         
                  <ol class="float-right">
                    <a href="add-subadmin.php" class="btn" style=" padding:8px; color:white; background-color:black; border-radius:5px; font-weight:bolder;">+ Add Account</a>
                  </ol>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <div id="accordion">
                  <!-- Admin Table -->
                  <div class="accordion mb-3 mt-3">
                    <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="false">
                      <h5 style=" font-weight:bolder; color:black;">Admins <i class="fa fa-caret-down"></i></h5>
                      <hr/>
                    </div>
                    <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion" >
                      <!-- Admin Table -->
                          <table id="" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>Email ID</th>
                                <th>Mobile Number</th>
                                <th>Details</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $query=mysqli_query($con,"select * from admintable where UserType = 'Super Admin'");
                                $cnt=1;
                                while($result=mysqli_fetch_array($query)){
                              ?>
                              <tr>
                                <td><?php echo $cnt;?></td>
                                <td><?php echo $result['UserName']?></td>
                                <td><?php echo $result['Name']?></td>
                                <td><?php echo $result['Email']?></td>
                                <td><?php echo $result['MobileNumber']?></td>
                                <td><a class="btn" style="background-color:black; color:#fff;" href="admin-details.php?said=<?php echo $result['ID'];?>"title="View Details" class=" ">Details</a></td>
                              </tr>
                              <?php $cnt++; } ?>
                            </tbody>
                            <tfoot>
                              <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>Email ID</th>
                                <th>Mobile Number</th>
                                <th>Details</th>
                              </tr>
                            </tfoot>
                          </table>
                          <hr/>
                    </div>
                  </div>

                  <!-- HR Officer Table -->
                  <div class="accordion mb-3 mt-3">
                    <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-4" aria-expanded="false">
                      <h5 style=" font-weight:bolder; color:black;">HR Officers <i class="fa fa-caret-down"></i></h5>
                      <hr/>
                    </div>
                    <div class="accordion-body collapse" id="panel-body-4" data-parent="#accordion" >
                      <!-- HR Officer Table -->
                          <table id="" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>Email ID</th>
                                <th>Mobile Number</th>
                                <th>Details</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $query=mysqli_query($con,"select * from admintable where UserType ='HR Officer'");
                                $cnt=1;
                                while($result=mysqli_fetch_array($query)){
                              ?>
                              <tr>
                                <td><?php echo $cnt;?></td>
                                <td><?php echo $result['UserName']?></td>
                                <td><?php echo $result['Name']?></td>
                                <td><?php echo $result['Email']?></td>
                                <td><?php echo $result['MobileNumber']?></td>
                                <td><a class="btn" style="background-color:black; color:#fff;" href="admin-details.php?said=<?php echo $result['ID'];?>"title="View Details" class=" ">Details</a></td>
                              </tr>
                              <?php $cnt++; } ?>
                            </tbody>
                            <tfoot>
                              <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>Email ID</th>
                                <th>Mobile Number</th>
                                <th>Details</th>
                              </tr>
                            </tfoot>
                          </table>
                          <hr/>
                    </div>
                  </div>

                  <!-- Hod Table -->
                  <div class="accordion mb-3 mt-3">
                    <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-2" aria-expanded="false">
                      <h5 style=" font-weight:bolder; color:black;">Head of Departments <i class="fa fa-caret-down"></i></h5>
                      <hr/>
                    </div>
                    <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">
                      <!-- HOD Table -->
                          <table id="" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>Email ID</th>
                                <th>Mobile Number</th>
                                <th>Details</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $query=mysqli_query($con,"select * from hodtable");
                                $cnt=1;
                                while($result=mysqli_fetch_array($query)){
                              ?>
                              <tr>
                                <td><?php echo $cnt;?></td>
                                <td><?php echo $result['UserName']?></td>
                                <td><?php echo $result['Name']?></td>
                                <td><?php echo $result['Email']?></td>
                                <td><?php echo $result['MobileNumber']?></td>
                                <td><a class="btn" style="background-color:black; color:#fff;" href="hod-details.php?hdid=<?php echo $result['ID'];?>" title="View Details" class=" ">Details</a></td>
                                <th>
                                  <a href="edit-hod.php?hdid=<?php echo $result['ID'];?>" title="Edit Sub HR Officer Details"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
                                  <a href="manage-subadmins.php?action=delete&&hdid=<?php echo $result['ID']; ?>" style="color:red;" title="Delete this record" onclick="return confirm('Do you really want to delete this record?');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                  <a href="reset-hod-pwd.php?hdid=<?php echo $result['ID']; ?>" title="Reset Sub HR Officer Password"> <i class="fa fa-key" aria-hidden="true"></i></a>
                                </th>
                              </tr>
                              <?php $cnt++; } ?>
                            </tbody>
                            <tfoot>
                              <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>Email ID</th>
                                <th>Mobile Number</th>
                                <th>Details</th>
                                <th>Action</th>
                              </tr>
                            </tfoot>
                          </table>
                          <hr/>
                    </div>
                  </div>

                  <!-- Staff Tabl -->
                  <div class="accordion mb-3 mt-3">
                    <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-3" aria-expanded="false">
                      <h5 style=" font-weight:bolder; color:black;">Staff <i class="fa fa-caret-down"></i></h5>
                    </div>
                    <div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion">
                          <table id="" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>Email ID</th>
                                <th>Mobile Number</th>
                                <th>Details</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $query=mysqli_query($con,"select * from stafftable");
                                $cnt=1;
                                while($result=mysqli_fetch_array($query)){
                              ?>
                              <tr>
                                <td><?php echo $cnt;?></td>
                                <td><?php echo $result['UserName']?></td>
                                <td><?php echo $result['Name']?></td>
                                <td><?php echo $result['Email']?></td>
                                <td><?php echo $result['MobileNumber']?></td>
                                <td><a class="btn" style="background-color:black; color:#fff;" href="staff-details.php?stfid=<?php echo $result['ID'];?>" title="View Details" class=" ">Details</a>
                                </td>
                                <th>
                                  <a href="edit-staff.php?stfid=<?php echo $result['ID'];?>" title="Edit Sub Staff Details"> <i class="fa fa-edit" aria-hidden="true"></i> </a> |
                                  <a href="manage-subadmins.php?action=delete&&stfid=<?php echo $result['ID']; ?>" style="color:red;" title="Delete this record" onclick="return confirm('Do you really want to delete this record?');"><i class="fa fa-trash" aria-hidden="true"></i> </a> |
                                  <a href="reset-staff-pwd.php?stfid=<?php echo $result['ID']; ?>" title="Reset Sub Staff Password"> <i class="fa fa-key" aria-hidden="true"></i></a>
                                </th>
                              </tr>
                              <?php $cnt++; } ?>
                            </tbody>
                            <tfoot>
                              <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>Email ID</th>
                                <th>Mobile Number</th>
                                <th>Details</th>
                                <th>Action</th>
                              </tr>
                            </tfoot>
                          </table>
                          <hr/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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