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
  $hodid = intval($_SESSION['aid']);

  // Fetch hod's data from the database
  $hodid = $_SESSION['aid'];

  $getUserQuery = mysqli_query($con, "SELECT Name,  department FROM hodtable WHERE ID = '$hodid'");
  $result = mysqli_fetch_assoc($getUserQuery);
  $hodDept = $result['department'];

  //Code For Deletion the staff
  if($_GET['action']=='delete'){

    $staffid=intval($_GET['stfid']);
    $query=mysqli_query($con,"delete from stafftable where ID='$staffid'");

    // if($query){
    //   echo "<script>alert('Account Deleted successfully.');</script>";
    //   echo "<script type='text/javascript'> document.location = 'hod_manage-staff.php'; </script>";
    // } else {
    //   echo "<script>alert('Something went wrong. Please try again.');</script>";
    // }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Opibus Management System | Manage Department</title>

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
            <h1>My Department</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="hod-dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">My Department</li>
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
                 <!-- <ol class="float-right">
                    <a href="hod_edit-department.php" class="btn" style=" padding:8px; color:white; background-color:darkcyan; border-radius:5px; font-weight:bolder;">Edit Details</a>
                 </ol>
                    <ol class="float-right">
                    <a href="hod_addstaff.php" class="btn" style=" padding:8px; color:white; background-color:darkcyan; border-radius:5px; font-weight:bolder;">+ Add Account</a>
                  </ol> -->
                </div>
              </div>
            </div>

            <div class="card">
              <?php 
                $query=mysqli_query($con,"select * from department where deptName ='$hodDept'");
                $cnt=1;
                while($result=mysqli_fetch_array($query)){                
              ?>
              <div class="card-header">
                <h4 class="text-center" style=" font-weight:bolder; color:black;"> <?php echo $result['deptName']."'s Details"?></h4>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
       
                  <tbody>                                
                    <tr>
                    <th>Department Name</th>
                      <td colspan="3"><?php echo $result['deptName']?></td>
                    </tr>
                    <tr>
                      <th>About the Department</th>
                      <td colspan="3"><?php echo $result['deptDescription']?></td>
                    </tr>
                    <tr>
                      <th>Department Courses</th>
                      <td colspan="3">
                        <?php                            
                        // Split the comma-separated courses into an array
                        $course_list = explode(',', $result['deptCourses']);
                        foreach ($course_list as $course) {
                            echo '<i class="fas fa-angle-right"></i> '. $course . "<br>";
                        }
                        ?>                               
                      </td>
                    </tr>
                    <tr>
                      <th>HOD</th>
                      <td>
                        <?php
                        $displayName = $result['deptName'];
                        $hod_query = mysqli_query($con, "SELECT Name FROM hodtable WHERE department='$displayName'");
                        $hod_result = mysqli_fetch_array($hod_query);
                        echo $hod_result['Name'];
                        ?>
                      </td>
                    </tr>
                  </tbody>     
                </table>                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <?php $cnt++;} ?>

            <div class="card">
              <div class="card-header text-center">
                <h4 style=" font-weight:bolder; color:black;">Staff Accounts</h4>
              </div>
              <div class="card-body">
                <table id="" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Email ID</th>
                        <th>Mobile Number</th>
                        <th>Details</th>
                        <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <?php
                    $query = mysqli_query($con,"SELECT * FROM stafftable WHERE department = '$hodDept'");
                    $cnt=1;
                    while($result=mysqli_fetch_array($query)){
                    ?>
                    <tbody>
                        <tr>
                        <td><?php echo $cnt;?></td>
                        <td><?php echo $result['UserName']?></td>
                        <td><?php echo $result['Name']?></td>
                        <td><?php echo $result['Email']?></td>
                        <td><?php echo $result['MobileNumber']?></td>
                        <td><a class="btn" style="background-color:darkcyan; color:#fff;" href="hod_staffdetails.php?stfid=<?php echo $result['ID'];?>" title="View Details" class=" ">Details</a>
                        </td>
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
                        <!-- <th>Action</th> -->
                        </tr>
                    </tfoot>
                </table>
                <hr/>
              </div>
              
            </div>
            
            <div class="card">
    <div class="card-header text-center">
        <h4 style="font-weight: bolder; color: black;">Pending Requests</h4>
    </div>
    <div class="card-body">
        <table id="" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Type</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
              <?php
                $cnt = 1;
                $query = mysqli_query($con, "
                    SELECT ID, Name, 'Late' AS Type, Status FROM tbllaterequest WHERE Status = 'Pending' && department = '$hodDept'
                    UNION
                    SELECT ID, Name, 'Leave' AS Type, Status FROM tblleaverequest WHERE Status = 'Pending' && department = '$hodDept'
                    UNION
                    SELECT ID, Name, 'Temporary Exit' AS Type, Status FROM tbltemporaryexit WHERE Status = 'Pending' && department = '$hodDept'
                ");
                $type = $result['Type'];
                while ($result = mysqli_fetch_array($query)) { 
                  $type = $result['Type'];
              ?>
                  <tr>
                    <td> <?php echo $cnt ?></td>
                    <td><?php echo $result['Name'] ?></td>
                    <td><?php echo $result['Type'] ?></td>
                    <td><?php echo '<span style="background-color: orange; padding: 10px; color:white; font-weight: bold; border-radius: 5px;">' . $result['Status'] . '</span></td>' ?></td>
                  </tr>
              <?php $cnt++;}?>
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Type</th>
                    <th>Status</th>
                </tr>
            </tfoot>
        </table>
        <hr />
    </div>
</div>


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