<?php include 'connection.php'; ?>
<?php
      session_start();
      $error = "";
      // login
      // if(isset($_POST['submitLogin']))
      // {
        if(isset($_POST['email']) AND isset($_POST['password']) == true)
        {
            $email = $_POST['email'];
            $pw = $_POST['password'];
            $enPw = sha1($pw);

            $dbQueryAdmin = "SELECT * FROM admin WHERE username='$email' AND password='$enPw' AND status=1";
            $dbQueryCM = "SELECT * FROM content_manager WHERE username='$email' AND password='$enPw' AND status=1";
            $dbQueryStudent = "SELECT * FROM student WHERE email='$email' AND password='$enPw' AND status=1";
            $dbQueryTeacher = "SELECT * FROM teacher WHERE email='$email' AND password='$enPw' AND status=1";

            $resultAdmin = mysqli_query($con, $dbQueryAdmin);
            $resultCM = mysqli_query($con, $dbQueryCM);
            $resultStudent = mysqli_query($con, $dbQueryStudent);
            $resultTeacher = mysqli_query($con, $dbQueryTeacher);
            


            // if($_POST['email']=="admin" AND $_POST['password']=="admin123")
            // {
            //   echo "Welcome Admin!";
            // }
            // else if($_POST['email']=="content-manager" AND $_POST['password']=="cm123")
            // {
            //   echo "Welcome Content-Manager!";
            // }
            if($resultAdmin)
            {
              $count = mysqli_num_rows($resultAdmin);
              // echo mysqli_num_rows($resultTeacher);
              // echo "<br>";
                    
              while($row = mysqli_fetch_assoc($resultAdmin))
              {
                // echo "<pre>";
                // print_r($row);
                // echo "</pre><br>";
                $loggedUser = $row['username'];
                // $_SESSION['un'] = $loggedUser;
                $_SESSION['fname']  = "Admin(Super ";
                $_SESSION['lname']  = "User)";
                $_SESSION['type']   = 2;
                // echo $loggedUser;
              }

              if($count==1)
              {
                header("Location:Admin/Admin Home Page/AdminHome.php");
                // echo "Logged as ".$loggedUser."!!";
                // header('Location: http://localhost/HRMS/profile.php');
              }
              else
              {
                // $error="email or password is invalid";
                if($resultCM)
                {
                  $count = mysqli_num_rows($resultCM);
                  // echo mysqli_num_rows($resultStudent);
                  // echo "<br>";
                    
                  while($row = mysqli_fetch_assoc($resultCM))
                  {
                    // echo "<pre>";
                    // print_r($row);
                    // echo "</pre><br>";
                    $loggedUser = $row['username'];
                    // echo $loggedUser;
                    $_SESSION['fname']  = "Content";
                    $_SESSION['lname']  = "Manager";
                    $_SESSION['type']   = 2;
                  }

                  if($count==1)
                  {
                    header("Location:Content Manager/ContentManager Home Page/CMHome.php");
                    // echo "Logged as ".$loggedUser."!!";
                  }
                  else
                  {
                    // $error="email or password is invalid";
                    // echo "Login Failed!!";
                    if($resultStudent)
                    {
                      $count = mysqli_num_rows($resultStudent);
                      // echo mysqli_num_rows($resultStudent);
                      // echo "<br>";
                    
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
                        $link       = "Stu";

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

                        // echo $loggedUser;
                      }

                      if($count==1)
                      {
                        header("Location:Student/StudentHome.php");
                        // echo "Logged as ".$loggedUser."!!";
                      }
                      else
                      {
                        // $error="email or password is invalid";
                        // echo "Login Failed!!";
                        if($resultTeacher)
                        {
                          $count = mysqli_num_rows($resultTeacher);
                          // echo mysqli_num_rows($resultTeacher);
                          // echo "<br>";
                    
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
                            // $password   = $row['password'];
                            // $xp         = $row['xp'];
                            $type       = 0;
                            $link       = "Tea";

                            $_SESSION['teaid']  = $TeaId;
                            $_SESSION['fname']  = $loggedUser;
                            $_SESSION['lname']  = $lname;
                            $_SESSION['subject']= $subject;
                            $_SESSION['medium'] = $medium;
                            $_SESSION['email']  = $email;
                            // $_SESSION['xp']     = $xp;
                            // $_SESSION['enPwd1'] = $password;
                            $_SESSION['type']     = 0;
                            $_SESSION['link']     = "Tea";
                            
                            // echo $loggedUser;
                          }

                          if($count==1)
                          {
                            header("Location:Teacher/Teacher Home Page/TeacherHome.php");
                            // echo "Logged as ".$loggedUser."!!";
                            // header('Location: http://localhost/HRMS/profile.php');
                          }
                          else
                          {
                            // $error="email or password is invalid";
                            echo "<script>alert('Login Failed!!');</script>";#
                            header("Location: Home/index.php");
                            //echo "Login Failed!!";
                            //$error = 'Login Failed!!';
                            // $_SESSION['error'] = "Login Failed!!";
                          }
                        }  
                      }
                    }  
                  }
                }
              }
            }
            else
            {
              echo "<script>alert('Login Failed!!');</script>";
            }  
            
        }      
      // }
      // else
      // {
      //   echo "Login Failed!!";
      // }
        
    ?>
    <? php mysqli_close($con); ?>