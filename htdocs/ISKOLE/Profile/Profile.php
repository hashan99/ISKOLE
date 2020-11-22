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
    <div class="container">
      <div class="section">
          <img src="avatar.png" class="pro-pic">
      </div>
      <div class="name"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></div>
      <div class="points"><?php echo $_SESSION['xp']; ?> xp | rank #3</div>
      <div class="basic-info">
        <div class="general">General Information:</div>
        <div class="info">
            <p>Grade: <?php echo $_SESSION['grade']; ?></p>
            <p>Medium: <?php echo $_SESSION['medium']; ?></p></div>
      </div>
        <script src="Profile.js"></script>

    <a href="Change Password/ChangePassword.php"><button class="btn"><b>Change Password</b></button></a>
    <a href="Edit Profile/EditProfile.php"><button class="btn"><b>Edit Profile</b></button></a>
  </div> 
</body>
</html>
