<?php session_start();
// Database Connection
include('../includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { header('location: ../index.php');
}
else{ 

  // Fetch user data from the database
  $hodid = $_SESSION['aid'];
  $getUserQuery = mysqli_query($con, "SELECT * FROM hodtable WHERE ID = '$hodid'");
  $result = mysqli_fetch_assoc($getUserQuery);
  $hodName = $result['Name'];
  $hodEmail = $result['Email'];
  $hodMobile = $result['MobileNumber'];
  $usert = $result['UserType'];
  $deptmnt = $result['department'];

  if (isset($_POST['submit'])) {
      $hodName = mysqli_real_escape_string($con, $_POST['name']);
      $hodEmail = mysqli_real_escape_string($con, $_POST['email']);
      $hodMobile = mysqli_real_escape_string($con, $_POST['phoneNumber']);
      $lDate = mysqli_real_escape_string($con, $_POST['lateDate']);
      $aTime = mysqli_real_escape_string($con, $_POST['arrivalTime']);
      $lReason = mysqli_real_escape_string($con, $_POST['leaveReason']);
      $utype = mysqli_real_escape_string($con, $_POST['usertype']);
      $dept = mysqli_real_escape_string($con, $_POST['department']);

      $query = mysqli_query($con, "INSERT INTO tbllaterequest (Name, Email, PhoneNumber, Date, Time, Reason, UserType, Department) VALUES ('$hodName', '$hodEmail', '$hodMobile', '$lDate', '$aTime', '$lReason', '$utype', '$dept')");

      if($query){
        // echo "<script>alert('Request Sent successfully.');</script>";
        echo "<script type='text/javascript'> document.location = 'hod-latearrival-requests.php'; </script>";
      } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
      }

  }
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Opibus Management System  | Late Arrival Request</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php include_once("../includes/hod-navbar.php");?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<?php include_once('../includes/sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Request Late Arrival </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="hod-dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Request Late Arrival</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10 mx-auto text-left">
            <!-- general form elements -->
            <div class="card">
              <!-- /.card-header -->
              <!-- form start -->
              <form name="subadmin" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" class="form-control mb-4" name="name" style="font-weight:bolder; font-size:18px; color: black;" readonly value="<?php echo $hodName?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhoneNumber">Phone Number</label>
                        <input type="text" class="form-control mb-4" name="phoneNumber" style="font-weight:bolder; font-size:18px; color: black;" readonly value="<?php echo $hodMobile?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email</label>
                        <input type="text" class="form-control mb-4" name="email" style="font-weight:bolder; font-size:18px; color: black;" readonly value="<?php echo $hodEmail?>">
                    </div>
                    <div class="form-group" style="display:none;">
                        <label for="exampleInputUserType">UserType</label>
                        <input type="text" class="form-control mb-4" name="usertype" style="font-weight:bolder; font-size:18px; color: black;" readonly value="<?php echo $usert?>">
                    </div>
                    <div class="form-group" style="display:none;">
                        <label for="exampleInputDepartment">Department</label>
                        <input type="text" class="form-control mb-4" name="department" style="font-weight:bolder; font-size:18px; color: black;" readonly value="<?php echo $deptmnt?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDate">Date for request</label>
                        <input type="date" class="form-control mb-4" name="lateDate" placeholder="Late Arrival Date" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputReason">Why do you think you'll you be late?</label>
                        <textarea  class="form-control mt-2 mb-1" name="leaveReason" placeholder="Reason For Late Arrival." style="height: 200px;" required></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputDateTime">Estimated Arrival Time?</label>
                      <input type="datetime-local" class="form-control mb-4" name="arrivalTime" placeholder="" required>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-header">
                  <button type="submit" class="btn btn-success" style="margin-left: 45%" name="submit" id="submit">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

        
       
          </div>
          <!--/.col (left) -->
  
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
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
<?php } ?>
