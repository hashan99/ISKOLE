<?php include '../../connection.php'; ?>
<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    
    <title>Edit Profile</title>
        <link href="EditProfile.css" rel="stylesheet" type="text/css">
        <script src="EditProfile.js"></script>
  </head>
  <body>
    
    <?php
    if(isset($_POST['submit']))
    {
      $fName = $_POST['firstname'];
      $lName = $_POST['lastname'];
      $email = $_POST['email'];
      // $grade = $_POST['grade'];
      $subject = $_POST['subject'];
      $medium = $_POST['medium'];
      // $email = $_POST['email'];
      // $password = $_POST['password'];
      // $enPassword = sha1($password);

      //echo "$fName $password $enPassword";

      if($_SESSION['type'] == 1)
      {
        $dbQuery = "UPDATE student SET first_name = '".$fName."', last_name = '".$lName."', email = '".$email."', grade = '".$grade."', medium = '".$medium."' WHERE student_id = '".$_SESSION['stuid']."' ";

        $result = mysqli_query($con, $dbQuery);

        if($result)
        {
          // if($_SESSION['type']==1)
          // {
          //   header("Location:../../Student/StudentHome.html");
          // }
          header("Location:../profile.php");
        }
        else
        {
          echo "Record is not updated!";
        }

        $dbQueryStudent = "SELECT * FROM student WHERE student_id = ".$_SESSION['stuid']." ";
    
        $resultStudent = mysqli_query($con, $dbQueryStudent);
      
        if($resultStudent)
        {
          // $count = mysqli_num_rows($resultStudent);
                    
          while($row = mysqli_fetch_assoc($resultStudent))
          {
            // echo "<pre>";
            // print_r($row);
            // echo "</pre><br>";
            $StuId      = $row['student_id'];
            $loggedUser = $row['first_name'];
            $lname      = $row['last_name'];
            $grade      = $row['grade'];
            $medium     = $row['medium'];
            $email      = $row['email'];
            $xp         = $row['xp'];
            $password   = $row['password'];
            $type       = 1;
            $link       ="Stu";

            $_SESSION['stuid']  = $StuId;
            $_SESSION['fname']  = $loggedUser;
            $_SESSION['lname']  = $lname;
            $_SESSION['grade']  = $grade;
            $_SESSION['medium'] = $medium;
            $_SESSION['email']  = $email;
            $_SESSION['xp']     = $xp;
            $_SESSION['enPwd1'] = $password;
            $_SESSION['type']   = 1;
            $_SESSION['link']   = "Stu";
          }
        }
      }
      
      else if($_SESSION['type'] == 0)
      {
        // echo "Faild!";
        $dbQuery = "UPDATE teacher SET first_name = '".$fName."', last_name = '".$lName."', email = '".$email."' , subject = '".$subject."', medium = '".$medium."'  WHERE teacher_id = '".$_SESSION['teaid']."' ";

        $result = mysqli_query($con, $dbQuery);

        if($result)
        {
          // if($_SESSION['type']==1)
          // {
          //   header("Location:../../Student/StudentHome.html");
          // }
          header("Location:../Teaprofile.php");
        }
        else
        {
          echo "Record is not updated!";
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
            $subject    = $row['subject'];
            $medium     = $row['medium'];
            $email      = $row['email'];
            // $xp         = $row['xp'];
            $password   = $row['password'];
            $type       = 0;
            $link       ="Tea";

            $_SESSION['teaid']  = $TeaId;
            $_SESSION['fname']  = $loggedUser;
            $_SESSION['lname']  = $lname;
            $_SESSION['subject']= $subject;
            $_SESSION['medium'] = $medium;
            $_SESSION['email']  = $email;
            // $_SESSION['xp']     = $xp;
            $_SESSION['enPwd1'] = $password;
            $_SESSION['type']   = 0;
            $_SESSION['link']   = "Tea";
          }
        }
      }

    }                 
    ?>

    <nav class="navigation-bar">
        <img class="logo" src="logo.PNG" width="100" height="100">
    </nav>
     
        <div class="container">
            <img src="../avatar.png" class="pro-pic">
            <h1 class="name"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></h1>
            <div class="pwd">
              <form action="TeaEditProfile.php" method="POST">
              <label class="pw-label">First Name:</label>
              <input type="text" class="textbox" name="firstname" value="<?php echo $_SESSION['fname']; ?>" required><br><br>

              <label class="pw-label">Last Name:</label>
              <input type="text" class="textbox" name="lastname" value="<?php echo $_SESSION['lname']; ?>" required><br><br>

              <label class="pw-label">Email:</label>
              <input type="text" class="textbox" name="email" value="<?php echo $_SESSION['email']; ?>" required><br><br>

              <label class="pw-label">
                <!-- Grade: -->
                <?php 
                if($_SESSION['type'] == 1)
                {
                  echo "Grade:"; 
                }
                else
                {
                  echo "Subject:";
                }
                ?>
              </label>
              <select class="optionbox" name="subject" required>
                <option class="optionlist" value=""></option>
                <option class="optionlist" value="Science">Science</option>
                <option class="optionlist" value="Mathematics">Mathematics</option>
                <option class="optionlist" value="Geography">Geography</option>
                <option class="optionlist" value="Music">Music</option>
                <option class="optionlist" value="Health">Health</option>
                <option class="optionlist" value="English">English</option>
              </select><br><br>

              <label class="pw-label">Medium:</label>
              <select class="optionbox" name="medium" required>
                <option class="optionlist" value=""></option>
                <option class="optionlist" value="English">English</option>
                <option class="optionlist" value="Sinhala">Sinhala</option>
                <option class="optionlist" value="Tamil">Tamil</option>
              </select><br><br>

            
            </div>
          <button class="btn2" type="submit" name="submit">Save</button>
          </form>
          <a href="../TeaProfile.php"><button class="btn1">Discard</button></a>
     
  </body>
</html>

<?php mysqli_close($con); ?>
