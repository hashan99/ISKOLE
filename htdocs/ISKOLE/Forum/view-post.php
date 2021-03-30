<?php
    session_start();
    include '../connection.php';
    $question = $_GET["x"];

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
        <title>Question Answers</title>
        <link rel = "icon" href = "logo.PNG" type = "image/x-icon">
        <link href="StudentHome.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
        <!-- echo time fixes the css loading issue -->
        <link href="view-question.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
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
function openNavMenu() {
  document.getElementById("mySidepanel").style.width = "250px";
}

/* Set the width of the sidebar to 0 (hide it) */
function closeNavMenu() {
  document.getElementById("mySidepanel").style.width = "0";
}
  </script>
    </head>

    <body>

    <script>
  /* Set the width of the sidebar to 250px (show it) */
  function openNav() {
  document.getElementById("myReply").style.height = "auto";
  document.getElementById("myReply").style.paddingBottom = "60px";
}

/* Set the width of the sidebar to 0 (hide it) */
function closeNav() {
  document.getElementById("myReply").style.height = "0";
  document.getElementById("myReply").style.paddingBottom = "0";
}
        </script>

        <nav class="navigation-bar">
            <img class="logo" src="logo.PNG" width="100" height="100">
            <div id="mySidepanel" class="sidepanel">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNavMenu()">&times;</a>
              <a href="../Student/StudentHome.php">Home</a>
                <!-- <a href="Student Select Subject/StudentSelectSubject.php">Subjects</a> -->
                <a href="../Forum/Forum.php">Forum</a>
                <a href="LeaderBoard/leaderboard.php">Leaderboard</a>
                <!-- <a href="GetHelp/gethelp.php">Get Help</a> -->
                <a href="../Profile/StuProfile.php">Profile</a>
                <a href="../logout.php">Log out</a>
                <!-- <a onclick="myFunction2()">Log out</a> -->
            </div>
            <a><button class="openbtn" onclick="openNavMenu()">&#9776;</button></a>
            
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

        <?php 


        //posting replies

            if(isset($_POST['post_reply'])){

                $reply = $_POST['reply'];

                if ($user_type=="student"){
                  
                  $stuid = $_SESSION['stuid'];
                  $dbQuery = "INSERT INTO reply (reply_date, reply_message, thread_id, student_id) VALUES (now(),'$reply', '$question', '$stuid')";
                  $result = mysqli_query($con, $dbQuery);
  

                }
                elseif($user_type=="teacher"){

                  $teaid = $_SESSION['teaid'];
                  $dbQuery2 = "INSERT INTO reply (reply_date, reply_message, thread_id, teacher_id) VALUES (now(),'$reply', '$question', '$teaid')";
                  $result0 = mysqli_query($con, $dbQuery2);
  
                }

                // After this operation we update and refresh the forum

                header ("refresh:1; url=view-post.php?x=$question");  
            }

        //when like button is clicked increments respective reply's up_votes by 1

            // if(isset($_POST['like'])){
            //   //likes+1 is a temporary solution, need to create sperate table for likes
            //   $dbQuery2 = "INSERT INTO likes (reply_id, student_id)VALUES  WHERE reply_id=17";

            //   $result_like = mysqli_query($con, $dbQuery2);

            //   if($result_like)
            //   {
            //       // echo "Record is Added!";
            //   }
            //   else
            //   {
            //       // echo "Record is not Added!";
            //   }

            //   // After this operation we update and refresh the forum

            //   header ("refresh:1; url=view-post.php?x=$question");  
          // }

          // Back to forum button
          $previous = "javascript:history.go(-1)";
          if(isset($_SERVER['HTTP_REFERER'])) {
              $previous = $_SERVER['HTTP_REFERER'];
          }
          ?>

      <a href="<?= $previous?>"> <button class="back-button"> 
          <img class="back-icon" src="back-icon.png">
          <div class="name-tag">Go back to forum</div>
      </button></a>
	
      <div class="thread-container">
      <?php
        
        $result1 = mysqli_query($con,"SELECT * FROM thread WHERE thread_id=$question");
        
        if(!$result1)
        {
         echo 'Could not load the data from database! ';
        }
        else
        {
         if(mysqli_num_rows($result1) == 0)
         {
             echo 'This question is not available';
         }
         else
         {
          $row = mysqli_fetch_assoc($result1);
          if ($row['student_id']!=NULL){
            $thread_student_id = $row['student_id'];
            $result_student = mysqli_query($con,"SELECT * FROM student WHERE student_id = $thread_student_id");
            $row2 = mysqli_fetch_assoc($result_student);
          }
          elseif($row['teacher_id']!=NULL){
            $thread_teacher_id = $row['teacher_id'];
            $result_teacher = mysqli_query($con,"SELECT * FROM teacher WHERE teacher_id = $thread_teacher_id");
            $row2 = mysqli_fetch_assoc($result_teacher);
          }
         }
        }
        ?>
        <div class="box2">
          <section class="section">
            <img src="avatar.png" class="question-avatar">
            <div class="question-name"><?php echo $row2['first_name'].' '.$row2['last_name']; ?></div>
            <div class="question-date">Posted by a student on <?php echo $row['t_date']; ?>
            </div>
          </section>
          <section class="section question-title">
            <?php echo $row['t_title']; ?>
          </section>
          <section class="section question-description">
          <?php echo $row['t_description']; ?>
          </section>
          <section class="section">
            <div class="reply-info">
              Showing all replies
            </div>
            <a><button class="reply-button" onclick="openNav()">Reply</button></a>
          </section>
        </div>
        <div id="myReply" class="replybox">
          <a class="closebtn" onclick="closeNav()">&times;</a>
            <p class="replying-to">Replying to <?php echo  $row2['first_name'].' '.$row2['last_name']; ?></p>
            <form method="POST">
              <div>
              <textarea placeholder="Start typing..." class="reply-message" name="reply"></textarea>
              <br><button class="post-button" name="post_reply">Post</button>
              </div>

            </form>
        </div>

        <?php
        // Retrieving and displaying replies

        $result_replies = mysqli_query($con,"SELECT * FROM reply WHERE thread_id = $question ORDER BY up_votes DESC");
        
        if(!$result_replies)
        {
         echo 'Could not load the data from database! ';
        }
        else
        {
         if(mysqli_num_rows($result_replies) == 0)
         {
             echo '<div class="box3">No replies for this question yet.</div>';
         }
         else
         {
             while($row = mysqli_fetch_assoc($result_replies))
             {

              if ($row['student_id']!=NULL){
                $id=$row['student_id'];
                $result2 = mysqli_query ($con,"SELECT * FROM student WHERE student_id='$id'");
                $row2 = mysqli_fetch_assoc($result2);
                $name=$row2['first_name'].' '.$row2['last_name'];
                $user_type="student";
              }
              elseif ($row['teacher_id']!=NULL){
                $id=$row['teacher_id'];
                $result2 = mysqli_query ($con,"SELECT * FROM teacher WHERE teacher_id='$id'");
                $row2 = mysqli_fetch_assoc($result2);
                $name=$row2['first_name'].' '.$row2['last_name'];
                $user_type="teacher";
              }
              $rep_id = $row['reply_id'];
              $result3 = mysqli_query ($con,"SELECT * FROM likes WHERE reply_id='$rep_id'");
              $row3 = mysqli_fetch_assoc($result3);
              $like_count = mysqli_num_rows($result3);

                echo'
                <div class="box3">
                <section class="section">
                <img src="avatar.png" class="question-avatar">
                <div class="question-name"> '.$name.'</div>
                <div class="question-date">Posted by a '.$user_type.' on '.$row['reply_date'].'
                </div>
              </section>
              <section class="section question-description">
              '.$row['reply_message'].'
              </section>
              <section class="section">
                <div class="reply-info">
                '.$like_count.' Likes
                </div>';

                if($user_type=="teacher"){
                  if ($id == $_SESSION['teaid']){
                  echo '<a href="delete-reply.php?id='.$row['reply_id'].'&x='.$question.'">
                  <button class="delete-reply-button" name="delete" title="Delete question"><i class="fas fa-trash-alt"></i></button></a>';
                }  
              }
                elseif($user_type=="student"){
                  if ($id == $_SESSION['stuid']){
                  echo '<a href="delete-reply.php?id='.$row['reply_id'].'&x='.$question.'">
                  <button class="delete-reply-button" name="delete" title="Delete question"><i class="fas fa-trash-alt"></i></button></a>';
                }
              }

              echo '
              <a href="like.php?id='.$row['reply_id'].'&x='.$question.'">
                  <button class="reply-button" name="like">Like</button>
                </a>
              </section> 
              </div>';
             }
            }
        }
        ?>
        </div>
      </div>
    </body>

</html>
<?php mysqli_close($con); ?>



