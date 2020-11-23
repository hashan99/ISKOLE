<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<link rel="stylesheet" href="leaderboard.css">
	<link rel = "icon" href = "logo.PNG" type = "image/x-icon">
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
	<img class="logo" src="logo.PNG" width="100" height="100">
	  <span class="label success">Leaderboard</span>
<div class="wrapper">
	<div class="lboard_section">
		<div class="lboard_tabs">
			<div class="tabs">
				<ul>
					<li data-li="today">Today</li>
					<li class="active" data-li="month">Month</li>
					<li data-li="year">Year</li>
				</ul>
			</div>
		</div>

		<div class="lboard_wrap">
			<div class="lboard_item today" style="display: none;">
				<div class="lboard_mem">
					<div class="img">
						<img src="pic_1.jpg" alt="picture_1">
					</div>
					<div class="name_bar">
						<p><span>1.</span>Hashan Kumarasinghe</p>
						<div class="bar_wrap">
							<div class="inner_bar" style="width: 95%"></div>
						</div>
					</div>
					<div class="points">
						125 points
					</div>
				</div>
				<div class="lboard_mem">
					<div class="img">
						<img src="pic_2.jpg" alt="picture_2">
					</div>
					<div class="name_bar">
						<p><span>2.</span>Amaya Kinivita</p>
						<div class="bar_wrap">
							<div class="inner_bar" style="width: 80%"></div>
						</div>
					</div>
					<div class="points">
						110 points
					</div>
				</div>
				<div class="lboard_mem">
					<div class="img">
						<img src="pic_3.jpg" alt="picture_2">
					</div>
					<div class="name_bar">
						<p><span>3.</span>Bhagaya Gunathilaka</p>
						<div class="bar_wrap">
							<div class="inner_bar" style="width: 60%;"></div>
						</div>
					</div>
					<div class="points">
						95 points
					</div>
				</div>
				<div class="lboard_mem">
					<div class="img">
						<img src="pic_4.jpg" alt="picture_1">
					</div>
					<div class="name_bar">
						<p><span>4.</span>Nirushi Wijesiri</p>
						<div class="bar_wrap">
							<div class="inner_bar" style="width: 30%"></div>
						</div>
					</div>
					<div class="points">
						90 points
					</div>
				</div>
				<div class="lboard_mem">
					<div class="img">
						<img src="pic_5.jpg" alt="picture_2">
					</div>
					<div class="name_bar">
						<p><span>5.</span>Shamali Pthirana</p>
						<div class="bar_wrap">
							<div class="inner_bar" style="width: 10%"></div>
						</div>
					</div>
					<div class="points">
						70 points
					</div>
				</div>
			</div>
			<div class="lboard_item month" style="display: block;">
				<div class="lboard_mem">
					<div class="img">
						<img src="pic_2.jpg" alt="picture_2">
					</div>
					<div class="name_bar">
						<p><span>1.</span> Amaya Kinivita</p>
						<div class="bar_wrap">
							<div class="inner_bar" style="width: 95%"></div>
						</div>
					</div>
					<div class="points">
						1195 points
					</div>
				</div>
				<div class="lboard_mem">
					<div class="img">
						<img src="pic_3.jpg" alt="picture_3">
					</div>
					<div class="name_bar">
						<p><span>2.</span>Bhagaya Gunathilaka</p>
						<div class="bar_wrap">
							<div class="inner_bar" style="width: 80%"></div>
						</div>
					</div>
					<div class="points">
						1185 points
					</div>
				</div>
				<div class="lboard_mem">
					<div class="img">
						<img src="pic_1.jpg" alt="picture_1">
					</div>
					<div class="name_bar">
						<p><span>3.</span>Hashan Kumarasinghe</p>
						<div class="bar_wrap">
							<div class="inner_bar" style="width: 70%;"></div>
						</div>
					</div>
					<div class="points">
						1160 points
					</div>
				</div>
				<div class="lboard_mem">
					<div class="img">
						<img src="pic_5.jpg" alt="picture_5">
					</div>
					<div class="name_bar">
						<p><span>4.</span>Shamali Pathirana</p>
						<div class="bar_wrap">
							<div class="inner_bar" style="width: 50%"></div>
						</div>
					</div>
					<div class="points">
						1130 points
					</div>
				</div>
				<div class="lboard_mem">
					<div class="img">
						<img src="pic_4.jpg" alt="picture_4">
					</div>
					<div class="name_bar">
						<p><span>5.</span>Nirushi Wijesiri</p>
						<div class="bar_wrap">
							<div class="inner_bar" style="width: 30%"></div>
						</div>
					</div>
					<div class="points">
						1110 points
					</div>
				</div>
			</div>
			<div class="lboard_item year" style="display: none;">
				<div class="lboard_mem">
					<div class="img">
						<img src="pic_5.jpg" alt="picture_5">
					</div>
					<div class="name_bar">
						<p><span>1.</span>Shamali Pathirana</p>
						<div class="bar_wrap">
							<div class="inner_bar" style="width: 90%"></div>
						</div>
					</div>
					<div class="points">
						2195 points
					</div>
				</div>
				<div class="lboard_mem">
					<div class="img">
						<img src="pic_4.jpg" alt="picture_4">
					</div>
					<div class="name_bar">
						<p><span>2.</span>Nirushi Wijesiri</p>
						<div class="bar_wrap">
							<div class="inner_bar" style="width: 85%"></div>
						</div>
					</div>
					<div class="points">
						2185 points
					</div>
				</div>
				<div class="lboard_mem">
					<div class="img">
						<img src="pic_3.jpg" alt="picture_3">
					</div>
					<div class="name_bar">
						<p><span>3.</span>Bhagaya Gunathilaka</p>
						<div class="bar_wrap">
							<div class="inner_bar" style="width: 65%;"></div>
						</div>
					</div>
					<div class="points">
						2160 points
					</div>
				</div>
				<div class="lboard_mem">
					<div class="img">
						<img src="pic_1.jpg" alt="picture_1">
					</div>
					<div class="name_bar">
						<p><span>4.</span>Hashan Kumarasinghe</p>
						<div class="bar_wrap">
							<div class="inner_bar" style="width: 30%"></div>
						</div>
					</div>
					<div class="points">
						2130 points
					</div>
				</div>
				<div class="lboard_mem">
					<div class="img">
						<img src="pic_2.jpg" alt="picture_2">
					</div>
					<div class="name_bar">
						<p><span>5.</span>Bhagaya Gunathilaka</p>
						<div class="bar_wrap">
							<div class="inner_bar" style="width: 10%"></div>
						</div>
					</div>
					<div class="points">
						2110 points
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
</div>
<script src="leaderboard.js"></script>
</body>
</html>