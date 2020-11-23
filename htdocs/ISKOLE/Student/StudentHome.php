<?php session_start() ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel = "icon" href = "../Images/logo.PNG" type = "image/x-icon">
        <link href="StudentHome.css" rel="stylesheet" type="text/css">
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
              <a href="StudentHome.php">Home</a>
                <a href="Student Select Subject/StudentSelectSubject.php">Subjects</a>
                <a href="../Forum/ForumHome.html">Forum</a>
                <a href="LeaderBoard/leaderboard.php">LeaderBoard</a>
                <a href="GetHelp/gethelp.php">Get Help</a>
                <a href="../Profile/StuProfile.php">Profile</a>
                <a onclick="myFunction2()">Log out</a>
            </div>
            <a><button class="openbtn" onclick="openNav()">&#9776;</button></a>
            <a href="../Profile/StuProfile.php"><button id=name_tag><b><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?><br>
              <?php 
                if($_SESSION['type'] == 1)
                {
                   echo $_SESSION['xp']." xp | #3"; 
                }
                else
                {

                }
              ?></b></button>
            <img style="float: right; padding-top: 5px;" class="avatar" src="avatar.png" width="60" height="60"></a> 
        </nav>  

        <div class="relative">
          <div class="absolute1" align="center">
            <a><img src="logo.PNG" width="250" height="250"></a> 
          </div>
          <div class="absolute2" align="center">
            <p class="serif thick">I S K O L E</p>
          </div>
          <div class="absolute4" align="center">
            <p class="monospace thick">Self learning website for Sri Lankan students</p>
          </div>
          <div class="absolute3" align="center">
            <a style="text-decoration:none" href="Student Select Subject/StudentSelectSubject.php"><button id="button"><b>Subjects</button></a>
              &nbsp &nbsp &nbsp
              <a style="text-decoration:none" href="Forum/ForumHome.html"><button id="button"><b>Forum</b></button></a>
          </div>
        </div>

    </body>
</html> 