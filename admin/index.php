<?php
session_start();
include('../includes/config.php');

if (isset($_POST['login'])) {
  $uname = $_POST['username'];
  $Password = md5($_POST['inputpwd']);

  // Check admin table
  $adminQuery = mysqli_query($con, "SELECT ID, UserName, UserType FROM admintable WHERE UserName = '$uname' AND Password = '$Password'");
  $adminData = mysqli_fetch_array($adminQuery);

  // Check staff table
  $staffQuery = mysqli_query($con, "SELECT ID, UserName, UserType FROM stafftable WHERE UserName = '$uname' AND Password = '$Password'");
  $staffData = mysqli_fetch_array($staffQuery);

   // Check HOD table
  $hodQuery = mysqli_query($con, "SELECT ID, UserName, UserType FROM hodtable WHERE UserName = '$uname' AND Password = '$Password'");
  $hodData = mysqli_fetch_array($hodQuery);

  if ($adminData) {
      $_SESSION['aid'] = $adminData['ID'];
      $_SESSION['uname'] = $adminData['UserName'];
      $_SESSION['utype'] = $adminData['UserType'];
      header('location: dashboard.php'); 
  } elseif ($staffData) {
      $_SESSION['aid'] = $staffData['ID'];
      $_SESSION['uname'] = $staffData['StaffUserName'];
      $_SESSION['utype'] = $staffData['UserType'];
      header('location: staff/staff-dashboard.php'); 
  } elseif ($hodData) {
      $_SESSION['aid'] = $hodData['ID'];
      $_SESSION['uname'] = $hodData['HODUserName'];
      $_SESSION['utype'] = $hodData['UserType'];
      header('location: hod/hod-dashboard.php');
  } else {
      echo "<script>alert('Invalid Details.');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Opibus Management System | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" style="background-color:#fff;">
<a href="../index.php" class="btn rounded-pill " style="position:absolute; top:50px; left: 50px; color:#fe5d37;"><i class="fa fa-arrow-left ms-3"></i> &nbsp; Back to home</a>
  
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline" style="background-color:#fff5f3;">
    <div class="card-header text-center">
      <a href="../index.php" class="h1" style="color:#000;"><b>Admin</b> | Opibus</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope" style="color:#fe5d37;"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="inputpwd" required>
          <div class="input-group-append">
            <div class="input-group-text">

              <span class="fas fa-lock" id="togglePassword" style="cursor: pointer;color:#fe5d37;"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">

          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-block" name="login" style="background-color:#fe5d37; color:#fff;">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="password-recovery.php" style="color:blue;">I forgot my password</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

<script>
  const togglePassword = document.querySelector('#togglePassword');
  const passwordField = document.querySelector('input[type="password"]');

  togglePassword.addEventListener('click', function () {
    // Toggle the password visibility
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);

    // Toggle the eye icon
    this.classList.toggle('fa-lock-open');
  });
</script>

<!-- /.login-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
