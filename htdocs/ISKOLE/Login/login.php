<?php include '../Connection/connection.php'; ?>

<!DOCTYPE html>
<html>
  
  <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Login</title>
      <link rel = "icon" href = "../Images/logo.PNG" 
        type = "image/x-icon"> 
      <link href="login.css" rel="stylesheet" type="text/css">
  </head>

  <body>

    <?php 
    // header('Location: http://localhost/ISKOLE/profile.php');    
    ob_start();
    session_start();
    $error='';
      // echo "Hello";

       // if(isset($_POST['submit']))
       // {
    if(isset($_POST['submit']))
    {
        if(empty($_POST['email']) || empty($_POST['password']))
        {
            $error="email or Password is invalid";
        }
        else
        {
            $email = $_POST['email'];
            $pw = $_POST['password'];
            $enPw = sha1($pw);

            $dbQueryStudent = "SELECT * FROM student WHERE email='$email' AND password='$enPw'";
            $dbQueryTeacher = "SELECT * FROM teacher WHERE email='$email' AND password='$enPw'";

            $resultStudent = mysqli_query($con, $dbQueryStudent);
            $resultTeacher = mysqli_query($con, $dbQueryTeacher);

            // if($result)
            // {
            //     echo mysqli_num_rows($result);
            // }
            // else
            // {
            //     echo "Query is Failed!";
            // }

            if($resultStudent)
            {
              $count = mysqli_num_rows($resultStudent);
              echo mysqli_num_rows($resultStudent);
              echo "<br>";
                    
              while($row = mysqli_fetch_assoc($resultStudent))
              {
                echo "<pre>";
                print_r($row);
                echo "</pre><br>";
                $loggedUser = $row['first_name'];
                //echo $loggedUser;
              }

              if($count==1)
              {
                // $_SESSION['log_user']=$loggedUser;
                //echo "Logged as ".$loggedUser."!!";
                header('Location: http://localhost/ISKOLE/profile.php');    

                // <meta http-equiv="refresh" content=".5; URL='http://localhost/ISKOLE/profile.php'"/> <!-- 
                // REDIRECT TO profile.php IN HALF A SECOND -->

                // echo "<a>";
                // echo "</a>";
              }
              else
              {
                $error="email or password is invalid";
                //echo "Login Failed!!";
              }
            }
            // else
            // {
            //   echo "There is no data found!";
            // }

            else if($resultTeacher)
            {
              $count = mysqli_num_rows($resultTeacher);
              echo mysqli_num_rows($resultTeacher);
              echo "<br>";
                    
              while($row = mysqli_fetch_assoc($resultTeacher))
              {
                echo "<pre>";
                print_r($row);
                echo "</pre><br>";
                $loggedUser = $row['first_name'];
                //echo $loggedUser;
              }

              if($count==1)
              {
                echo "Logged as ".$loggedUser."!!";
                header('Location: http://localhost/HRMS/profile.php');
              }
              else
              {
                $error="email or password is invalid";
                //echo "Login Failed!!";
              }
            }
            // else
            // {
            //   echo "There is no data found!";
            // }
        }  
      }// }
      ob_end_flush();
    ?>

    <nav class="navigation-bar">
        <a href="login.php" id="logo"><img class="logo" src="../Images/logo.PNG" width="100" height="100"></a>
        <a href="../Register/register.php"><button id="sign_in"><b>Register for Free</b></button></a>
        <a><button id="log_in" onclick="document.getElementById('id01').style.display='block' "><b>Login
        </button></a>
    </nav>


    <div id="id01"  class="modal">
  
      <form class="modal-content animate" style="background-color:#F1F1FF" action="login.php" method="POST">

        <div class="imgcontainer">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
           <img src="../Images/login_avator.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
          <label for="uname"><b>Email</b></label>
          <input type="text" placeholder="Enter Email Address" name="email" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>
        
          <button type="submit" id="submit">Login</button>
          <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
          </label>
        </div>

        <div class="container" style="background-color:#F1F1F1">
          <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
          <span class="psw">Forgot <a href="#">password?</a></span>
        </div>

      </form>

    </div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

    </body>
</html>

<?php mysqli_close($con); ?>