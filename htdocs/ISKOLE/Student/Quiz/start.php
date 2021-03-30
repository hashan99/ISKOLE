<?php 
include '../../connection.php'; 

session_start();

$grade = $_GET['grade'];
$subject=$_GET['subject'];
$topic=$_GET['topic']; 
$topic_no=$_GET['topic_no'];

?>

<!DOCTYPE html>
<html>

  <head>
    <title>Student Quiz</title>
    <link rel = "icon" href = "../logo.PNG" type = "image/x-icon">
    <link href="start.css" rel="stylesheet" type="text/css">
      
    <script>
      function openNav(){
        document.getElementById("mySidepanel").style.width = "250px";
      }
      
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
      </div>
      <a><button class="openbtn" onclick="openNav()">&#9776;</button></a>
      <button class="name-button"> 
			  <img class="avatar" src="avatar.png">  
			  <div class="name-tag"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?>
			  <br>
			  <?php 
				  if($_SESSION['type'] == 1){
					  echo $_SESSION['xp']." xp | #3"; 
				  }?></div>
			</button>
      <br>
    </nav>
        
    <div id="center">
      <div class="bump">
        <br>
          <?php echo'
            <a href="Quiz.php?grade='.$grade.' &subject='.$subject.' &topic='.$topic.' &topic_no='.$topic_no.'" ><button class="startbutton"> <span>START QUIZ</span> </button> </a>
          '?>
      </div>
    </div>
        
  </body>
</html> 
<?php mysqli_close($con); ?>