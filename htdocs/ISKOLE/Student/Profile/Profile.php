<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    
    <title>Home</title>
        <link href="StudentChoice.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <nav class="navigation-bar">
        <img class="logo" src="logo.PNG" width="100" height="100">
        <a><button id="log_out" onclick="myFunction1()"><b>Log out</b></button></a>
        <a><button id="back" onclick="goBack()"> <b>Back </b></button></a>
        </nav>
    <div class="transbox">
    <div class="card">
    <img src="th.jpg"  style="width:100%">
    <h1>
    <!-- B Gunathilaka -->
    <?php 
        //print_r($_SESSION);
        echo $_SESSION['un'];
    ?>
    </h1>
    </div>
    </div>
    
<<<<<<< HEAD
<a href="Edit Profile/EditProfile.html"><button class="changeP"><b>Change Password</b></button></a>
<a href="select grade & medium/select.html"><button class="change"><b>Select Grade and Medium</b></button></a>
=======
<a href="Edit Profile/EditProfile.html"><button class="change"><b>Edit Profile</b></button></a>

>>>>>>> 8ec24475d4cdf0eecfc80022ae22ff5ba2bf554d
    <script src="main.js"></script>
 <!-- <button class="changeP">Change Password</button> -->
<div class="text">
<p>Grade:10</p>
<p>Medium:English</p>
</div>   
  </body>
</html>
<?php 
    session_destroy();
?>