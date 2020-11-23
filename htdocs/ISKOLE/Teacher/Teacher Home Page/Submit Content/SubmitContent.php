<?php session_start() ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Subject</title>
        <link href="SubmitContent.css" rel="stylesheet" type="text/css">
    <script>
            function myFunction2() {
              var txt;
              var r = confirm("Are you sure you want to logout?");
              if (r == true) {
                location.replace("../../../Home/index.php");
              }
            }
            </script>
            
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
    $Further_Reading = $_POST['Further_Reading'];
    $Presentation = $_POST['Presentation'];
    $Areas = $_POST['Areas'];

    // Database connection
    $connection = new mysqli('localhost','root','','iskole');
    if($connection->connect_error){
      echo "$connection->connect_error";
      die("Connection Failed : ". $connection->connect_error);
    } else {
      $stmt = $connection->prepare("insert into content(Grade, Subject, Topic_no, Topic, Further_Reading, Presentation, Areas) values(?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("isissss", $Grade, $Subject, $Topic_no, $Topic, $Further_Reading, $Presentation, $Areas);
      $execval = $stmt->execute(); 
      // echo $execval;
      // echo "Content added successfully!";
      header("Location:../TeacherHome.php");
      $stmt->close();
      $connection->close();
    }
    }

    
?>
                    <nav class="navigation-bar">
                        <img class="logo" src="logo.PNG" width="100" height="100">
                        <div id="mySidepanel" class="sidepanel">
                          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                          <a href="../TeacherHome.php">Home</a>
                            <a href="../View Contents/StudentSelectSubject.php">View Content</a>
                            <a href="../../../Forum/ForumHome.html">Forum</a>
                            <a href="../Submit Content/SubmitContent.php">Submit Content</a>
                            <a href="../../../Profile/TeaProfile.php">Profile</a>
                            <a><div class="tooltip">Offline/Online
                                <span class="tooltiptext">Use the switch to mark you as offline/online, So the students can know whether you are available or not</span>
                            </div>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                              <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                              </label></a>
                            <a onclick="myFunction2()">Log out</a>
                        </div>
                        <a><button class="openbtn" onclick="openNav()">&#9776;</button></a>
                        <a href="../../../Profile/TeaProfile.php"><button id=name_tag><b><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?>
                        <br>
                        <?php 
                          if($_SESSION['type'] == 1)
                          {
                            echo $_SESSION['xp']." xp | #3"; 
                          }
                          else
                          {

                          }
                        ?></b></button>
                        <img style="float: right; padding-top: 5px;" class="avatar" src="../avatar.png" width="60" height="60"></a>
                    </nav>

      <form action="SubmitContent.php" method="POST">  

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
                    <label for="subject">Subject</label>
                  </div>
                  <div class="col-75">
                    <select id="subject" name="Subject" required>
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
                    <label for="content">Further Reading( Links)</label>
                  </div>
                  <div class="col-75">
                    <textarea id="content" name="Further_Reading" placeholder="Write your content here.." style="height:100px"></textarea>
                  </div>
                </div>

                <div class="row">
                  <div class="col-25">
                    <label for="content">Presentation</label>
                  </div>
                  <div class="col-75">
                    <textarea id="Presentation" name="Presentation" placeholder="Copy the published presentation" style="height:100px"></textarea>
                  </div>
                </div>

                <div class="row">
                  <div class="col-25">
                    <label for="areas">Content Covered</label>
                  </div>
                  <div class="col-75">
                    <textarea id="areas" name="Areas" placeholder="Write the areas covered in this topic.." style="height:100px"></textarea>
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