<?php include '../../../connection.php'; session_start(); ?>

<!DOCTYPE html>
<html>

<head>
	<title>Quiz Update</title>
	<link rel = "icon" href = "logo.PNG" type = "image/x-icon">
        <link href="UpdateQuiz.css" rel="stylesheet" type="text/css">

   <!-- <script>
      function myFunction2() {
        var txt;
        var r = confirm("Are you sure you want to logout?");
        if (r == true) {
        location.replace("../../../../Home/index.php");
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
                        <img class="logo" src="../logo.PNG" width="100" height="100">
                        <div id="mySidepanel" class="sidepanel">
                          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                          <a href="../CMHome.php">Home</a>
                            <a href="../View Contents/StudentSelectSubject.php">View Content</a>
                            <a href="../../../Forum/Forum.php">Forum</a>
                            <a href="../Submit Content/SubmitContent.php">Submit Content</a>
                            <a href="../Submit Quiz/SubmitQuiz.php">Submit Quiz</a> 
                            <a href="UpdateQuiz.php">Update Quiz</a>
                            <a href="#">Notifications</a>
                            <a href="../../../logout.php">Log out</a>
                        </div>
                        <a><button class="openbtn" onclick="openNav()">&#9776;</button></a>
                        <button class="name-button"> 
							  	        <img class="avatar" src="../avatar.png">  
							              <div class="name-tag"><?php echo "Content Manager" ?>
							                <br>
							              </div>
						              </button>  
                    </nav>

        <div class="container">
        <h1 style="color:#240259" align="center">Quiz Update</h1>
  <table align = "center" id="answers" width="80%" border="1">
    
      <tr align="center" class="info">
      <th>Grade</th>
        <th>Subject</th>
        <th>Topic No</th>
        <th>Topic</th>
        <th>Add Or Update</th>
      </tr>

<?php
	$query = "SELECT id,Grade,Subject,Topic_no,Topic FROM quizzes";
 		$result = mysqli_query($con, $query);
      if($result)
      {
 		while($row = mysqli_fetch_assoc($result))
 		{
       $grade = $row['Grade'];
       $subject = $row['Subject'];
             $topic_no = $row['Topic_no'];
             $topic = $row['Topic'];

 			echo "<tr>";
          echo "<td>".$grade."</td>";
          echo "<td>".$subject."</td>";
            echo "<td>".$topic_no."</td>";
            echo "<td>".$topic."</td>";
        	 ?>
             <td><a style="text-decoration:none" href="AddQuestions.php?id=<?php echo $row['id']; ?>"><button id="button2">Select</button></a></td>

            <?php echo "</tr>"; 
 		}

      }
      else
 		{
 			echo "There is no data found!";
 		}
?>
    
  </table>
  </div>
</body>
</html>

<?php mysqli_close($con); ?>