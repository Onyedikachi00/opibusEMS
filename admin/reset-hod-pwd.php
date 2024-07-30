<?php session_start();
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{
// Code for rese the password of sub admin
if(isset($_POST['reset'])){
$hodid=intval($_GET['hdid']);
$password=md5($_POST['inputpwd']);

$query=mysqli_query($con,"update hodtable set Password='$password' where ID='$hodid'");
if($query){
// echo "<script>alert('Sub-Admin password reset successfully.');</script>";
echo "<script type='text/javascript'> document.location = 'manage-subadmins.php'; </script>";
} else {
echo "<script>alert('Something went wron. Please try again.');</script>";
}
}

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Opibus Management System  | Password Reset</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!--Function password and confirm password validation---->
<script type="text/javascript">
function checkpass()
{
if(document.resetpassword.inputpwd.value!=document.resetpassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.resetpassword.confirmpassword.focus();
return false;
}
return true;
}   
</script>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php include_once("includes/navbar.php");?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <?php include_once("includes/sidebar.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Reset Subadmin Password</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Sub Admins</a></li>
              <li class="breadcrumb-item active">Reset Subadmin Password</li>
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
          <div class="col-md-8 mx-auto text-left">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form name="resetpassword" method="post" onsubmit="return checkpass();"
              >
                <div class="card-body">

                  <!---Password--->
                  <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <div class="input-group">
                          <input type="password" class="form-control" id="inputpwd" name="inputpwd" placeholder="Password" required>
                          <div class="input-group-append">
                              <button class="btn btn-outline-secondary toggle-password" style="border-radius: 0 .25rem .25rem 0" type="button">
                                  <i class="fas fa-lock" id="togglePasswordIcon"></i>
                              </button>
                          </div>
                      </div>
                  </div>
                  
                  <!---Confirm Password--->
                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <div class="input-group">
                      <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" required>
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary toggle-confirm-password" style="border-radius: 0 .25rem .25rem 0" type="button">
                          <i class="fas fa-lock" id="togglePasswordConfirmIcon"></i>
                        </button>
                      </div>
                    </div>
                  </div>
  
      
                </div>
                <!-- /.card-body -->
                <div class="card-header">
                  <button type="submit" class="btn btn-success" style="margin-left: 45%" name="reset" id="reset">Reset</button>
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
<?php include_once('includes/footer.php');?>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script>
  // JavaScript to toggle password visibility
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
<script>
  // JavaScript to toggle password visibility
  document.addEventListener('DOMContentLoaded', (event) => {
      document.querySelector('.toggle-confirm-password').addEventListener('click', function (e) {
          const passwordInput = document.getElementById('confirmpassword');
          const passwordIcon = document.getElementById('togglePasswordConfirmIcon');
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
</body>
</html>
<?php } ?>
