<?php session_start();
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{
// Code for Update  Sub Admin Details
if(isset($_POST['update'])){
$username=mysqli_real_escape_string($con,$_POST['sadminusername']);
$fname=mysqli_real_escape_string($con,$_POST['fullname']);
$email=mysqli_real_escape_string($con,$_POST['emailid']);
$mobileno=mysqli_real_escape_string($con,$_POST['mobilenumber']);
$subadminid=intval($_GET['said']);

$query=mysqli_query($con,"update admintable set UserName = '$username' , Name='$fname', MobileNumber='$mobileno', Email='$email WHERE ID='$subadminid'");
if($query){

echo "<script type='text/javascript'> document.location = 'manage-subadmins.php'; </script>";
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
  <title>Opibus Management System  | Edit/Update Sub admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  
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
            <h1>Edit Subadmin Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Sub Admins</a></li>
              <li class="breadcrumb-item active">Edit Subadmin Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<?php 
$said=intval($_GET['said']);
$query=mysqli_query($con,"select * from admintable where ID='$said'");
$cnt=1;
while($result=mysqli_fetch_array($query)){
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10 mx-auto text-left">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form name="subadmin" method="post">
                <div class="card-body">
                  <div class="row g-3">
                    <div class="col-sm-6">
                      <!-- Username-->
                      <div class="form-group">
                        <label for="exampleInputusername">Username (used for login)</label>
                        <input type="text" name="sadminusername" id="sadminusername" class="form-control" value="<?php echo $result['UserName'];?>" required 
                        <?php echo empty($result['UserName']) ? '' : 'readonly'; ?>>
                      </div>

                    </div>
                    <div class="col-sm-6">
                      <!-- Account User's Full Name--->
                      <div class="form-group">
                        <label for="exampleInputFullname">Full Name</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $result['Name'];?>" placeholder="Enter Sub-Admin Full Name" required>
                      </div>
                    </div>
                  </div>
                  <div class="row g-3">
                    <div class="col-sm-6">
                      <!--Account Email---->
                      <div class="form-group mt-1 mb-2">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="emailid" name="emailid" placeholder="Enter email" required value="<?php echo $result['Email'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- Account Contact Number---->
                      <div class="form-group">
                        <label for="text">Mobile Number</label>
                        <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter email" required value="<?php echo $result['MobileNumber'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row g-3">
                    <div class="col-sm-6">
                      <!--Address---->
                      <div class="form-group mt-1 mb-2">
                        <label for="exampleInputEmail1">Home Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Home Address" required value="<?php echo $result['Address'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- D.o.B---->
                      <div class="form-group">
                        <label for="exampleInputDob">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter D.O.B" required value="<?php echo $result['DoB'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row g-3">
                    <div class="col-sm-6">
                      <!-- Gender-->
                      <div class="form-group">
                        <label for="exampleInputusername">Gender</label>
                        <p>
                            <select class="form-control" name="gender" id="gender"  required>
                              <option style="color: black; font-weight:bolder; display:none;" value="<?php echo $result['Gender'];?>"><?php echo $result['Gender'];?></option>
                              <option value="Male" style="color: black; font-weight:bolder;">Male</option>
                              <option value="Female" style="color: black; font-weight:bolder">Female</option>
                            </select>
                          </p>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- Marital status--->
                      <div class="form-group">
                        <label for="exampleInputMaritalStats">Marital Status</label>
                        <p>
                            <select class="form-control" name="maritals" id="maritals"  required>
                                <option style="color: black; font-weight:bolder; display:none;" value="<?php echo $result['MaritalS'];?>"><?php echo $result['MaritalS'];?></option>
                                <option value="Single" style="color: black; font-weight:bolder;">Single </option>
                                <option value="Married" style="color: black; font-weight:bolder">Married</option>
                                <option value="Divorced" style="color: black; font-weight:bolder">Divorced</option>
                            </select>
                          </p>
                      </div>
                    </div>
                  </div>
                  <div class="row g-3">
                    <div class="col-sm-6">
                      <!-- Next of Kin -->
                      <div class="form-group mt-1 mb-2">
                        <label for="exampleInputNok">Next of Kin</label>
                        <input type="text" class="form-control" id="nok" name="nok" placeholder="Enter Next of Kin" required value="<?php echo $result['NoK'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- Next of Kin's Contact -->
                      <div class="form-group">
                        <label for="exampleInputNokP">Next of Kin's Phone</label>
                        <input type="text" class="form-control" id="nokphone" name="nokphone" placeholder="Enter Next of Kin's Contact" required value="<?php echo $result['NoKphone'];?>">
                      </div>
                    </div>
                  </div>                
                  <?php } ?>
                </div>
                
                <!-- /.card-body -->
                <div class="card-header">
                  <button type="submit" class="btn btn-success" style="margin-left: 45%"  name="update" id="update">Update</button>
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
</body>
</html>
<?php } ?>
