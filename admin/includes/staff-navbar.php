<?php 
include('../includes/config.php');

  $staffId = intval($_SESSION['aid']);

  $querystaffName = mysqli_query($con, "SELECT Name FROM stafftable WHERE ID = $staffId");
  $rowstaffName = mysqli_fetch_assoc($querystaffName);
  $staffName = $rowstaffName['Name']; 

?>
  
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="color: #000; font-size:20px"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <div class="user-panel mt-2 pb-2 mb-1 d-flex">
            <!-- <div class="info">
                <a href="#" onclick="toggleNotifications()" class="nav-link nav-link-lg" style="color: #000; font-size:20px; margin:0 5px 5px 0;" title="Notifications"><i class="far fa-bell"></i></a>
                <div id="alertList" class="text-center" style="display:none; position:fixed; margin-left:-13%; background-color: white; border-radius:7px; border: 1px solid #ccc; padding: 5px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <ol style="list-style:none; padding: 10px;" class="" >
                        <li class="text-center"  style="list-style:none; padding: 5px 10px;"><a style="color:black;" href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</a></li>
                        <hr/>
                        <li class="notify_li"  style="list-style:none; padding: 5px 10px;"><a style="color:black;" href="#">Message 2</a></li>
                    </ol>
                </div>
            </div> -->

            <div class="info">
                <?php
                $query = mysqli_query($con, "SELECT COUNT(*) as messageCount FROM tblmessages WHERE Name = '$staffName' && status = 0");
                $result = mysqli_fetch_assoc($query);
                $messageCount = $result['messageCount'];
                ?>

                <a href="inbox.php" class="nav-link nav-link-lg message-toggle" style="color: #000; font-size:20px; margin:0 5px 5px 0;" title="View Mails">
                    <i class="far fa-envelope"></i>
                    <span class="badge" style="background-color: red; color: white; padding: 5px 5px; border-radius: 50%; font-size: 14px; position: absolute; top: -10%; right: 0px; <?php echo ($messageCount == 0) ? 'display: none;' : ''; ?>">
                        <?php echo $messageCount; ?>
                    </span>
                </a>
            </div>

            <div class="info" style="margin:3px 0 0 0;">
                <a href="staff-profile.php" class="d-block" style="color: #000; font-size:20px; margin:2px 10px 0 0;"><?php echo "How's it going " . $staffName . ",😊"; ?></a>
            </div>
        </div>
    </ul>
</nav>
<!-- /.navbar -->

<script>
function toggleNotifications() {
    var alertList = document.getElementById('alertList');
    if (alertList.style.display === 'none' || alertList.style.display === '') {
        alertList.style.display = 'block';
    } else {
        alertList.style.display = 'none';
    }
}
</script>