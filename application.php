<?php include_once('includes/config.php');

if(isset($_POST['submit'])){
$aName = mysqli_real_escape_string($con, $_POST['appName']);
$aJob = mysqli_real_escape_string($con, $_POST['appJob']);
$aNum = mysqli_real_escape_string($con, $_POST['appNum']);
$aEmail = mysqli_real_escape_string($con, $_POST['appEmail']);
$aAdd = mysqli_real_escape_string($con, $_POST['appAdress']);
$message = mysqli_real_escape_string($con, $_POST['message']);

$query=mysqli_query($con,"insert into tblapplication(appName,appJob,appNum,appEmail,appAdress,message) values('$aName','$aJob','$aNum','$aEmail','$aAdd','$message')");


$last_id = $con->insert_id;
foreach ($_FILES['files']['name'] as $key => $name) {
    $tmp_name = $_FILES['files']['tmp_name'][$key];
    $file_name = mysqli_real_escape_string($con, $name);
    // Save file to server
    if (move_uploaded_file($tmp_name, "uploads/$file_name")) {
        // Insert file information into database
        $queri = mysqli_query($con, "INSERT INTO files (appid, file_name) VALUES ('$last_id', '$file_name')");
    }
}

if($query){
// echo "<script>alert('Application Details sent successfully.');</script>";
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
} else {
echo "<script>alert('Something went wrong. Please try again.');</script>";
}

 }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Opibus Management System </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
 <?php include_once('includes/header.php');?>


        <!-- Page Header End -->
        <div class="container-xxl py-5 page-header position-relative mb-5">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-4">Job Application</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Job Application</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Appointment Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="bg-light rounded">
                    <div class="row g-0">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="h-100 d-flex flex-column justify-content-center p-5">
                                <h1 class="mb-4">Apply for a job today.</h1>
                                <form method="post"  enctype="multipart/form-data">
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control border-0" id="appName" name="appName" placeholder="Father Name" required>
                                                <label for="gname">Full Name</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control border-0" id="appJob" name="appJob" placeholder="Mother Name" required>
                                                <label for="gname">Job Title</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control border-0" id="appNum" name="appNum" placeholder="Mobile No." required>
                                                <label for="gname">Mobile No</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="email" class="form-control border-0" id="appEmail" name="appEmail" placeholder="Email" required>
                                                <label for="gmail">Email</label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control border-0" id="appAdress" name="appAdress" placeholder="User Address" required>
                                                <label for="gname">Contact Address</label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-floating">
                                                <textarea class="form-control border-0" placeholder="Tell us about your experience and skils on this role" id="message" style="height: 200px" name="message" required></textarea>
                                                <label for="message">About your experience</label>
                                            </div>
                                        </div>
                                                                        
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="file" name="files[]" multiple class="form-control border-0"  required style="height: 80px;">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100 py-3" type="submit" name="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100 rounded" src="img/appointment1.jpg" style="object-fit: cover;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Appointment End -->


        <!-- Footer Start -->
            <?php include_once('includes/footer.php');?>       
             <!-- Footer End -->


        <!-- Back to Top -->
        <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>