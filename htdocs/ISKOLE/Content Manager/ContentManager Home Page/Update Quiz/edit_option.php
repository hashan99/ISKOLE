<?php include '../../../connection.php'; session_start(); 
$id=$_GET["id"];
$id1=$_GET["id1"];

$question='';
$opt1='';
$opt2='';
$opt3='';
$opt4='';
$answer='';

$res=mysqli_query($con,"SELECT * FROM questions WHERE id=$id");
while($row=mysqli_fetch_array($res)){
    $question=$row["question"];
    $opt1=$row["opt1"];
    $opt2=$row["opt2"];
    $opt3=$row["opt3"];
    $opt4=$row["opt4"];
    $answer=$row["answer"];
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Update Questions</title>
	<link rel = "icon" href = "logo.PNG" type = "image/x-icon">
        <link href="edit_option.css" rel="stylesheet" type="text/css">

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

                    
  
  
  
  <div id="center">
        <h2 style="color:#240259" align="center">Update Questions with Options </h2>
  
                <form name = "form1" action="" method="post">

                <div class="row">
                  <div class="col-25">
                    <label for="question">Question</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="Question" name="Question" placeholder="Type Question here..." value="<?php echo $question; ?>">
                  </div>
                </div>

                <div class="row">
                  <div class="col-25">
                    <label for="opt1">Option 01</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="Opt1" name="opt1" placeholder="Type Option 01 here..." value="<?php echo $opt1; ?>">
                  </div>
                </div>

                <div class="row">
                  <div class="col-25">
                    <label for="opt2">Option 02</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="Opt2" name="opt2" placeholder="Type Option 02 here..." value="<?php echo $opt2; ?>">
                  </div>
                </div>

                <div class="row">
                  <div class="col-25">
                    <label for="opt3">Option 03</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="Opt3" name="opt3" placeholder="Type Option 03 here..." value="<?php echo $opt3; ?>">
                  </div>
                </div>

                <div class="row">
                  <div class="col-25">
                    <label for="opt4">Option 04</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="Opt4" name="opt4" placeholder="Type Option 04 here..." value="<?php echo $opt4; ?>">
                  </div>
                </div>

                <div class="row">
                  <div class="col-25">
                    <label for="answer">Answer</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="Answer" name="Answer" placeholder="Type Answer here..." value="<?php echo $answer; ?>">
                  </div>
                </div>

                
                
                <div class="row">
                  <div class="col-30">
                    <a><button id="submitButton" input type="submit" name="submit1"> Save Changes </button></a>
                     
                  </div>
                  
                </div>
                </form>
     
      
    </div>

    <?php
  if(isset($_POST["submit1"])){
    mysqli_query($con, "UPDATE questions SET question='$_POST[Question]', opt1='$_POST[opt1]', opt2='$_POST[opt2]', opt3='$_POST[opt3]', opt4='$_POST[opt4]', answer='$_POST[Answer]' WHERE id='$id'");
  
    ?>
    <script type="text/javascript">
    window.location="AddQuestions.php?id=<?php echo $id1?>";
    </script>
    <?php
  
  }
  
    
      ?>


</body>
</html>

<?php mysqli_close($con); ?>