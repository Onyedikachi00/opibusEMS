<?php session_start();
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{
// Code for update Department details
if(isset($_POST['submit'])){
//Getting Post Values 
  $dname= mysqli_real_escape_string($con, $_POST['deptname']);
  $hodname= mysqli_real_escape_string($con, $_POST['hodname']);
  $description = mysqli_real_escape_string($con, $_POST['dscrptn']); 
  $courses = mysqli_real_escape_string($con, $_POST['courses']);
  $departmentid=intval($_GET['deptid']);

  $query=mysqli_query($con,"update department set deptName ='$dname',hodName ='$hodname', deptDescription ='$description', deptCourses ='$courses' where ID='$departmentid'");
  if($query){
  echo "<script type='text/javascript'> document.location = 'manage-department.php'; </script>";
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
  <title>Opibus Management System  | Edit Department</title>

  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!--CKEditor-->
  <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

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
            <h1>Edit Department</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="manage-department.php">Departments</a></li>
              <li class="breadcrumb-item active">Edit Department</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row text-center">
          <!-- left column -->
          <div class="col-md-10 mx-auto text-left">
            <!-- general form elements -->
            <div class="card">

            <?php
            $departmentid=intval($_GET['deptid']);
            $query=mysqli_query($con,"select * from department where id='$departmentid'");
            $cnt=1;
            while($result=mysqli_fetch_array($query)){
            ?>

              <!-- form start -->
              <form name="addDepartment" method="post">
                <div class="card-body">

                  <!--Name--->
                  <div class="form-group">
                      <label for="exampleInputname">Department's Name</label>
                      <input type="text" class="form-control" id="deptname" name="deptname" value="<?php echo $result['deptName']?>" required>
                  </div>

                  
                  <!--HOD's Name--->
                  <div class="form-group">
                      <label for="exampleInputname">Department's HOD</label>
                      <input type="text" class="form-control" id="hodname" name="hodname" value="<?php echo $result['hodName']?>" required>
                  </div>

                <!-- Department Description -->
                <div class="form-group">
                    <label for="exampleInputcontent">Department Description</label>
                    <textarea class="form-control" id="dscrptn" name="dscrptn" style="height: 200px;" required><?php echo $result['deptDescription']?></textarea>
                </div>

                <!-- Department Courses -->
                <div class="form-group">
                    <label for="exampleInputcontent">Department Courses</label>
                    <p style=" text-align: center; color:red; font-size:14px; font-weight:700"> Note: Seperate courses with commas.  Example: courseA, courseB.</p>
                    <textarea class="form-control" id="courses" name="courses" required><?php echo $result['deptCourses']?></textarea>
                </div>

                <div class="card-header text-center">
                  <button type="submit" class="btn" style="background-color:peru; color:white;" name="submit" id="submit">Update</button>
                </div>
      
                </div>
                <!-- /.card-body -->
                <?php } ?>         

            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </form>
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
<script src="../plugins/select2/js/select2.full.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
});
</script>
<script>
// Initialize CKEditor on the textarea
CKEDITOR.replace('descriptio',{
  height: 200
});
</script>
</body>
</html>
<?php } ?>
