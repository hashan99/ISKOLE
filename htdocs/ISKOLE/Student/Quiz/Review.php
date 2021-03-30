<?php include '../../connection.php'; 
session_start();
$grade = $_GET['grade'];
$subject=$_GET['subject'];
$topic=$_GET['topic']; 
$topic_no=$_GET['topic_no'];
?>

<!DOCTYPE html>
<html>

  <head>
	  <title>Student Quiz review</title>
	  <link rel = "icon" href = "logo.PNG" type = "image/x-icon"> 
    <link href="Review.css" rel="stylesheet" type="text/css">

    <script>
      function openNav(){
        document.getElementById("mySidepanel").style.width = "250px";
      }
      
      function closeNav(){
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

    <div class="container">
      <h1 style="color:rgba(0, 159, 174, 0.8)" align="center">Quiz Review</h1>
      <table align = "center" id="answers" width="80%" border="1">
        <tr align="center" class="info">
          <th>Question</th>
          <th>Your Answer</th>
          <th>Correct Answer</th>
        </tr>

        <?php
	      $query = "SELECT question,answer,user_answer FROM questions where grade='$grade' AND subjects='$subject' AND topic='$topic'";
 		    $result = mysqli_query($con, $query);
        if($result){
 		      while($row = mysqli_fetch_assoc($result)){
            $question = $row['question'];
            $useranswer = $row['user_answer'];
 			      $answer = $row['answer'];

          echo "<tr>";
          echo "<td>".$question."</td>";
          echo "<td>".$useranswer."</td>";
        	echo "<td>".$answer."</td>";
          ?>

          <?php echo "</tr>"; 
 		      }
        }
        else{
           echo "There is no data found!";
        }
        ?>
    
      </table>
      <div id="center">
        <?php echo'
        <a style="text-decoration:none" href="../Student Select Subject/Select topic - science/Topic1/Topic1.php?topic_no='.$topic_no.'"><button id="back"><b>Back to content</b></button></a>
        ' ?>
      </div>
    </div>
  </body>
</html>

<?php mysqli_close($con); ?>