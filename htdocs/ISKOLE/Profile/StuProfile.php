<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Profile</title>
    <link href="Profile.css" rel="stylesheet" type="text/css">
  <script>
function myFunction2() {
  var txt;
  var r = confirm("Are you sure you want to logout?");
  if (r == true) {
    location.replace("../Home/index.php");
  }
}
</script>

<script>
  /* Set the width of the sidebar to 250px (show it) */
function openNav() {
  document.getElementById("mySidepanel").style.width = "250px";
}

/* Set the width of the sidebar to 0 (hide it) */
function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}
  </script>
    </head>
    <body>
        <nav class="navigation-bar">
            <img class="logo" src="logo.PNG" width="100" height="100">
            <div id="mySidepanel" class="sidepanel">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <a href="../Student/StudentHome.php">Home</a>
                <a href="../Student/Student Select Subject/StudentSelectSubject.php">Subjects</a>
                <a href="../Forum/ForumHome.html">Forum</a>
                <a href="../Student/LeaderBoard/leaderboard.php">LeaderBoard</a>
                <a href="../Student/GetHelp/gethelp.php">Get Help</a>
                <a href="StuProfile.php">Profile</a>
                <a onclick="myFunction2()">Log out</a>
            </div>
            <a><button class="openbtn" onclick="openNav()">&#9776;</button></a>
            
        </nav>
    <div class="container">
      <div class="section">
          <img src="avatar.png" class="pro-pic">
      </div>
      <div class="name"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></div>
      <div class="points">
        <?php 
          if($_SESSION['type'] == 1)
          {
            echo $_SESSION['xp']." xp | rank #3"; 
          }
          else
          {

          }
        ?> 
      </div>
      <div class="basic-info">
        <div class="general">
          <?php 
          if($_SESSION['type'] == 1)
          {
            echo "General Information:"; 
          }
          else
          {
            echo "Bio:"; 
          }
          
        ?> 
          
        </div>
        <div class="info">
            <p> 
              <?php 
              if($_SESSION['type'] == 1)
              {
                echo "Grade: ".$_SESSION['grade']; 
              }
              else
              {
                echo "I am Teaching ".$_SESSION['subject'];
              }
              ?>
            </p>
            <p>
              <?php 
              if($_SESSION['type'] == 1)
              {
                echo "Medium: ".$_SESSION['medium']; 
              }
              else
              {
                echo "My Teaching Medium is ".$_SESSION['medium'];
              }
              ?>
            </p>
          </div>
      </div>
        <script src="Profile.js"></script>

    <a href="Change Password/<?php echo $_SESSION['link']; ?>ChangePassword.php"><button class="btn"><b>Change Password</b></button></a>
    <a href="Edit Profile/<?php echo $_SESSION['link']; ?>EditProfile.php"><button class="btn"><b>Edit Profile</b></button></a>
  </div> 
</body>
</html>
