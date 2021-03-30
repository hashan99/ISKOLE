<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Student Leaderboard</title>
	<link rel = "icon" href = "../logo.PNG" type = "image/x-icon"> 
	<link rel="stylesheet" href="leaderboard.css?v=<?php echo time();?>">
	<link rel = "icon" href = "logo.PNG" type = "image/x-icon">

			
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
$conn = mysqli_connect("localhost", "root", "", "iskole");
$grade=$_SESSION['grade'];
$result = mysqli_query($conn, "SELECT student_id,first_name,last_name,xp FROM student WHERE grade=$grade order by xp DESC");


//$data = array();
while ($row = mysqli_fetch_array($result))
{

    $dataset[]=$row;
}
//print_r( $dataset);
?>
<div class="label">Leaderboard Grade <?php echo $grade ?></div>

        <div class="outerL">
            <div class="innerL">
                <div class="headerL">
                    <li>
                        <div>Rank </div>
                        <div>Name </div>
                        <div>Score</div>  
                    </li>
                </div>
                <div class="bodyL">

                    <?php
                    $count=1;// init counter
                    $rank=1;// init rank counter
//rank counter counts from 1 but if the scores are same it doesn't update.when scores are different ,it updates with the counter
					
                    $privious_xp=0;//initial previous score
                    foreach($dataset as  $datarow){
                        if($datarow['xp']!=$privious_xp){
                            $rank =$count;
                            $count= $count+1;
                        
                        }else{
                            $count= $count+1;

                        }

                        if($_SESSION['stuid']==$datarow['student_id'])
                        {
                            echo "<li class='our-user'>
                                <div>".$rank."</div>
                                <div>".$datarow['first_name'].' '.$datarow['last_name']."</div>
                                <div>".$datarow['xp']."</div>  
                             </li>";
                        }else
                        {
                            echo "<li>
                                    <div>".$rank."</div>
                                    <div>".$datarow['first_name'].' '.$datarow['last_name']."</div>
                                    <div>".$datarow['xp']."</div>  
                                </li>";
                        }
                           $privious_xp=$datarow['xp'];
                    }
                    ?>
                </div>
            </div>
        </div>

     

<script src="leaderboard.js"></script>
</body>
</html>