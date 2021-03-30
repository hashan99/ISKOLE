<?php session_start();;
      include '../../connection.php';
?>

<!DOCTYPE html>
<html>
    <head>
    <title>Student GetHelp</title>
    <link rel = "icon" href = "logo.PNG" type = "image/x-icon">
        <link href="gethelp.css?v=<?php echo time()?>" rel="stylesheet" type="text/css">
    <!-- <script>
      function myFunction2() {
        var txt;
        var r = confirm("Are you sure you want to logout?");
        if (r == true) {
        location.replace("../../Home/index.php");
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
              <a href="../StudentHome.php">Home</a>
              <a href="../Student Select Subject/StudentSelectSubject.php">Subjects</a>
              <a href="../../Forum/Forum.php">Forum</a>
              <a href="../LeaderBoard/leaderboard.php">Leaderboard</a>
              <a href="../GetHelp/gethelp.php">Get Help</a>
              <a href="../../Profile/StuProfile.php">Profile</a>
              <a href="../../logout.php">Log out</a>
              <!-- <a onclick="myFunction2()">Log out</a> -->
            </div>
            <a><button class="openbtn" onclick="openNav()">&#9776;</button></a>
            <a href="../../Profile/StuProfile.php">            <button class="name-button"> 
              <img class="avatar" src="../avatar.png">  
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

    <div class="thread-container">

      <?php
        
        $dbQuery = "SELECT * FROM teacher";
        $result = mysqli_query($con, $dbQuery);

        if(!$result)
        {
         echo 'Could not load the data from database! ';
        }
        else
        {
         if(mysqli_num_rows($result) == 0)
         {
             echo 'No teachers in database yet.';
         }
         else
         {
             while($row = mysqli_fetch_assoc($result))
             {
                echo'
                   <div class="card">
                   <img src="teacher1.jpg" style="width: 60%">
                   <h3>'.$row['first_name'].' '.$row['last_name'].'</h3>
                   <p class="title">Science</p>
                   <p>English Medium</p>
                   <p>'.$row['email'].'</p>    
                 <p><button id="button1" >Get Help</button></p>
             </div>';
            }
            }
          }
      ?>
      </div>
    </body>
</html>

