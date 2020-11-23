<?php 
        session_start();
        // $_SESSION["name"]="Amaya Kinivita";
    include '../connection.php';

?>
<!DOCTYPE html>

<html>
    <head>
        <title>Discussion Forum</title>
        <link href="StudentHome.css" rel="stylesheet" type="text/css">
        <link href="Forum.css" rel="stylesheet" type="text/css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <!-- <script>
function myFunction2() {
  var txt;
  var r = confirm("Are you sure you want to logout?");
  if (r == true) {
    location.replace("../Home/index.php");
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
            if(isset($_POST['post_question'])){

                $heading = $_POST['heading'];
                $description = $_POST['description'];

                $dbQuery = "INSERT INTO thread (t_date, t_title, t_description) VALUES (now(),'$heading', '$description')"; //forum_id is hard coded to '1'

                $result = mysqli_query($con, $dbQuery);

                if($result)
                {
                    echo "Record is Added!";
                }
                else
                {
                    echo "Record is not Added!";
                }

                // After this operation we go back to the Forum 

                header ("refresh:1; url=Forum.php");  
            }
        ?> 

        <nav class="navigation-bar">
            <img class="logo" src="logo.PNG" width="100" height="100">
            <div id="mySidepanel" class="sidepanel">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <!-- <a href="StudentHome.php">Home</a> -->
                <!-- <a href="Student Select Subject/StudentSelectSubject.php">Subjects</a> -->
                <a href="../Forum/Forum.php">Forum</a>
                <!-- <a href="LeaderBoard/leaderboard.php">Leaderboard</a> -->
                <!-- <a href="GetHelp/gethelp.php">Get Help</a> -->
                <!-- <a href="../Profile/StuProfile.php">Profile</a> -->
                <a href="../logout.php">Log out</a>
                <!-- <a onclick="myFunction2()">Log out</a> -->
            </div>
            <a><button class="openbtn" onclick="openNav()">&#9776;</button></a>
            <button id=name_tag><b><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?><br>
              <?php 
                if($_SESSION['type'] == 1)
                {
                   echo $_SESSION['xp']." xp | #3"; 
                }
                else
                {

                }
              ?></b></button>
            <img style="float: right; padding-top: 5px;" class="avatar" src="avatar.png" width="60" height="60">        
        </nav>
        
        <div class="box">
            <h2 style="text-align:center">Discussion Forum</h2><br>
            <p style="text-align:center"> Have a question? Get answers from the ISKOLE community right here. </p>
            <br>
        </div>

        <div class="center">
            <input type="checkbox" id="show">
            <label for="show" class="show-btn">Ask Question</label>
            <div class="container">
                <label for="show" class="close-btn fas fa-times" title="close"></label>
                <div class="text">
                    New Question
                </div>
                <form action="Forum.php" method="POST">
                    <div class="data">
                    <label>Heading:</label>
                    <input type="text" name="heading" required>
                    </div>
                    <div class="data">
                    <label>Description:</label><br>
                    <textarea id="content" name="description" placeholder="Describe your question" style="width:100%; height: 100px;" required></textarea>
                    </div>
                    <br><br>

            <div class="btn">
                <div class="inner">
                </div>
                <button type="submit" name="post_question">Post</button>
            </div>
            </form>
        </div>
        </div>

<div class="thread-container">
        <?php
        
        $result1 = mysqli_query($con,"SELECT * FROM thread ORDER BY thread_id DESC");
        
        if(!$result1)
        {
         echo 'Could not load the data from database! ';
        }
        else
        {
         if(mysqli_num_rows($result1) == 0)
         {
             echo 'No questions in database yet.';
         }
         else
         {
             while($row = mysqli_fetch_assoc($result1))
             {
                echo'
                <div class="box2">
                <section class="section">
                  <img src="avatar.png" class="question-avatar">
                  <div class="question-name">Bhagya Gunathilaka</div>
                  <div class="question-date">Posted by a student on '.$row['t_date'].'
                  </div>
                </section>
                <section class="section question-title">
                    '.$row['t_title'].'
                </section>
                <section class="section question-description">
                    '.$row['t_description'].'
                </section>
                <section class="section">
                  <div class="reply-info">
                    10 replies
                  </div> 
                  <a href="view-post.php"><button class="view-button">View</button></a>
                </section> 
              </div>';
             }
            }
        }
        ?></div>
        </body>
    </html>

    <?php mysqli_close($con); ?>