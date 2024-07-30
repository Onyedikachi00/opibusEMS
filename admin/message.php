<?php session_start();
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{ 
    $subadminid = $_SESSION['aid'];
    $getUserQuery = mysqli_query($con, "SELECT Name, ID FROM admintable WHERE ID = '$subadminid'");
    $result = mysqli_fetch_assoc($getUserQuery);
    $fname = $result['Name'];


    if (isset($_POST['submit'])) {
        $reply= mysqli_real_escape_string($con,$_POST['reply']);
        $sendername= mysqli_real_escape_string($con,$_POST['sendername']);
        $messid= mysqli_real_escape_string($con,$_POST['ID']);

        $fileNames = array();
        foreach ($_FILES['files']['name'] as $key => $name) {
            $tmp_name = $_FILES['files']['tmp_name'][$key];
            $file_name = mysqli_real_escape_string($con, $name);

            if (move_uploaded_file($tmp_name, "mail_files/$file_name")) {
                $fileNames[] = $file_name; 
            }
        }
        $fileNamesString = implode(', ', $fileNames);
       
        $query = mysqli_query($con, "INSERT INTO replies (reply_text, sender_name, ID, filename) VALUES ('$reply', '$sendername', '$messid', '$fileNamesString')");

        $last_id = $con->insert_id; 

        
  
        // if ($query) {
        //     echo "<script>alert('Reply Sent');</script>";
        //     echo "<script type='text/javascript'> document.location = 'inbox.php'; </script>";
        //     exit;
        // }
    }
  ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Opibus Management System | Message</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
  <!-- CKEditor -->
  <script src="https://cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <!-- Navbar -->
<?php include_once('includes/navbar.php');?>

  <!-- Main Sidebar Container -->

<?php include_once('includes/sidebar.php');?>
    <!-- Sidebar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="inbox.php">Inbox</a></li>
              <li class="breadcrumb-item active">Message</li>
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
                                            <a class="nav-link btn-primary" style="color:white; font-weight:bold;" href="inbox.php" aria-selected="true">Inbox</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn-primary" style="color:white; font-weight:bold;" href="outbox.php" aria-selected="true">Outbox</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-10 col-sm-10 col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content no-padding" id="myTab2Content">
                                        <div class=" container  tab-pane fade active show" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                                        <!-- Message-->
                                        <?php 
                                        $mid=$_GET['messageid'];
                                        $query=mysqli_query($con,"SELECT * FROM tblmessages WHERE ID = $mid");
                                        $cnt=1;
                                        $getUser = mysqli_query($con,"SELECT SentBy FROM tblmessages WHERE ID = $mid");
                                        $userResult = mysqli_fetch_assoc($getUser);
                                        $user = $userResult['SentBy'];
                                        while($result=mysqli_fetch_array($query)){
                                            $replyID = $result['ID'];
                                        ?>
                                        <div class="card">
                                            <div class="card-body">
                                                <h4>
                                                    <?php echo '<span style="font-weight: bolder; color:black;">'. $result['Subject']. '</span>' ?>
                                                </h4>
                                                <hr/>
                                                <div class="media">
                                                <div class="media-body">
                                                    <h5 class="mt-0">
                                                        <?php
                                                        echo '<span style="font-weight: 600; color:black;"> Mail Category: '.$result['MailType']. '</span>';
                                                        ?>
                                                    </h5>
                                                    <h6 class="mt-3">
                                                        <?php
                                                        echo '<span style="font-weight: 600; color:black;"> From: '.$result['SentBy']. '</span>';
                                                        ?>
                                                    </h6>
                                                    <br/>
                                                    <p class="mt-3 mb-2" style="margin-left:10%"><?php echo '<span style="font-weight: bold; color:grey;">'. $result['MailContent']. '</span>';?></p>
                                                    <div class=" mt-3 mb-2" style="margin-top:10px; margin-left:10%"><h5 style="font-weight: 600;">Files : </h5>
                                                    <?php
                                                    $fileNames = explode(', ', $result['filename']);
                                                    foreach ($fileNames as $fileName) {
                                                        if ($fileName == "") {
                                                            echo 'No files';
                                                        }
                                                        else {
                                                            echo '<div class="btn" style="background-color: gray;"> <a style="color: white;" href="mail_files/' . $fileName . '" download>' . $fileName . '</a></div><br>';
                                                        }
                                                    }
                                                    ?>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $cnt++;} ?>

                                        <!-- Replies -->
                                        <h4>Replies: </h4>
                                        <?php
                                        $replyQuery=mysqli_query($con,"SELECT * from replies WHERE ID =  $replyID");
                                        $cnt=1;
                                        while($replyResult=mysqli_fetch_array($replyQuery)){
                                        ?>
                                        <div class="">
                                            <div class="card mx-auto" style="width:80%">
                                                <div class="card-body">
                                                    <div class="media">
                                                        <div class="media-body">
                                                            <h5 class="mt-0">
                                                                <?php
                                                                echo '<span style="font-weight: 600; color:black;"> From: '. $replyResult['sender_name']. '</span>';
                                                                ?>
                                                            </h5>
                                                            <br/>
                                                            <p class="mt-1 mb-2" style="margin-left:5%"><?php echo '<span style="font-weight: bold; color:grey;">'. $replyResult['reply_text']. '</span>';?></p>
                                                            <div class=" mt-3 mb-2" style="margin-top:10px; margin-left:5%"><h5 style="font-weight: 600;">Files : </h5>
                                                            <?php
                                                            $fileNames = explode(', ', $replyResult['filename']);
                                                            foreach ($fileNames as $fileName) {
                                                                if ($fileName == "") {
                                                                    echo 'No files';
                                                                }
                                                                else {
                                                                    echo '<div class="btn" style="background-color: gray;"> <a style="color: white;" href="mail_files/' . $fileName . '" download>' . $fileName . '</a></div><br>';
                                                                }
                                                            }
                                                            ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $cnt++;} ?>
                                        
                                        <form name="subadmin" method="post" enctype="multipart/form-data" id="replyForm" style="display: none;">
                                            <div class="form-group">
                                                <label for="exampleInputMail">Reply: </label>
                                                <textarea class="form-control" id="reply" name="reply" style="height: 150px;" required></textarea>
                                                <input style="display: none;" class="form-control" id="sendername" name="sendername" value="<?php echo $fname?>" required readonly>
                                                <input  style="display: none;" class="form-control" id="ID" name="ID" value="<?php echo $replyID ?>" required readonly>
                                            </div>
                                            <div class="form-group">
                                            <label for="exampleInputFile">Select File(if any)</label>
                                            <input type="file" name="files[]" multiple class="form-control border-0">
                                            </div>
                                            <div class="card-body">
                                                <button type="submit" class="btn btn-success" style="margin-left: 45%" name="submit" id="submit">Submit</button>
                                            </div>
                                        </form>
                                        <div class="btn btn-primary" style="border-radius:3px; padding: 5px 25px; color:white; font-weight:bold; font-size:18px;" onclick="toggleForm()"><i class="nav-icon fas fa-pen"></i> &nbsp;Reply</div>
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
<?php include_once('includes/footer.php');?>


</div>
<!-- ./wrapper -->

<script>
    function toggleForm() {
        const form = document.getElementById("replyForm");
        form.style.display = form.style.display === "block" ? "none" : "block";
    }
</script>
<script>
// Initialize CKEditor on the textarea
CKEDITOR.replace('malconten',{
  height: 300
});
</script>
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
</body>
</html>
<?php } ?>
