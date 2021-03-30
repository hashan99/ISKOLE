<?php include '../../../connection.php'; session_start(); 
$id=$_GET["id"];
$grade='';
$subject='';
$topic='';
$res=mysqli_query($con,"SELECT * FROM quizzes WHERE id=$id");
while($row=mysqli_fetch_array($res)){
    $grade=$row["Grade"];
    $subject=$row["Subject"];
    $topic=$row["Topic"];
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Add Questions</title>
	<link rel = "icon" href = "logo.PNG" type = "image/x-icon">
        <link href="AddQuestions.css?v=<?php echo time()?>" rel="stylesheet" type="text/css">
      
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
                            <a href="SubmitQuiz.php">Submit Quiz</a> 
                            <a href="../Update Quiz/UpdateQuiz.php">Update Quiz</a>
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

                    <h1 style="color:#b789b7" align="center">Grade <?php echo $grade;?> <?php echo $subject;?> ( <?php echo $topic;?> ) </h1>
  
  
  
  
  <div id="center1">
        <h2 style="color:#b789b7" align="center">Add Questions with Text Options </h2>
  
                <form name = "form1" action="" method="post">

                <div class="row">
                  <div class="col-25">
                    <label for="question">Question</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="Question" name="Question" placeholder="Type Question here...">
                  </div>
                </div>

                <div class="row">
                  <div class="col-25">
                    <label for="opt1">Option 01</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="Opt1" name="opt1" placeholder="Type Option 01 here...">
                  </div>
                </div>

                <div class="row">
                  <div class="col-25">
                    <label for="opt2">Option 02</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="Opt2" name="opt2" placeholder="Type Option 02 here...">
                  </div>
                </div>

                <div class="row">
                  <div class="col-25">
                    <label for="opt3">Option 03</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="Opt3" name="opt3" placeholder="Type Option 03 here...">
                  </div>
                </div>

                <div class="row">
                  <div class="col-25">
                    <label for="opt4">Option 04</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="Opt4" name="opt4" placeholder="Type Option 04 here...">
                  </div>
                </div>

                <div class="row">
                  <div class="col-25">
                    <label for="answer">Answer</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="Answer" name="Answer" placeholder="Type Answer here...">
                  </div>
                </div>

                
                
                <div class="row">
                  <div class="col-30">
                    <a><button id="submitButton" input type="submit" name="submit1"> Add Question </button></a>
                     
                  </div>
                  
                </div>
                </form>
     
      
      </div>

      
<?php
if(isset($_POST["submit1"])){
    $loop=0;
    $count=0;

    $res=mysqli_query($con,"SELECT * FROM questions WHERE grade='$grade' AND subjects='$subject' AND topic= '$topic' ORDER BY id ASC") or die(mysqli_error($con));
    $count=mysqli_num_rows($res);
    if($count==0){

    }
    else{
        while($row=mysqli_fetch_array($res)){
            $loop=$loop+1;
        mysqli_query($con,"UPDATE questions SET question_no='$loop' WHERE id=$row[id]");

        }
    }
    $loop=$loop+1;
    $question=$_POST['Question'];
    $opt1=$_POST['opt1'];
    $opt2=$_POST['opt2'];
    $opt3=$_POST['opt3'];
    $opt4=$_POST['opt4'];
    $answer=$_POST['Answer'];
    
    mysqli_query($con, "INSERT INTO questions (question_no, question, opt1, opt2, opt3, opt4, answer, user_answer, grade, subjects, topic) 
    VALUES ('$loop', '$question', '$opt1', '$opt2', '$opt3', '$opt4', '$answer','$answer', '$grade', '$subject', '$topic')") or die(mysqli_error($con));

    ?>
    <script type="text/javascript">
    alert("Question Added Successfully");
    window.location.href=window.location.href;
    </script>
    <?php
}
?>
<br>

<div id="center2">
<h2 style="color:#b789b7" align="center3">Added Questions </h2>
<div id="center3">
<div class="row">
  

  <table align = "center" id="answers">
    
    <tr align="center" class="info">
    <th>Question No</th>
      <th>Question</th>
      <th>Option 01</th>
      <th>Option 02</th>
      <th>Option 03</th>
      <th>Option 04</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>

<?php
$query = "SELECT * FROM questions WHERE grade='$grade' AND subjects='$subject' AND topic= '$topic'";
   $result = mysqli_query($con, $query);
    if($result)
    {
   while($row = mysqli_fetch_assoc($result))
   {
     $question_no = $row['question_no'];
     $question = $row['question'];
           $opt1 = $row['opt1'];
           $opt2 = $row['opt2'];
           $opt3 = $row['opt3'];
           $opt4 = $row['opt4'];
           

     echo "<tr>";
        echo "<td>".$question_no."</td>";
        echo "<td>".$question."</td>";
          echo "<td>";
          echo $opt1;
          echo "</td>";

          echo "<td>";
          echo $opt2;
          echo "</td>";

          echo "<td>";
          echo $opt3;
          echo "</td>";

          echo "<td>";
          echo $opt4;
          echo "</td>";

          echo "<td>";

            ?>
            <a style="text-decoration:none" href="edit_option.php?id=<?php echo $row['id']; ?> &id1=<?php echo $id; ?>"><button id="button">Edit</button></a>
            <?php
        
          echo "</td>";
 
          echo "<td>";

            ?>
            <a style="text-decoration:none" href="delete_option.php?id=<?php echo $row['id']; ?> &id1=<?php echo $id; ?>"><button id="button">Delete</button></a>
            <?php
          
          echo "</td>";

          
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

</div>
  </div>
  </div>

</body>
</html>

<?php mysqli_close($con); ?>