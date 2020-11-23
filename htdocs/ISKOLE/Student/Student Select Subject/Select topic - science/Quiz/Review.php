<?php include '../../../../connection.php'; 
  session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<title>Quiz review</title>
	<link rel = "icon" href = "../../../../Images/logo.PNG" type = "image/x-icon"> 
    <link href="Review.css" rel="stylesheet" type="text/css">

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
              <a href="../../../StudentHome.php">Home</a>
              <a href="../../../Student Select Subject/StudentSelectSubject.php">Subjects</a>
              <a href="../../../../Forum/Forum.php">Forum</a>
              <a href="../../../LeaderBoard/leaderboard.php">Leaderboard</a>
              <a href="../../../GetHelp/gethelp.php">Get Help</a>
              <a href="../../../../Profile/StuProfile.php">Profile</a>
              <a href="../../../../logout.php">Log out</a>
              <!-- <a onclick="myFunction2()">Log out</a> -->
            </div>
            <a><button class="openbtn" onclick="openNav()">&#9776;</button></a>
            <a href="../../../../Profile/StuProfile.php"><button id=name_tag><b><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?>
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
            <img style="float: right; padding-top: 5px;" class="avatar" src="../../../avatar.png" width="60" height="60"></a>
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
	$query = "SELECT que,ans,userans FROM quiz";
 		$result = mysqli_query($con, $query);
      if($result)
      {
 		while($row = mysqli_fetch_assoc($result))
 		{
       $question = $row['que'];
       $useranswer = $row['userans'];
 			$answer = $row['ans'];

 			echo "<tr>";
          echo "<td>".$question."</td>";
          echo "<td>".$useranswer."</td>";
        	echo "<td>".$answer."</td>";
        	 ?>

        	<?php echo "</tr>"; 
 		}

      }
      else
 		{
 			echo "There is no data found!";
 		}
?>
    
  </table>
  <div id="center">
  <a style="text-decoration:none" href="../Topic1/Topic1.php?topic_no=1"><button id="back"><b>Back to content</b></button></a>
  </div>
  </div>
</body>
</html>

<?php mysqli_close($con); ?>