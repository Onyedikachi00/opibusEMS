<?php session_start();
// Database Connection
include('../includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { header('location:index.php');
}
else{
    $hodid = intval($_SESSION['aid']);

    // Fetch hod's data from the database
    $hodid = $_SESSION['aid'];
    $getUserQuery = mysqli_query($con, "SELECT department FROM hodtable WHERE ID = '$hodid'");
    $result = mysqli_fetch_assoc($getUserQuery);
    $hodDept = $result['department'];

  if (isset($_POST['submit'])) {
      $username = $_POST['sadminusername'];
      $fname = $_POST['fullname'];
      $email = $_POST['emailid'];
      $mobileno = $_POST['mobilenumber'];
      $password = md5($_POST['inputpwd']);
      $usertype = $_POST['usertype']; 
      $department = $_POST['department'];

        // Insert data into the appropriate table
        $query = mysqli_query($con, "INSERT INTO stafftable (UserName, Name, Position, MobileNumber, Email, Password, UserType, Department) VALUES ('$username', '$fname','$position', '$mobileno', '$email', '$password', '$usertype', '$department')");

      //   if ($query) {
      //     echo "<script>alert('Account Created Successfully.');</script>";
      //     echo "<script type='text/javascript'> document.location = 'manage-subadmins.php'; </script>";
      //   } 
      //   else {
      //     echo "<script>alert('Something went wrong. Please try again.');</script>";
      // }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Opibus Management System  | Add Staff</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <style>
    .input-group-append .btn {
        border-radius: 0 .25rem .25rem 0;
    }
  </style>
  <!--Function Email Availabilty---->
  <script>
    function checkEmailAvailability() {
    var email = $("#emailid").val();
    if(email){
        $.ajax({
            type: 'POST',
            url: 'check_availability.php',
            data: {emailid: email},
            success: function(response){
                $("#email-availability-status").html(response);
                }
            });
        }
    }
  </script>
  <!--Function User Name Availabilty---->
  <script>
  function checkAvailability() {
  $("#loaderIcon").show();
  jQuery.ajax({
  url: "check_availability.php",
  data:'username='+$("#sadminusername").val(),
  type: "POST",
  success:function(data){
  $("#user-availability-status").html(data);
  $("#loaderIcon").hide();
  },
  error:function (){}
  });
  }
  </script>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php include_once("../includes/hod-navbar.php");?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <?php include_once("../includes/sidebar.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create New Account</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="hod_manage-staff.php">Accounts</a></li>
              <li class="breadcrumb-item active">Add Account</li>
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
              <div class="card-header" class="btn" style=" background-color:darkcyan;">
              <h5 class="text-center" style=" font-weight:bolder; color:white;">Add A Staff Account</h5>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="subadmin" method="post">
                <div class="card-body">
                  <!-- Username-->
                  <div class="form-group">
                    <label for="exampleInputusername">Username (used for login)</label>
                    <input type="text" placeholder="Enter Sub-Admin Username"  name="sadminusername" id="sadminusername" class="form-control" pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$" title="Username must be alphanumeric 6 to 12 chars" onBlur="checkAvailability()"  required>
                    <span id="user-availability-status" style="font-size:14px;"></span>
                  </div>
                  <!-- Account User's Full Name--->
                  <div class="form-group">
                    <label for="exampleInputFullname">Full Name</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Sub-Admin Full Name" required>
                  </div>
                  <!--Account Email---->
                  <div class="form-group mt-1 mb-2">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="emailid" name="emailid" placeholder="Enter email" onBlur="checkEmailAvailability()" required>
                    <span id="email-availability-status" style="font-size:14px;"></span>
                  </div>
                  <!-- Account Contact Number---->
                  <div class="form-group">
                    <label for="text">Mobile Number</label>
                    <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter Mobile Number" required>
                  </div>
                  <!---Password--->
                  <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <div class="input-group">
                          <input type="password" class="form-control" id="inputpwd" name="inputpwd" placeholder="Password" required>
                          <div class="input-group-append">
                              <button class="btn btn-outline-secondary toggle-password" type="button">
                                  <i class="fas fa-lock" id="togglePasswordIcon" ></i>
                              </button>
                          </div>
                      </div>
                  </div>                    
                  <!---Account Type--->
                  <div class="form-group" style="display: none;">
                    <label for="exampleInputusertype1">Staff type</label>
                    <input type="text" class="form-control" value="Staff" id="usertype" name="usertype" placeholder="Enter User Type" required>
                  </div>
                  <!---Department--->
                  <div class="form-group" style="display: none;">
                    <label for="exampleInputDate">Department</label>
                    <input type="text" class="form-control" value="<?php echo $hodDept ?>" id="department" name="department" placeholder="Enter User Type" required>
                  </div>
                  <!---Other Position--->
                  <div class="form-group">
                    <label for="exampleInputDate">Other Positions</label>
                    <p style=" text-align: center; color:red; font-size:15px; font-weight:600;"> Note: Seperate positions with commas.  Example: 2nd Semester Maths teacher, Yr3's HOD.</p>
                    <textarea style="height: 200px;" type="text" class="form-control" id="position" name="position" placeholder="Enter Staff Position(s). Eg; 1st Semester Maths teacher"></textarea>               
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-header text-center">
                  <button type="submit" class="btn" style=" background-color:darkcyan; color:white;" name="submit" id="submit">Submit</button>
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
<script>
document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelector('.toggle-password').addEventListener('click', function (e) {
        const passwordInput = document.getElementById('inputpwd');
        const passwordIcon = document.getElementById('togglePasswordIcon');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordIcon.classList.remove('fa-lock');
            passwordIcon.classList.add('fa-lock-open');
        } else {
            passwordInput.type = 'password';
            passwordIcon.classList.remove('fa-lock-open');
            passwordIcon.classList.add('fa-lock');
        }
    });
});
</script>

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
