<?php session_start();
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{
// Code for Add New Department
  if(isset($_POST['submit'])){
    //Getting Post Values  
    $dname= mysqli_real_escape_string($con, $_POST['deptname']);
    $hodname= mysqli_real_escape_string($con, $_POST['hodname']);
    $description= mysqli_real_escape_string($con, $_POST['description']);
    $courses= mysqli_real_escape_string($con, $_POST['courses']);

    // Split the comma-separated courses into an array
    $course_list = explode(',', $courses);

    $query=mysqli_query($con,"insert into department (deptName, hodName, deptDescription,deptCourses) values('$dname', '$hodname', '$description','$courses')");
    if($query){
    echo "<script type='text/javascript'> document.location = 'manage-department.php'; </script>";
    } else {
    echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
  }
  if(isset($_POST['updateHOD'])){
    $hodname = mysqli_real_escape_string($con, $_POST['hodname']);
    $deptname = mysqli_real_escape_string($con, $_POST['deptname']);

  // Check if the name exists in hodtable
  $queri = mysqli_query($con, "SELECT * FROM hodtable WHERE Name='$hodname'");
  if(mysqli_num_rows($queri) > 0) {
      // Update the department column in hodtable
      $row = mysqli_fetch_array($queri);
      $newDepartment = $row['department'] . ', ' . $deptname;
      mysqli_query($con, "UPDATE hodtable SET department='$newDepartment' WHERE Name='$hodname'");
  } else {
      // Check if the name exists in stafftable
      $query = mysqli_query($con, "SELECT * FROM stafftable WHERE Name='$hodname'");
      if(mysqli_num_rows($query) > 0) {
          // Get the row from stafftable
          $row = mysqli_fetch_array($query);
          $newDepartment = $deptname;
          $newUserType = 'HOD';
          
          // Insert the updated row into hodtable
        mysqli_query($con, "INSERT INTO hodtable (Name, UserType, department, Position, MobileNumber, Email, Address, Gender, MaritalS, DoB, NoK, NoKphone, filename) VALUES ('$hodname', '$newUserType', '$newDepartment', '".$row['Position']."', '".$row['MobileNumber']."', '".$row['Email']."', '".$row['Address']."', '".$row['Gender']."', '".$row['MaritalS']."', '".$row['DoB']."', '".$row['NoK']."', '".$row['NoKphone']."', '".$row['filename']."')");
      }
  }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Opibus Management System  | Add Department</title>

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
  <!-- AJAX -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            <h1>Add Department</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="manage-department.php">Departments</a></li>
              <li class="breadcrumb-item active">Add Department</li>
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
            <div class="card card-primary">
              <div class="card-header" class="btn" style=" background-color:peru;">
              <h5 class="text-center" style=" font-weight:bolder; color:white;">Add A Department</h5>
              </div>
              <!-- /.card-header -->
                <form name="addDepartment" method="post">
                    <div class="card-body">

                        <!--Department Name--->
                        <div class="form-group">
                            <label for="exampleInputDeptname">Department Name</label>
                            <input type="text" class="form-control" id="deptname" name="deptname" placeholder="Enter Department Name" required>
                        </div>

                        <!--Department's Head---->
                        <div class="form-group">
                          <label for="exampleInputHod1">Head of Department</label>
                          <select class="form-control select2-multiple" name="hodname" id="hodname" required>
                              <option value="" style="font-size:15px; font-weight:600;">Select HOD</option>
                              <?php
                              $queri = mysqli_query($con, "SELECT Name, UserType FROM hodtable");
                              while ($row = mysqli_fetch_array($queri)) {
                                  echo '<option value="'.$row['Name'].'">'.$row['Name'].' ('.$row['UserType'].')'.'</option>';
                              }
                              $query = mysqli_query($con, "SELECT Name, UserType FROM stafftable");
                              while ($row = mysqli_fetch_array($query)) {
                                  echo '<option value="'.$row['Name'].'">'.$row['Name'].' ('.$row['UserType'].')'.'</option>';
                              }
                              ?>
                          </select>
                        </div>

                        <!--Department Description---->
                        <div class="form-group">
                            <label for="exampleInputDesc1">Department Description </label>
                            <textarea type="text" class="form-control" id="description" name="description" placeholder="Department Description" required style="height: 200px;"></textarea>
                        </div>

                        <!--Department Courses---->
                        <div class="form-group">
                            <label for="exampleInputDesc1" class="mb-1 mt-1">Department Courses </label>
                            <p style=" text-align: center; color:red; font-size:14px; font-weight:700"> Note: Seperate courses with commas.  Example: courseA, courseB.</p>
                            <textarea type="text" class="form-control" id="courses" name="courses" placeholder="Department Courses" style="height:80px" required></textarea>
                        </div>
                        

                        <!--Submit Button-->
                        <div class="card-header text-center">
                        <button type="submit" style=" background-color:peru; color:white;" class="btn" name="submit" id="submit">Submit</button>
                        </div>
        
                    </div>
                    <!-- /.card-body -->
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
<!--Tinymce -->
<script src="../dist/js/tinymce/tinymce.min.js"></script>
<script>
  tinymce.init({
    selector: '#descriptio',
    height: 400,
    plugins:[
        'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
        'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media', 
        'table', 'emoticons', 'template', 'codesample'
    ],
    toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |' + 
    'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
    'forecolor backcolor emoticons',
    menu: {
        favs: {title: 'menu', items: 'code visualaid | searchreplace | emoticons'}
    },
    menubar: 'favs file edit view insert format tools table',
    content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}'
  });
</script>
<script>
  $(document).ready(function() {
      $('select[name="hodname"]').on('change', function() {
          var selectedName = $(this).val();
          var deptName = $('#deptname').val();
          $.ajax({
              type: "POST",
              url: "", // Same page
              data: { hodname: selectedName, deptname: deptName, updateHOD: true },
              success: function(response) {
                  console.log("Department updated successfully");
              }
          });
      });
  });
</script>
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
</body>
</html>
<?php } ?>
