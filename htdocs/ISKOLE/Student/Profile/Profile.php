<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Profile</title>
    <link href="Profile.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <nav class="navigation-bar">
        <img class="logo" src="logo.PNG" width="100" height="100">
        <a><button id="log_out" onclick="myFunction1()"><b>Log out</b></button></a>
        <a><button id="back" onclick="goBack()"> <b>Back </b></button></a>
    </nav>
      <div class="transbox">
        <div class="card">
          <img src="Profile_img.jpg"  style="width:100%">
          <!-- <h1>B Gunathilaka</h1> -->
        </div>
      </div>
        <a href="Edit Profile/EditProfile.html"><button class="changeP"><b>Change Password</b></button></a>
        <a href="select grade & medium/StudentSelect.html"><button class="change"><b>Edit Profile</b></button></a>
        
        <script src="Profile.js"></script>
 
      <div class="text">
        <p>First Name: <?php echo $_SESSION['fname']; ?> </p>
        <p>Last Name:  <?php echo $_SESSION['lname']; ?></p>
        <p>Grade:      <?php echo $_SESSION['grade']; ?></p>
        <p>Medium:     <?php echo $_SESSION['medium']; ?></p>
      </div>   
</body>
</html>

<!-- <?php 
  // session_destroy() 
?> -->
