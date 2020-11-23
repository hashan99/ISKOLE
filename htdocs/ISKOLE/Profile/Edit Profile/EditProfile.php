<?php include '../../connection.php'; ?>
<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    
    <title>Edit Profile</title>
    <link rel = "icon" href = "logo.PNG" type = "image/x-icon">
        <link href="EditProfile.css" rel="stylesheet" type="text/css">
        <script src="EditProfile.js"></script>
  </head>
  <body>
    
    <?php 
    
    // define variables and set to empty values
    $fnameErr = $lnameErr = $emailErr = $gradeErr = $mediumErr = "";
    $fname = $lname = $email = $grade = $medium = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $fnameErr = "Name is required";
  } else {
    $fname = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
      $fnameErr = "Only letters and white space allowed";
    }
  }

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["lname"])) {
    $lnameErr = "Name is required";
  } else {
    $lname = test_input($_POST["lname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
      $lnameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["grade"])) {
    $gradeErr = "Grade is required";
  } else {
    $grade = test_input($_POST["grade"]);
  }
}

  if (empty($_POST["medium"])) {
    $mediumErr = "Medium is required";
  } else {
    $medium = test_input($_POST["medium"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;


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
          header("Location:../Stuprofile.php");
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

            $_SESSION['stuid']  = $StuId;
            $_SESSION['fname']  = $loggedUser;
            $_SESSION['lname']  = $lname;
            $_SESSION['grade']  = $grade;
            $_SESSION['medium'] = $medium;
            $_SESSION['email']  = $email;
            $_SESSION['xp']     = $xp;
            $_SESSION['enPwd1'] = $password;
            $_SESSION['type']     = 1;
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
          header("Location:../profile.php");
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

            $_SESSION['teaid']  = $TeaId;
            $_SESSION['fname']  = $loggedUser;
            $_SESSION['lname']  = $lname;
            $_SESSION['subject']= $subject;
            $_SESSION['medium'] = $medium;
            $_SESSION['email']  = $email;
            // $_SESSION['xp']     = $xp;
            $_SESSION['enPwd1'] = $password;
            $_SESSION['type']     = 0;
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
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
              <label class="pw-label">First Name:</label>
              <input type="text" class="textbox" name="firstname" value="<?php echo $_SESSION['fname']; ?>" required>
              <span class="error">* <?php echo $fnameErr;?></span><br><br>

              <label class="pw-label">Last Name:</label>
              <input type="text" class="textbox" name="lastname" value="<?php echo $_SESSION['lname']; ?>" required>
              <span class="error">* <?php echo $lnameErr;?><br><br>

              <label class="pw-label">Email:</label>
              <input type="text" class="textbox" name="email" value="<?php echo $_SESSION['email']; ?>" required>
              <span class="error">* <?php echo $emailErr;?><br><br>

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
              <select class="optionbox" name="grade"  required>
                <option class="optionlist" value=""></option>
                <option class="optionlist" value="5">Grade 5</option>
                <option class="optionlist" value="6">Grade 6</option>
                <option class="optionlist" value="7">Grade 7</option>
                <option class="optionlist" value="8">Grade 8</option>
                <option class="optionlist" value="9">Grade 9</option>
                <option class="optionlist" value="10">Grade 10</option>
                <option class="optionlist" value="11">Grade 11</option>
              </select>
              <span class="error">* <?php echo $gradeErr;?><br><br>

              <label class="pw-label">Medium:</label>
              <select class="optionbox" name="medium" required>
                <option class="optionlist" value=""></option>
                <option class="optionlist" value="English">English</option>
                <option class="optionlist" value="Sinhala">Sinhala</option>
                <option class="optionlist" value="Tamil">Tamil</option>
              </select>
              <span class="error">* <?php echo $mediumErr;?><br><br>

            
            </div>
          <button class="btn2" type="submit" name="submit">Save</button>
          </form>
          <a href="../StuProfile.php"><button class="btn1">Discard</button></a>
     
  </body>
</html>

<?php mysqli_close($con); ?>
