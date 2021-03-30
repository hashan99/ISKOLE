<?php 
        session_start();
    include '../connection.php';

        //assigning user to user-type variable

        if ($_SESSION['type']==1){
          $user_type="student";
        }
        elseif($_SESSION['type']==0){
          $user_type="teacher";
        }
        else{
          $user_type="admin";
        }
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Discussion Forum</title>
        <link rel = "icon" href = "../Images/logo.PNG" type = "image/x-icon">
        <link href="StudentHome.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
        <link href="Forum.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
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

                if ($user_type=="student"){
                  $id = $_SESSION['stuid'];
                }

                elseif($user_type=="teacher"){
                  $id = $_SESSION['teaid'];
                }
                  //still the admin insertion is not defined
                $dbQuery = "INSERT INTO thread (t_date, t_title, t_description, ".$user_type."_id) VALUES (now(),'$heading', '$description', '$id')";

                $result = mysqli_query($con, $dbQuery);

                // if($result)
                // {
                //     // echo "Record is Added!";
                // }
                // else
                // {
                //     // echo "Record is not Added!";
                // }
              
                // After this operation we update and refresh the forum

                header ("refresh:1; url=Forum.php");  
            }

        ?> 

        <nav class="navigation-bar">
            <img class="logo" src="logo.PNG" width="100" height="100">

            <div id="mySidepanel" class="sidepanel">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="../Student/StudentHome.php">Home</a>
                <!-- <a href="Student Select Subject/StudentSelectSubject.php">Subjects</a> -->
                <a href="../Forum/Forum.php">Forum</a>
                <a href="LeaderBoard/leaderboard.php">Leaderboard</a>
                <!-- <a href="GetHelp/gethelp.php">Get Help</a> -->
                <!-- <a href="../Profile/StuProfile.php">Profile</a> -->
                <a href="../logout.php">Log out</a>
                <!-- <a onclick="myFunction2()">Log out</a> -->
            </div>
            <a><button class="openbtn" onclick="openNav()">&#9776;</button></a>
            <button class="name-button"> 
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
          </button>  
        </nav>
        
        <div class="box">
            <h2 style="text-align:center">Discussion Forum</h2><br>
            <p> Have a question? Get answers from the ISKOLE community right here. </p>
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
                    <textarea id="content" name="description" placeholder="Describe your question" class="ask_question-description" required></textarea>
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
              if ($row['student_id']!=NULL){
                $id=$row['student_id'];
                $result2 = mysqli_query ($con,"SELECT * FROM student WHERE student_id='$id'");
                $row2 = mysqli_fetch_assoc($result2);
                $name=$row2['first_name'].' '.$row2['last_name'];
                $thread_user_type="student";
              }
              elseif ($row['teacher_id']!=NULL){
                $id=$row['teacher_id'];
                $result2 = mysqli_query ($con,"SELECT * FROM teacher WHERE teacher_id='$id'");
                $row2 = mysqli_fetch_assoc($result2);
                $name=$row2['first_name'].' '.$row2['last_name'];
                $thread_user_type="teacher";
              }
              
              $current_thread = $row['thread_id'];
              $result3 = mysqli_query($con,"SELECT * FROM reply WHERE thread_id='$current_thread'");

              $reply_count = mysqli_num_rows($result3);
                echo'
                <div class="box2">
                <section class="section">
                  <img src="avatar.png" class="question-avatar">
                  <div class="question-name"> '.$name.' </div>
                  <div class="question-date">Posted by a '.$thread_user_type.' on '.$row['t_date'].'
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
                  '.$reply_count.' replies
                  </div>
                  <a href="report-post.php?id='.$row['thread_id'].'">
                    <button class="report-button" name="report" title="Report post!"><i class="fas fa-exclamation-circle"></i></button></a>
                  ';
                  
                  if($user_type=="teacher"){
                    if ($id == $_SESSION['teaid']){
                    echo '<a href="delete-post.php?id='.$row['thread_id'].'">
                    <button class="delete-button" name="delete" title="Delete question"><i class="fas fa-trash-alt"></i></button></a>';
                  }  
                }
                  elseif($user_type=="student"){
                    if ($id == $_SESSION['stuid']){
                    echo '<a href="delete-post.php?id='.$row['thread_id'].'">
                    <button class="delete-button" name="delete" title="Delete question"><i class="fas fa-trash-alt"></i></button></a>';
                  }
                }
                  echo '<a href="view-post.php?x='.$row['thread_id'].'"><button class="view-button">View</button></a>
                  </section>
                </div>';

             }
            }
        }
        ?></div>
        </body>
    </html>

    <?php mysqli_close($con); ?>