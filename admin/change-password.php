<?php session_start();
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { header('location:index.php');
}
else{
// Code for change Password
if(isset($_POST['change'])){
$admid=$_SESSION['aid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from admintable where ID='$admid' and   Password ='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update admintable set Password='$newpassword' where ID='$admid'");
echo '<script>alert("Your password successully changed.")</script>';
} else {

echo '<script>alert("Your current password is wrong.")</script>';
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Opibus Management System  | Change Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!--Function Email Availabilty---->
<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
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
            <h1>Change Password</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Change Password</li>
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
          <div class="col-md-9 mx-auto text-left">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header" style="background-color:darkorange; padding: 20px;">
                <h3 class="card-title" style="margin-left: 40%; color:white; font-size: 20px; font-weight: bold;">Reset your Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post"  name="changepassword" onsubmit="return checkpass();">  
                <div class="card-body">
                  <!-- Current Password -->
                  <div class="form-group">
                      <label for="exampleInputFullname">Current Password</label>
                      <div class="input-group">
                        <input class="form-control" id="currentpassword" name="currentpassword" type="password" placeholder="Enter Current Password" required>
                        <div class="input-group-append">
                            <span class="input-group-text ">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>
                      </div>
                  </div>
                  <!---New Password--->
                  <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <div class="input-group">
                          <input class="form-control " id="newpassword" type="password" name="newpassword" placeholder="Enter New Password" required="true">
                          <div class="input-group-append">
                              <button class="btn btn-outline-secondary toggle-password" style="border-radius: 0 .25rem .25rem 0" type="button">
                                  <i class="fas fa-lock" id="togglePasswordIcon"></i>
                              </button>
                          </div>
                      </div>
                  </div>
                  
                  <!---Confirm Password--->
                  <div class="form-group">
                    <label for="exampleInputPassword2">Confirm Password</label>
                    <div class="input-group">
                      <input class="form-control " id="confirmpassword" type="password" name="confirmpassword" placeholder="Renter New Password" required="true">
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary toggle-confirm-password" style="border-radius: 0 .25rem .25rem 0" type="button">
                          <i class="fas fa-lock" id="togglePasswordConfirmIcon"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <button type="submit" class="btn" name="change" id="change" style="background-color:darkorange; color:white; font-size: 20px;">Reset</button>
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
          const passwordInput = document.getElementById('newpassword');
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('currentpassword');
    const icon = document.querySelector('.input-group-text i');

    icon.addEventListener('click', function() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-lock');
            icon.classList.add('fa-lock-open');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-lock-open');
            icon.classList.add('fa-lock');
        }
    });
});
</script>
</body>
</html>
<?php } ?>
