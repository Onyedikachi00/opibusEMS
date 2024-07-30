<?php
require_once("includes/config.php");

function checkEmailAvailability($email) {
    global $con;

    // Check if the email exists in admintable
    $queryAdmin = mysqli_query($con, "SELECT Email FROM admintable WHERE Email='$email'");
    $rowsAdmin = mysqli_num_rows($queryAdmin);

    // Check if the email exists in hodtable
    $queryHOD = mysqli_query($con, "SELECT Email FROM hodtable WHERE Email='$email'");
    $rowsHOD = mysqli_num_rows($queryHOD);

    // Check if the email exists in stafftable
    $queryStaff = mysqli_query($con, "SELECT Email FROM stafftable WHERE Email='$email'");
    $rowsStaff = mysqli_num_rows($queryStaff);

    if ($rowsAdmin > 0 || $rowsHOD > 0 || $rowsStaff > 0) {
        echo "<span style='color:red'>Email already exists. Try using another email</span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    } else {
        echo "<span style='color:green'>Email available for Registration.</span>";
        echo "<script>$('#submit').prop('disabled', false);</script>";
    }
}

if (!empty($_POST["emailid"])) {
    $email = $_POST["emailid"];
    checkEmailAvailability($email);
}
?>

<?php
require_once("includes/config.php");

function checkUsernameAvailability($username) {
    global $con;

    // Check if the username exists in admintable
    $queryAdmin = mysqli_query($con, "SELECT UserName FROM admintable WHERE UserName='$username'");
    $rowsAdmin = mysqli_num_rows($queryAdmin);

    // Check if the username exists in hodtable
    $queryHOD = mysqli_query($con, "SELECT UserName FROM hodtable WHERE UserName='$username'");
    $rowsHOD = mysqli_num_rows($queryHOD);

    // Check if the username exists in stafftable
    $queryStaff = mysqli_query($con, "SELECT UserName FROM stafftable WHERE UserName='$username'");
    $rowsStaff = mysqli_num_rows($queryStaff);

    if ($rowsAdmin > 0 || $rowsHOD > 0 || $rowsStaff > 0) {
        echo "<span style='color:red'>Username already exists. Try with another username</span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    } else {
        echo "<span style='color:green'>Username available for Registration.</span>";
        echo "<script>$('#submit').prop('disabled', false);</script>";
    }
}

function checkFullNameAvailability($fname) {
    global $con;

    // Check if the full name exists in admintable
    $queryAdmin = mysqli_query($con, "SELECT Name FROM admintable WHERE Name='$fname'");
    $rowsAdmin = mysqli_num_rows($queryAdmin);

    // Check if the full name exists in hodtable
    $queryHOD = mysqli_query($con, "SELECT Name FROM hodtable WHERE Name='$fname'");
    $rowsHOD = mysqli_num_rows($queryHOD);

    // Check if the full name exists in stafftable
    $queryStaff = mysqli_query($con, "SELECT Name FROM stafftable WHERE Name='$fname'");
    $rowsStaff = mysqli_num_rows($queryStaff);

    if ($rowsAdmin > 0 || $rowsHOD > 0 || $rowsStaff > 0) {
        echo "<span style='color:red'>Full Name already exists. Try with another name</span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    } else {
        echo "<span style='color:green'>Full Name available for Registration.</span>";
        echo "<script>$('#submit').prop('disabled', false);</script>";
    }
}

if (!empty($_POST["username"])) {
    $uname = $_POST["username"];
    checkUsernameAvailability($uname);
}

if (!empty($_POST["fname"])) {
    $fname = $_POST["fname"];
    checkFullNameAvailability($fname);
}
?>