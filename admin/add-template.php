<?php session_start();
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{// Code for Add New Teacher
    if(isset($_POST['submit'])){
    //Getting Post Values
    $tname= mysqli_real_escape_string($con, $_POST['tempname']);
    $content= mysqli_real_escape_string($con, $_POST['tempcontent']);
    
    $query=mysqli_query($con,"insert into tblletter(name,content) values('$tname','$content')");
    if($query){
    echo "<script type='text/javascript'> document.location = 'letter-templates.php'; </script>";
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
  <title>Opibus Management System  | Add Template</title>

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
  <script src="https://cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>

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
            <h1>Add Template</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="letter-templates.php">Templates</a></li>
              <li class="breadcrumb-item active">Add Template</li>
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
              <form name="addlawyer" method="post">
                <div class="card-body">

                    <!--  Name--->
                    <div class="form-group">
                        <label for="exampleInputname">Template's Name</label>
                        <input type="text" class="form-control" id="tempname" name="tempname"  required>
                    </div>
                    <!-- Template Content -->
                    <div class="form-group">
                        <label for="exampleInputcontent">Template Content</label>
                        <textarea class="form-control" id="tempcontent" style="height: 200px;" name="tempcontent" required></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary text-center" style="margin-left: 45%" name="submit" id="submit">Submit</button>
                    </div>
      
                </div>
                <!-- /.card-body -->
          
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
<!--Tinymce -->
<script src="../dist/js/tinymce/tinymce.min.js"></script>
<script src="../dist/js/text.js"></script>
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
</body>
</html>
<?php } ?>
