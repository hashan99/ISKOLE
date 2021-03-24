<?php session_start() ?>
<?php include '../../../connection.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <title>CM Submit Quiz</title>
        <link rel = "icon" href = "logo.PNG" type = "image/x-icon">
        <link href="SubmitQuiz.css" rel="stylesheet" type="text/css">
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

  <?php
    if(isset($_POST['submit']))
    {
    $Grade = $_POST['Grade'];
    $Subject = $_POST['Subject'];
    $Topic_no = $_POST['Topic_no'];
    $Topic = $_POST['Topic'];
    $Time_in_minutes = $_POST['Time_in_minutes'];
    

    $dbQuery = "INSERT INTO quizzes (Grade, Subject, Topic_no, Topic, Time_in_minutes) VALUES ('$Grade','$Subject', '$Topic_no', '$Topic', '$Time_in_minutes')";

          $result = mysqli_query($con, $dbQuery);

          if($result)
          {
            //echo "Record is Added!";
            header("Location:../CMHome.php");
          }
          else
          {
            echo "Quiz is not Added!";
          }
    }

    
?>
                   <nav class="navigation-bar">
                        <img class="logo" src="../logo.PNG" width="100" height="100">
                        <div id="mySidepanel" class="sidepanel">
                          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                          <a href="../CMHome.php">Home</a>
                            <a href="../View Contents/StudentSelectSubject.php">View Content</a>
                            <a href="../../../Forum/Forum.php">Forum</a>
                            <a href="../Submit Content/SubmitContent.php">Submit Content</a>
                            <a href="../Submit Quiz/SubmitQuiz.php">Submit Quiz</a> 
                            <a href="../Update Quiz/UpdateQuiz.php">Update Quiz</a>
                            <a href="#">Notifications</a>
                            <a href="../../../logout.php">Log out</a>
                            <!-- <a onclick="myFunction2()">Log out</a> -->
                        </div>
                        <a><button class="openbtn" onclick="openNav()">&#9776;</button></a>
                        <button id=name_tag><b>Content Manager<br></b></button>
                        <img style="float: right; padding-top: 5px;" class="avatar" src="avatar.png" width="60" height="60">
                    </nav>

      <form action="SubmitQuiz.php" method="POST">  

	    <div id="center">
              <!--add the dropdown for grade and subject then the content -->
              <div class="container">
                <form action="/action_page.php">
                              
                <div class="row">
                  <div class="col-25">
                    <label for="grade">Grade</label>
                  </div>
                  <div class="col-75">
                    <select id="grade" name="Grade" required>
                      <option value=""></option>
                      <option value="5">Grade 5</option>
                      <option value="6">Grade 6</option>
                      <option value="7">Grade 7</option>
                      <option value="8">Grade 8</option>
                      <option value="9">Grade 9</option>
                      <option value="10">Grade 10</option>
                      <option value="11">Grade 11</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-25">
                    <label for="Subject">Subject</label>
                  </div>
                  <div class="col-75">
                    <select id="Subject" name="Subject" required>
                      <option value=""></option>
                      <option value="Science">Science</option>
                      <option value="Mathematics">Mathematics</option>
                      <option value="Geography">Geography</option>
                      <option value="Music">Music</option>
                      <option value="Health">Health</option>
                      <option value="English">English</option>
                    </select>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-25">
                    <label for="TopicNo">Topic Number</label>
                  </div>
                  <div class="col-75">
                    <select id="topicNo" name="Topic_no" required>
                      <option value=""></option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-25">
                    <label for="topic">Topic</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="topic" name="Topic" placeholder="Topic here...">
                  </div>
                </div>

               
                <div class="row">
                  <div class="col-25">
                    <label for="content">Duration</label>
                  </div>
                  <div class="col-75">
                    <textarea id="content" name="Time_in_minutes" placeholder="Type the duration of the quiz in minutes..." style="height:100px"></textarea>
                  </div>
                </div>

                
                <div class="row">
                  <div class="col-30">
                    <a><button id="submitButton" input type="submit" name="submit"> Submit </button></a>
                     
                  </div>
                  <div class="col-70">
                    <a><button id="cancelButton"> Cancel </button></a>
			
                  </div>
                </div>
                </form>
              </div>
            
        </div> 
      </form>    
    </body>
</html> 