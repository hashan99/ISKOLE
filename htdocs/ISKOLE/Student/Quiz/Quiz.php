<?php 
include '../../connection.php'; 
session_start();
$grade = $_GET['grade'];
$subject=$_GET['subject'];
$topic=$_GET['topic']; 
$topic_no=$_GET['topic_no'];

?>
<!DOCTYPE html>
<html>
  
  <head>
    <title>Student Quiz</title>
    <link rel = "icon" href = "../logo.PNG" type = "image/x-icon">
    <link href="Quiz.css" rel="stylesheet" type="text/css">
  </head>
        
  <body>
    <nav class="navigation-bar">
      <img class="logo" src="logo.PNG" width="100" height="100">
    </nav>
        
    <div id="center">
      <?php                                                           
      if (isset($_POST['click'])){
        @$_SESSION['clicks'] += 1 ;
        $c = $_SESSION['clicks'];
        if(isset($_POST['user_answer'])){ 
          $userselected = $_POST['user_answer'];         
          //update user answer                                          
          $fetchqry2 = "UPDATE questions SET user_answer='$userselected' WHERE question_no=$c-1 AND grade='$grade' AND subjects='$subject' AND topic='$topic'"; 
          $result2 = mysqli_query($con,$fetchqry2);
        }                                                   
      }else{
        $_SESSION['clicks'] = 1;
      }
      ?>
    
      <form action="" method="post">                  
        <table>
          <?php if(isset($_SESSION['clicks'])){   
            $a=$_SESSION['clicks'];
            //get the next question
            $fetchqry = "SELECT * FROM questions where question_no='$a' AND grade='$grade' AND subjects='$subject' AND topic='$topic'"; 
            $result=mysqli_query($con,$fetchqry);
            $num=mysqli_num_rows($result);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC); 
          }
          ?>
            
          <tr>
            <td>
              <!--show question-->
                <h3><br><?php echo @$row['question'];?></h3>
            </td>
          </tr> 
          <!--show options-->
          <?php if($_SESSION['clicks'] > 0 && $_SESSION['clicks'] < 6){ ?>
            <tr><td><h4><input required type="radio" name="user_answer" value="<?php echo $row['opt1'];?>">&nbsp;<?php echo $row['opt1']; ?></h4></td></tr>
            <tr><td><h4><input required type="radio" name="user_answer" value="<?php echo $row['opt2'];?>">&nbsp;<?php echo $row['opt2'];?></h4></td></tr>
            <tr><td><h4><input required type="radio" name="user_answer" value="<?php echo $row['opt3'];?>">&nbsp;<?php echo $row['opt3']; ?></h4></td></tr>
            <tr><td><h4><input required type="radio" name="user_answer" value="<?php echo $row['opt4'];?>">&nbsp;<?php echo $row['opt4']; ?></h4><br><br><br></td></tr>
            <tr><td><button id="next" name="click" >Next</button></td></tr> 
          <?php } ?> 
        
          <form>
            <?php if($_SESSION['clicks']==6){ 
              //get the score
              $qry3="SELECT * FROM questions WHERE (answer=user_answer) AND grade='$grade' AND subjects='$subject' AND topic='$topic'";
              $result3 = mysqli_query($con,$qry3);
              @$_SESSION['score']=mysqli_num_rows($result3);
              ?>  
              <!--show results-->
              <h1>Result</h1>
              <span><h2>No. of Correct Answer:&nbsp;<?php echo $no = @$_SESSION['score']; ?></h2></span><br>
              <span><h2>Your Score:&nbsp<?php echo $no*2; ?></span><h2><br><br><br>
              <a><button name="click" id="review"><b>Review</b></button></a>
              <?php
              $student_id=$_SESSION['stuid'];
              $total_marks=$_SESSION['xp']+$no*2;
              //update session xp value
              $_SESSION['xp']=$total_marks;
              $qry4 = "UPDATE student SET xp='$total_marks' WHERE student_id='$student_id'"; 
              //make the quiz status attemted
              $qry5 = "INSERT INTO student_quiz (student_id, subject, topic, status) VALUES ('$student_id', '$subject', '$topic', 1)";
              $result4 = mysqli_query($con,$qry4);
              $result5 = mysqli_query($con,$qry5);
              ?>
            <?php } ?>
        
    </div>

    <?php if($_SESSION['clicks']==7){ ?>
      <?php
      //go to the review page
      $query2 = array('grade'=>$grade,'subject'=>$subject,'topic'=>$topic,'topic_no'=>$topic_no);
      $query2 = http_build_query($query2);
      header("Location: Review.php?$query2");
      ?>
    <?php } ?>
   
    </body>
  </html> 
<?php mysqli_close($con); ?>