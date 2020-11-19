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
                  }

                  if($count==1)
                  {
                    header("Location:Content Manager/ContentManager Home Page/CMHome.html");
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
                        $loggedUser = $row['first_name'];
                        $lname      = $row['last_name'];
                        $grade      = $row['grade'];
                        $medium     = $row['medium'];
                        $_SESSION['fname']  = $loggedUser;
                        $_SESSION['lname']  = $lname;
                        $_SESSION['grade']  = $grade;
                        $_SESSION['medium'] = $medium;

                        // echo $loggedUser;
                      }

                      if($count==1)
                      {
                        header("Location:Student/StudentHome.html");
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
                            $loggedUser = $row['first_name'];
                            // echo $loggedUser;
                          }

                          if($count==1)
                          {
                            header("Location:Teacher/Teacher Home Page/TeacherHome.html");
                            // echo "Logged as ".$loggedUser."!!";
                            // header('Location: http://localhost/HRMS/profile.php');
                          }
                          else
                          {
                            // $error="email or password is invalid";
                            header("Location: Home/index.php");
                            echo "Login Failed!!";
                            $error = 'Login Failed!!';
                            // $_SESSION['error'] = "Login Failed!!";
                          }
                        }  
                      }
                    }  
                  }
                }
              }
            }  
            
        }      
      // }
      // else
      // {
      //   echo "Login Failed!!";
      // }
        
    ?>
    <? php mysqli_close($con); ?>