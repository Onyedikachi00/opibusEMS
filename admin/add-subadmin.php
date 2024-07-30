<?php session_start();
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { header('location:index.php');
}
else{
  if (isset($_POST['submit'])) {
      $username =  mysqli_real_escape_string($con, $_POST['sadminusername']);
      $fname =  mysqli_real_escape_string($con, $_POST['fullname']);
      $email =  mysqli_real_escape_string($con, $_POST['emailid']);
      $mobileno =  mysqli_real_escape_string($con, $_POST['mobilenumber']);
      $password = md5($_POST['inputpwd']);
      $usertype = mysqli_real_escape_string($con, $_POST['usertype']); 
      
      $table = '';
      switch ($usertype) {
          case 'Staff':
              $table = 'stafftable';
              break;
          case 'HOD':
              $table = 'hodtable';
              break;
          default:
              $table = 'admintable';
      }

      $dept_query = mysqli_query($con, "SELECT deptName FROM department");
        $departments = array();
        while ($row = mysqli_fetch_assoc($dept_query)) {
            $departments[] = $row['deptName'];
        }
        
        
        $selected_department = mysqli_real_escape_string($con,$_POST['department']);
        $position = mysqli_real_escape_string($con, $_POST['position']);
        $address = mysqli_real_escape_string($con,$_POST['address']);
        $gend = mysqli_real_escape_string($con,$_POST['gender']);
        $marstats = mysqli_real_escape_string($con, $_POST['maritals']);
        $dob = mysqli_real_escape_string($con, $_POST['dob']);
        $nok = mysqli_real_escape_string($con, $_POST['nok']);
        $nokphone = mysqli_real_escape_string($con, $_POST['nokphone']);

        $fileNames = array();
            foreach ($_FILES['files']['name'] as $key => $name) {
                $tmp_name = $_FILES['files']['tmp_name'][$key];
                $file_name = mysqli_real_escape_string($con, $name);

                if (move_uploaded_file($tmp_name, "accounts_files/$file_name")) {
                    $fileNames[] = $file_name; 
                }
                else{
                  echo "None";
                }
            }

            $fileNamesString = implode(', ', $fileNames);

        // Insert data into the appropriate table
        $query = mysqli_query($con, "INSERT INTO $table (UserName, Name, Position, MobileNumber, Email, Password, UserType, Department, Address, Gender, MaritalS, DoB, NoK, NoKphone, filename) VALUES ('$username', '$fname','$position', '$mobileno', '$email', '$password', '$usertype', '$selected_department', '$address', '$gend', '$marstats', '$dob', '$nok', '$nokphone', '$fileNamesString')");

        $last_id = $con->insert_id;

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
  <title>Opibus Management System  | Add Sub admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
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
            data: 'username=' + $("#sadminusername").val(),
            type: "POST",
            success: function(data) {
                $("#user-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }

    function checkNameAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'fname=' + $("#fullname").val(),
            type: "POST",
            success: function(data) {
                $("#name-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
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
            <h1>Create New Account</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="manage-subadmins.php">Accounts</a></li>
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
          <div class="col-10 mx-auto text-left">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header" class="btn" style=" background-color:darkcyan;">
              <h5 class="text-center" style=" font-weight:bolder; color:white;">Add An Account</h5>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="subadmin" method="post" enctype="multipart/form-data">
                <div class="card-body">              
                  <div class="row g-3">
                      <div class="col-sm-6">
                          <!-- Username-->
                          <div class="form-group">
                              <label for="exampleInputusername">Username (used for login)</label>
                              <input type="text" placeholder="Enter Sub-Admin Username" name="sadminusername" id="sadminusername" class="form-control" pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$" title="Username must be alphanumeric 6 to 12 chars" onBlur="checkAvailability()" required>
                              <span id="user-availability-status"></span>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <!-- Account User's Full Name-->
                          <div class="form-group">
                              <label for="exampleInputFullname">Full Name</label>
                              <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Sub-Admin Full Name" required onblur="checkNameAvailability()">
                              <span id="name-availability-status"></span>
                              <img id="loaderIcon" src="loader.gif" style="display:none" />
                          </div>
                      </div>
                  </div>
                  <div class="row g-3">
                    <div class="col-sm-6">
                      <!--Account Email---->
                      <div class="form-group mt-1 mb-2">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="emailid" name="emailid" placeholder="Enter email" onBlur="checkEmailAvailability()" required>
                        <span id="email-availability-status"></span>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- Account Contact Number---->
                      <div class="form-group">
                        <label for="text">Mobile Number</label>
                        <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter Mobile Number" required>
                      </div>
                    </div>
                  </div>
                  <div class="row g-3">
                    <div class="col-sm-6">
                      <!--Address---->
                      <div class="form-group mt-1 mb-2">
                        <label for="exampleInputEmail1">Home Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Home Address" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- D.o.B---->
                      <div class="form-group">
                        <label for="exampleInputDob">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter D.O.B" required>
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
                                <option value="">Select Gender</option>
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
                                <option value="">Select Marital Status</option>
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
                        <input type="text" class="form-control" id="nok" name="nok" placeholder="Enter Next of Kin" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- Next of Kin's Contact -->
                      <div class="form-group">
                        <label for="exampleInputNokP">Next of Kin's Phone</label>
                        <input type="text" class="form-control" id="nokphone" name="nokphone" placeholder="Enter Next of Kin's Contact" required>
                      </div>
                    </div>
                  </div> 
                  <div class="row g-3">
                    <div class="col-sm-6">
                      <!---Account Type--->
                      <div class="form-group">
                        <label for="exampleInputusertype1">Staff type</label>
                        <p>
                            <select class="form-control" name="usertype" id="usertype"  required>
                                <option value="">Select Application Admin Type</option>
                                <option value="HOD" style="color: black; font-weight:bolder">HOD</option>
                                <option value="Staff" style="color: black; font-weight:bold">Staff</option>
                            </select>
                        </p>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputDate">Department</label>
                        <select class="form-control select2-multiple" name="department">
                          <option value="" style="font-size:15px; font-weight:600;">Select Department</option>
                          <?php
                          $query = mysqli_query($con, "SELECT deptName FROM department");
                          while ($row = mysqli_fetch_array($query)) {
                            echo '<option value="'.$row['deptName'].'">'.$row['deptName'].'</option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputDate">Other Positions</label>
                    <p style=" text-align: center; color:red; font-size:15px; font-weight:600;"> Note: Seperate Positions with commas.  Example: 2nd Semester Maths teacher, Yr3's HOD.</p>
                    <textarea style="height: 200px;" type="text" class="form-control" id="position" name="position" placeholder="Enter Staff Position(s). Eg; 1st Semester Maths teacher"></textarea>               
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Select File(s)</label>
                    <input type="file" name="files[]" multiple class="form-control border-0">
                  </div>
                  <!---Password--->
                  <div class="form-group">
                      <label for="exampleInputPassword1">Account Password</label>
                      <div class="input-group">
                          <input type="password" class="form-control" id="inputpwd" name="inputpwd" placeholder="Password" required>
                          <div class="input-group-append">
                              <button class="btn btn-outline-secondary toggle-password" type="button">
                                  <i class="fas fa-lock" id="togglePasswordIcon" ></i>
                              </button>
                          </div>
                      </div>
                  </div>  
                </div>
                <!-- /.card-body -->
                <div class="card-header">
                  <button type="submit" class="btn btn-success" style="margin-left: 45%; background-color:darkcyan;" name="submit" id="submit">Submit</button>
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
