<?php session_start() ?>

<!DOCTYPE html>
<html>
    <head>
		<title>Subject</title>
		<link rel = "icon" href = "logo.PNG" type = "image/x-icon">
        <link href="StudentSelectSubject.css" rel="stylesheet" type="text/css">
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
						  <a href="../../Forum/ForumHome.html">Forum</a>
						  <a href="../LeaderBoard/leaderboard.php">LeaderBoard</a>
						  <a href="../GetHelp/gethelp.php">Get Help</a>
						  <a href="../../Profile/StuProfile.php">Profile</a>
						  <a href="../../logout.php">Log out</a>
							<!-- <a onclick="myFunction2()">Log out</a> -->
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
  		<img src="chemistry.jpg" alt="Science" style="width:100%">
  		<h2>Science</h2>
  		<p class="title">Grade 6</p>
  		<p>English Medium</p>
 	        
		<a style="text-decoration:none" href="Select topic - science/SelectTopic.php"><button id="button1"> Learn </button></a>
 	    </div> 
	 </div>
	 <div class="column">
	    <div class="card">
  		<img src="maths.jpg" alt="Mathematics" style="width:100%">
  		<h2>Mathematics</h2>
  		<p class="title">Grade 6</p>
  		<p>English Medium</p>
 	        <p><button id="button2" >Learn</button></p>
 	    </div> 
         </div>
         <div class="column">
	    <div class="card">
  		<img src="geography.jpg" alt="Geography" style="width:100%">
  		<h2>Geography</h2>
  		<p class="title">Grade 6</p>
  		<p>English Medium</p>
 	        <p><button id="button3" >Learn</button></p>
 	    </div> 
         </div>
   </div>
   <div class="row">
  	<div class="column">
	    <div class="card">
  		<img src="music.jpg" alt="Music" style="width:100%">
  		<h2>Music</h2>
  		<p class="title">Grade 6</p>
  		<p>English Medium</p>
 	        
		<a style="text-decoration:none" href="Select topic - Chemistry/SelectTopic.php"><button id="button4"> Learn </button></a>
 	    </div> 
	 </div>
	 <div class="column">
	    <div class="card">
  		<img src="health.jpg" alt="Health" style="width:100%">
  		<h2>Health</h2>
  		<p class="title">Grade 6</p>
  		<p>English Medium</p>
 	        <p><button id="button5" >Learn</button></p>
 	    </div> 
         </div>
         <div class="column">
	    <div class="card">
  		<img src="english.jpg" alt="English" style="width:100%">
  		<h2>English</h2>
  		<p class="title">Grade 6</p>
  		<p>General</p>
 	        <p><button id="button6" >Learn</button></p>
 	    </div> 
         </div>
   </div>
</div>
    </body>
</html>