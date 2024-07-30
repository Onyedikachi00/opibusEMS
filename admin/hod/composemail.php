<?php session_start();

include('../includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { 
header('location: ../index.php');
}
else{ 
    $hodid = $_SESSION['aid'];
    $getUserQuery = mysqli_query($con, "SELECT Name FROM hodtable WHERE ID = '$hodid'");
    $result = mysqli_fetch_assoc($getUserQuery);
    $usename = $result['Name'];


    if (isset($_POST['submit'])) {
        $mtype= mysqli_real_escape_string($con,$_POST['mailtype']);
        $subj= mysqli_real_escape_string($con,$_POST['subject']);
        $uname = mysqli_real_escape_string($con,$_POST['sentby']);
        $fname = mysqli_real_escape_string($con,$_POST['fname']);
        $utype = mysqli_real_escape_string($con, $_POST['usertype']); 
        $mcontent= mysqli_real_escape_string($con,$_POST['mailcontent']);

        $fileNames = array();
        foreach ($_FILES['files']['name'] as $key => $name) {
            $tmp_name = $_FILES['files']['tmp_name'][$key];
            $file_name = mysqli_real_escape_string($con, $name);

            if (move_uploaded_file($tmp_name, "../mail_files/$file_name")) {
                $fileNames[] = $file_name; 
            }
        }
        $fileNamesString = implode(', ', $fileNames);
       
        $query = mysqli_query($con, "INSERT INTO tblmessages (MailType, Subject, SentBy, Name, UserType, MailContent, filename) VALUES ('$mtype', '$subj', '$uname', '$fname', '$utype', '$mcontent', '$fileNamesString')");

        $last_id = $con->insert_id; 

        
  
        // if ($query) {
        //     echo "<script>alert('Mail Sent Successfully.');</script>";
        //     echo "<script type='text/javascript'> document.location = 'inbox.php'; </script>";
        // }
    }
  ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Opibus Management System | Compose Mail</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <?php include_once('../includes/hod-navbar.php');?>

  <!-- Main Sidebar Container -->
  <?php include_once('../includes/sidebar.php');?>  


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Compose Mail</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="inbox.php">Inbox</a></li>
              <li class="breadcrumb-item active">Compose Mail</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="">
                    <div class="card-body mt-3">
                        <div class="row">
                        <div class="col-10 col-sm-10 col-md-2">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active show" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-selected="false">Send to Admin</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile" aria-selected="false">Send to HOD</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab" aria-controls="contact" aria-selected="true">Send to Staff</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" href="inbox.php" style="background-color:darkgray; color:white; font-weight:bold;" aria-selected="true">Inbox</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="outbox.php" aria-selected="false" style="background-color:darkgray; color:white; font-weight:bold;">Outbox</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-10 col-sm-10 col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content no-padding" id="myTab2Content">
                                        <!-- Send to Admin -->
                                        <div class="tab-pane fade active show" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                                            <form name="subadmin" method="post" enctype="multipart/form-data">
                                                <div class="form-group mb-3" style="display: flex; justify-content: space-between;">
                                                    <span for="exampleInputmailtype">To: </span>
                                                    <select class="form-control select2-multiple inline" style=" width:40%;" name="fname" id="fname">
                                                        <option value="" style="font-size:15px;">Select Admin</option>
                                                        <?php
                                                        $query = mysqli_query($con, "SELECT * FROM admintable");
                                                        while ($row = mysqli_fetch_array($query)) {
                                                            echo '<option style="color: black; font-weight:bolder" value="'.$row['Name'].'">'.$row['Name'].'('.$row['UserType'].')</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputmailtype">Mail type</label>
                                                    <p>
                                                        <select class="form-control" name="mailtype" id="mailtype" required>
                                                            <option value="">Select Mail Type</option>
                                                            <option value="Complaints & Enquiries" style="color: black; font-weight:bolder">Complaints & Enquiries</option>
                                                            <option value="Disciplinary Actions" style="color: black; font-weight:bolder">Disciplinary Actions</option>
                                                            <option value="Training & Development" style="color: black; font-weight:bold">Training & Development</option>
                                                            <option value="Others" style="color: black; font-weight:bold">Others</option>
                                                        </select>
                                                    </p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputSubject">Subject</label>
                                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Mail Subject" required>
                                                </div>
                                                <div class="form-group" style="display: none;">
                                                    <label for="exampleInputsentby">User Name</label>
                                                    <input type="text" class="form-control" id="sentby" name="sentby" value="<?php echo $usename?>" required readonly>
                                                </div>
                                                <div class="form-group" style="display: none;">
                                                    <label for="exampleInputUserType">UserType</label>
                                                    <input type="text" class="form-control" id="usertype" name="usertype" value="Super Admin" required readonly>
                                                </div>
                                                <div class="form-group">
                                                <div class="form-group" style="display: none;">
                                                    <label for="exampleInputUserType">active</label>
                                                    <input type="number" class="form-control" id="active" name="active" value="0" required readonly>
                                                </div>
                                                    <label for="exampleInputMail">Mail</label>
                                                    <textarea class="form-control" style="height: 200px;" id="mailcontent" name="mailcontent" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                <label for="exampleInputFile">Select File(if any)</label>
                                                <input type="file" name="files[]" multiple class="form-control border-0">
                                                </div>
                                                <div class="card-body">
                                                    <button type="submit" class="btn btn-primary" style="margin-left: 45%" name="submit" id="submit">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- Send to HOD -->
                                        <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="form-group mb-3" style="display: flex; justify-content: space-between;">
                                                    <span for="exampleInputmailtype">To: </span>
                                                    <select class="form-control select2-multiple inline" style=" width:40%;" name="fname" id="fname">
                                                        <option value="" style="font-size:15px;">Select HOD</option>
                                                        <?php
                                                        $query = mysqli_query($con, "SELECT Name FROM hodtable");
                                                        while ($row = mysqli_fetch_array($query)) {
                                                            echo '<option style="color: black; font-weight:bolder" value="'.$row['Name'].'">'.$row['Name'].'</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputmailtype">Mail type</label>
                                                    <p>
                                                        <select class="form-control" name="mailtype" id="mailtype" required>
                                                            <option value="">Select Mail Type</option>
                                                            <option value="Complaints & Enquiries" style="color: black; font-weight:bolder">Complaints & Enquiries</option>
                                                            <option value="Disciplinary Actions" style="color: black; font-weight:bolder">Disciplinary Actions</option>
                                                            <option value="Training & Development" style="color: black; font-weight:bold">Training & Development</option>
                                                            <option value="Others" style="color: black; font-weight:bold">Others</option>
                                                        </select>
                                                    </p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputSubject">Subject</label>
                                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Mail Subject" required>
                                                </div>
                                                <div class="form-group" style="display: none;">
                                                    <label for="exampleInputsentby">User Name</label>
                                                    <input type="text" class="form-control" id="sentby" name="sentby" value="<?php echo $usename?>" required readonly>
                                                </div>
                                                <div class="form-group" style="display: none;">
                                                    <label for="exampleInputUserType">UserType</label>
                                                    <input type="text" class="form-control" id="usertype" name="usertype" value="HOD" required readonly>
                                                </div>
                                                <div class="form-group" style="display: none;">
                                                    <label for="exampleInputUserType">actie</label>
                                                    <input type="number" class="form-control" id="active" name="active" value="0" required readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputMail">Mail</label>
                                                    <textarea class="form-control" style="height: 200px;" id="mailcontent" name="mailcontent" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                <label for="exampleInputFile">Select File(if any)</label>
                                                <input type="file" name="files[]" multiple class="form-control border-0">
                                                </div>
                                                <div class="card-body">
                                                    <button type="submit" class="btn btn-primary" style="margin-left: 45%" name="submit" id="submit">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- Send to Staff -->
                                        <div class="tab-pane fade" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">    
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="form-group mb-3" style="display: flex; justify-content: space-between;">
                                                    <span for="exampleInputmailtype">To: </span>
                                                    <select class="form-control select2-multiple inline" style=" width:40%;" name="fname" id="fname">
                                                        <option value="" style="font-size:15px;">Select Staff</option>
                                                        <?php
                                                        $query = mysqli_query($con, "SELECT Name, department FROM stafftable");
                                                        while ($row = mysqli_fetch_array($query)) {
                                                            echo '<option style="color: black; font-weight:bolder" value="'.$row['Name'].'">'.$row['Name'].'('.$row['department'].')</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputmailtype">Mail type</label>
                                                    <p>
                                                        <select class="form-control" name="mailtype" id="mailtype" required>
                                                            <option value="">Select Mail Type</option>
                                                            <option value="Complaints & Enquiries" style="color: black; font-weight:bolder">Complaints & Enquiries</option>
                                                            <option value="Disciplinary Actions" style="color: black; font-weight:bolder">Disciplinary Actions</option>
                                                            <option value="Training & Development" style="color: black; font-weight:bold">Training & Development</option>
                                                            <option value="Others" style="color: black; font-weight:bold">Others</option>
                                                        </select>
                                                    </p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputSubject">Subject</label>
                                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Mail Subject" required>
                                                </div>
                                                <div class="form-group" style="display: none;">
                                                    <label for="exampleInputsentby">User Name</label>
                                                    <input type="text" class="form-control" id="sentby" name="sentby" value="<?php echo $usename?>" required readonly>
                                                </div>
                                                <div class="form-group" style="display: none;">
                                                    <label for="exampleInputUserType">UserType</label>
                                                    <input type="text" class="form-control" id="usertype" name="usertype" value="Staff" required readonly>
                                                </div>
                                                <div class="form-group" style="display: none;">
                                                    <label for="exampleInputUserType">active</label>
                                                    <input type="number" class="form-control" id="active" name="active" value="0" required readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputMail">Mail</label>
                                                    <textarea class="form-control" style="height: 200px;" id="mailcontent" name="mailcontent" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                <label for="exampleInputFile">Select File(if any)</label>
                                                <input type="file" name="files[]" multiple class="form-control border-0">
                                                </div>
                                                <div class="card-body">
                                                    <button type="submit" class="btn btn-primary" style="margin-left: 45%" name="submit" id="submit">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
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
// Initialize CKEditor on the textarea
CKEDITOR.replace('malcontent',{
  height: 300
});
</script>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
</body>
</html>
<?php } ?>
