<?php include '../../connection.php'; ?>
<?php 
  session_start();
  $error = "";
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Change Password</title>
    <link href="ChangePassword.css" rel="stylesheet" type="text/css">
    <script src="ChangePassword.js"></script>
  </head>
  <body>

    <?php
    if(isset($_POST['submit']))
    {
      $pwd1 = $_POST['pwd1'];
      $pwd2 = $_POST['pwd2'];
      $pwd3 = $_POST['pwd3'];
      $enPwd1 = sha1($pwd1);
      $enPwd2 = sha1($pwd2);
      $enPwd3 = sha1($pwd3);

      if($enPwd1 == $_SESSION['enPwd1'])
      {
        if($pwd2 == $pwd3)
        {
          $dbQuery = "UPDATE teacher SET password = '".$enPwd3."' WHERE teacher_id = '".$_SESSION['teaid']."' ";

          $result = mysqli_query($con, $dbQuery);

          if($result)
          {
            // echo "Password Change Succesfull!!";
            header("Location:../Teaprofile.php");
            // $error = "Password Changed Succesfully!!";
          }
          else
          {
            // echo "Query Failed!";
            $error = "Query Failed!";
          }
        }
        else
        {
          $error = "Your new passwords doesn't matched!";
        }
      }
      else
      {
        // echo "Password Incorrect!";
        $error = "Your old password was entered incorrectly!";
      }
    }
    else
    {
      $error = "";
    }

    $dbQueryTeacher = "SELECT * FROM teacher WHERE teacher_id = ".$_SESSION['teaid']." ";
    
    $resultTeacher = mysqli_query($con, $dbQueryTeacher);
 

    if($resultTeacher)
    {
      // $count = mysqli_num_rows($resultStudent);
                    
      while($row = mysqli_fetch_assoc($resultTeacher))
      {
        // echo "<pre>";
        // print_r($row);
        // echo "</pre><br>";
        $TeaId      = $row['teacher_id'];
        $loggedUser = $row['first_name'];
        $lname      = $row['last_name'];
        // $grade      = $row['grade'];
        // $medium     = $row['medium'];
        $email      = $row['email'];
        // $xp         = $row['xp'];
        $password   = $row['password'];
        $type       = 0;
        $link       = "Tea";

        $_SESSION['teaid']  = $TeaId;
        $_SESSION['fname']  = $loggedUser;
        $_SESSION['lname']  = $lname;
        // $_SESSION['grade']  = $grade;
        // $_SESSION['medium'] = $medium;
        $_SESSION['email']  = $email;
        // $_SESSION['xp']     = $xp;
        $_SESSION['enPwd1'] = $password;
        $_SESSION['type']   = 0;
        $_SESSION['link']  = "Tea";
      }
    }  
    ?>

    <!-- <nav class="navigation-bar">
        <img class="logo" src="logo.PNG" width="100" height="100">
        <a><button id="log_out" onclick="myFunction1()"><b>Log out</b></button></a>
        <a><button id="back" onclick="goBack()"> <b>Back </b></button></a>
    </nav> -->

    <nav class="navigation-bar">
        <img class="logo" src="logo.PNG" width="100" height="100">
    </nav>

          <div class="container">
            <img src="../avatar.png" class="pro-pic">
            <h1 class="name"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></h1>
            <div class="pwd">
              <form action="TeaChangePassword.php" method="POST">
              <label class="pw-label">Current Password:</label>
              <input type="password" class="textbox" name="pwd1" required><br><br>
              <label class="pw-label">New Password:</label>
              <input type="password" class="textbox" name="pwd2" minlength="8" required><br><br>
              <label class="pw-label">Re-Enter Password:</label>
              <input type="password" class="textbox" name="pwd3" minlength="8" required><br><br>

            <div class="error" align="center"><?php echo "$error"; ?></div>

          </div>
          
          <button class="btn2" type="submit" name="submit">Save</button>
          </form>
          <a href="../TeaProfile.php"><button class="btn1">Discard</button></a>

  

        </div>
</html>
<?php mysqli_close($con); ?>
