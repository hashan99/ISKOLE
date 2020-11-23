<?php session_start() ?>

<!DOCTYPE html>
<html>
    <head>
    <title>GetHelp</title>
    <link rel = "icon" href = "logo.PNG" type = "image/x-icon">
        <link href="gethelp.css" rel="stylesheet" type="text/css">
    <script>
      function myFunction2() {
        var txt;
        var r = confirm("Are you sure you want to logout?");
        if (r == true) {
        location.replace("../../Home/index.php");
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
              <a href="../StudentHome.php">Home</a>
              <a href="../Student Select Subject/StudentSelectSubject.php">Subjects</a>
              <a href="../../Forum/ForumHome.html">Forum</a>
              <a href="../LeaderBoard/leaderboard.php">LeaderBoard</a>
              <a href="../GetHelp/gethelp.php">Get Help</a>
              <a href="../../Profile/StuProfile.php">Profile</a>
              <a onclick="myFunction2()">Log out</a>
            </div>
            <a><button class="openbtn" onclick="openNav()">&#9776;</button></a>
            <a href="../../Profile/StuProfile.php"><button id=name_tag><b><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?>
            <br>
            <?php 
                      if($_SESSION['type'] == 1)
                      {
                          echo $_SESSION['xp']." xp | #3"; 
                      }
                      else
                      {
                        // echo $_SESSION['subject'];
                      }
                    ?></b></button>
            <img style="float: right; padding-top: 5px;" class="avatar" src="../avatar.png" width="60" height="60"></a>
          </nav>
<div id="center">
   <div class="row">
    <div class="column">
      <div class="card">
      <img src="teacher1.jpg" alt="Science" style="width:100%">
      <h3>K H M Perera</h3>
      <p class="title">Science</p>
      <p>English Medium</p>
      <p>khmiskole@gmail.com</p>    
    <p><button id="button1" >Get Help</button></p>
      </div> 
   </div>
   <div class="column">
      <div class="card">
      <img src="teacher2.jpg" alt="Mathematics" style="width:100%">
      <h3>P K S Ranabhahu</h3>
      <p class="title">Mathematics</p>
      <p>English Medium</p>
      <p>pksiskole@gmail.com</p>
          <p><button id="button2" >Get Help</button></p>
      </div> 
         </div>
         <div class="column">
      <div class="card">
      <img src="teacher3.jpg" alt="Geography" style="width:100%">
      <h3>H M D Silva</h3>
      <p class="title">Geography</p>
      <p>English Medium</p>
      <p>hmdiskole@gmail.com</p>
          <p><button id="button3" >Get Help</button></p>
      </div> 
         </div>
   </div>
   <div class="row">
    <div class="column">
      <div class="card">
      <img src="teacher4.jpg" alt="Music" style="width:100%">
      <h3>C J B Jayasinghe</h3>
      <p class="title">Music</p>
      <p>English Medium</p>
      <p>cjbiskole@gmail.com</p>
          
    <p><button id="button4" >Get Help</button></p>
      </div> 
   </div>
   <div class="column">
      <div class="card">
      <img src="teacher7.jpg" alt="Health" style="width:100%">
      <h3>A K Gunathilaka</h3>
      <p class="title">Health</p>
      <p>English Medium</p>
      <p>akgiskole@gmail.com</p>
          <p><button id="button5" >Get Help</button></p>
      </div> 
         </div>
         <div class="column">
      <div class="card">
      <img src="teacher8.jpg" alt="English" style="width:100%">
      <h3>T U L G Wanasinghe</h3>
      <p class="title">English</p>
      <p>General</p>
      <p>tulgiskole@gmail.com</p>
          <p><button id="button6" >Get Help</button></p>
      </div> 
         </div>
   </div>
</div>
    </body>
</html>