<?php session_start() ?>

<!DOCTYPE html>
<html>
    <head>
		<title>Subject</title>
		<link rel = "icon" href = "logo.PNG" type = "image/x-icon">
        <link href="SelectTopic.css" rel="stylesheet" type="text/css">
    <!-- <script>
      function myFunction2() {
        var txt;
        var r = confirm("Are you sure you want to logout?");
        if (r == true) {
        location.replace("../../../Home/index.php");
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
              <a href="../../StudentHome.php">Home</a>
              <a href="../../Student Select Subject/StudentSelectSubject.php">Subjects</a>
              <a href="../../../Forum/Forum.php">Forum</a>
              <a href="../../LeaderBoard/leaderboard.php">Leaderboard</a>
              <a href="../../GetHelp/gethelp.php">Get Help</a>
              <a href="../../../Profile/StuProfile.php">Profile</a>
              <a href="../../../logout.php">Log out</a>
              <!-- <a onclick="myFunction2()">Log out</a> -->
            </div>
            <a><button class="openbtn" onclick="openNav()">&#9776;</button></a>
            <a href="../../../Profile/StuProfile.php"><button id=name_tag><b><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?>
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
            <img style="float: right; padding-top: 5px;" class="avatar" src="../../avatar.png" width="60" height="60"></a>
          </nav>
<div id="center">
   <div class="row">
  	<div class="column">
	    <div class="card">
  		<img src="animal.jpg" alt="Chemistry" style="width:100%">
  		<h2>1</h2>
  		<p class="title">Lesson 1</p>
  		<p>Animal Cell</p>
 	        
		<a style="text-decoration:none" href="Topic1/Topic1.php?topic_no=1"><button id="button1"> Learn </button></a>
 	    </div> 
	 </div>
	 <div class="column">
	    <div class="card">
  		<img src="plant.jpg" alt="Mathematics" style="width:100%">
  		<h2>2</h2>
  		<p class="title">Lesoon 2</p>
  		<p>Plant Cell</p>
 	        <a style="text-decoration:none" href="Topic1/Topic1.php?topic_no=2"><button id="button2" >Learn</button></a>
 	    </div> 
         </div>
         <div class="column">
	    <div class="card">
  		<img src="table.jpg" alt="Physics" style="width:100%">
  		<h2>3</h2>
  		<p class="title">Lesson 3</p>
  		<p>Periodic Table</p>
 	     <a style="text-decoration:none" href="Topic1/Topic1.php?topic_no=3"><button id="button3"> Learn </button></a>
 	    </div> 
         </div>
         
   </div>
</div>
    </body>
</html> 