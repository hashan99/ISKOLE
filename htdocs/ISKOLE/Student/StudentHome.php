<?php session_start() ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Student Home</title>
        <link rel = "icon" href = "../Images/logo.PNG" type = "image/x-icon">
        <link href="StudentHome.css?v=<?php echo time();?>" rel="stylesheet" type="text/css">
        <!-- <script>
function myFunction2() {
  var txt;
  var r = confirm("Are you sure you want to logout?");
  if (r == true) {
    location.replace("../Home/index.php");
  }
}
</script> -->

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
                <a href="../Forum/Forum.php">Forum</a>
                <a href="LeaderBoard/leaderboard.php">Leaderboard</a>
                <a href="GetHelp/gethelp.php">Get Help</a>
                <a href="../Profile/StuProfile.php">Profile</a>
                <a href="../logout.php">Log out</a>
                <!-- <a onclick="myFunction2()">Log out</a> -->
            </div>
            <a><button class="openbtn" onclick="openNav()">&#9776;</button></a>
            <a href="../Profile/StuProfile.php">            <button class="name-button"> 
              <img class="avatar" src="avatar.png">  
              <div class="name-tag"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?>
              <br>
              <?php 
                if($_SESSION['type'] == 1)
                {
                   echo $_SESSION['xp']." xp"; 
                }
                else
                {

                }
              ?></div>
          </button></a> 
        </nav>  

        <?php
	          $connection = new mysqli('localhost','root','','iskole');
	            if($connection->connect_error){
		          echo "$connection->connect_error";
		          die("Connection Failed : ". $connection->connect_error);
              } 
        ?>
          
        <div class="relative">

          <div class="todays_topic">
              Today's topic </div>

          <div class="absolute1" align="center">
          <iframe width="500" height="285" src="https://www.youtube.com/embed/UPBMG5EYydo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>

          <div class="absolute2" align="center">
            <a style="text-decoration:none" href="Student Select Subject/StudentSelectSubject.php"><button id="button"><b>Start Learning</button></a>
          </div>
          <!-- <div class="absolute6" align="center">
           
          <p class="handwritten"><i class="arrow up"></i>&nbsp Today's topic</p> -->
            
          </div>
        </div>

    </body>
</html> 