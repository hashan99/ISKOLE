<?php include '../Connection/connection.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Register for Free</title>
        <link rel = "icon" href = "../Images/logo.PNG" type = "image/x-icon"> 
        <link href="register.css" rel="stylesheet" type="text/css">
    </head>
    
    <body>

      <?php 
        
      //login
      // if(isset($_POST['submitLogin']))
      // { 
        if(isset($_POST['email']) AND isset($_POST['password']) == true)
        {
            $email = $_POST['email'];
            $pw = $_POST['password'];
            $enPw = sha1($pw);

            $dbQueryStudent = "SELECT * FROM student WHERE email='$email' AND password='$enPw'";
            $dbQueryTeacher = "SELECT * FROM teacher WHERE email='$email' AND password='$enPw'";

            $resultStudent = mysqli_query($con, $dbQueryStudent);
            $resultTeacher = mysqli_query($con, $dbQueryTeacher);

            if($_POST['email']=="admin" AND $_POST['password']=="admin123")
            {
              echo "Welcome Admin!";
            }
            else if($_POST['email']=="content-manager" AND $_POST['password']=="cm123")
            {
              echo "Welcome Content-Manager!";
            }
            else if($resultStudent)
            {
              $count = mysqli_num_rows($resultStudent);
              // echo mysqli_num_rows($resultStudent);
              // echo "<br>";
                    
              while($row = mysqli_fetch_assoc($resultStudent))
              {
                echo "<pre>";
                print_r($row);
                echo "</pre><br>";
                $loggedUser = $row['first_name'];
                // echo $loggedUser;
              }

              if($count==1)
              {
                echo "Logged as ".$loggedUser."!!";
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
                    echo "<pre>";
                    print_r($row);
                    echo "</pre><br>";
                    $loggedUser = $row['first_name'];
                    // echo $loggedUser;
                  }

                  if($count==1)
                  {
                    echo "Logged as ".$loggedUser."!!";
                    // header('Location: http://localhost/HRMS/profile.php');
                  }
                  else
                  {
                    // $error="email or password is invalid";
                    echo "Login Failed!!";
                  }
                }  
              }
            }  
        } 
        
        //register
        if(isset($_POST['submitStudent']))
        {
          $fName = $_POST['firstName'];
          $lName = $_POST['lastName'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $enPassword = sha1($password);

          //echo "$fName $password $enPassword";

          $dbQuery = "INSERT into student (first_name, last_name, email, password, status) VALUES ('$fName','$lName','$email', '$enPassword', 1)";

          $result = mysqli_query($con, $dbQuery);

          if($result)
          {
            //echo "Record is Added!";
          }
          else
          {
            echo "Record is not Added!";
          }
        }

        if(isset($_POST['submitTeacher']))
        {
          $fName = $_POST['firstName'];
          $lName = $_POST['lastName'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $enPassword = sha1($password);

          //echo "$fName $password $enPassword";

          $dbQuery = "INSERT into teacher (first_name, last_name, email, password, status) VALUES ('$fName','$lName','$email', '$enPassword', 1)";

          $result = mysqli_query($con, $dbQuery);

          if($result)
          {
            //echo "Record is Added!";
          }
          else
          {
            echo "Record is not Added!";
          }
        }
      ?>  
      
      <nav class="navigation-bar">
          <a href="../Login/login.php" id="logo"><img class="logo" src="../Images/logo.PNG" width="100" height="100"></a>
          <a href="register.php"><button id="sign_in"><b>Register for Free</b></button></a>
          <a><button id="log_in" onclick="document.getElementById('id01').style.display='block' "><b>Login
          </button></a>
      </nav>

      <div id="id01"  class="modal">
  
          <form class="modal-content animate" style="background-color:#F1F1FF" action="register.php" method="POST">
            
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                  <img src="../Images/login_avator.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="uname"><b>Email</b></label>
                <input type="text" placeholder="Enter Email Address" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
        
                <button type="submit" name="submitLogin" id="submit">Login</button>
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

      <!-- register as student model -->
      <div id="id02"  class="modal_stu">
  
          <form class="modal-content animate" style="background-color:#F1F1FF" action="register.php" method="POST">

            <div class="imgcontainer">
                <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                <!-- <img src="ava.png" alt="Avatar" class="avatar"> -->
            </div>

            <div class="container">
                <label for="uname"><b>First Name</b></label>
                <input type="text" placeholder="Enter First Name" name="firstName" required>

                <label for="uname"><b>Last Name</b></label>
                <input type="text" placeholder="Enter Last Name" name="lastName" required>

                <label for="uname"><b>Email</b></label>
                <input type="text" placeholder="Enter Email Address" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
        
                <button type="submit" name="submitStudent" id="submit">Register As Student</button>
                <!-- <label>
                  <input type="checkbox" checked="checked" name="remember"> Remember me
                </label> -->
            </div>

            <div class="container" style="background-color:#F1F1F1">
                <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw">Already Registerd? <a href="../Login/login.php">Login</a></span>
            </div>

          </form>

      </div>

      <!-- register as teacher model -->
      <div id="id03"  class="modal_tea">
  
          <form class="modal-content animate" style="background-color:#F1F1FF" action="register.php" method="POST">

            <div class="imgcontainer">
                <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
                <!-- <img src="ava.png" alt="Avatar" class="avatar"> -->
            </div>

            <div class="container">
                <label for="uname"><b>First Name</b></label>
                <input type="text" placeholder="Enter First Name" name="firstName" required>

                <label for="uname"><b>Last Name</b></label>
                <input type="text" placeholder="Enter Last Name" name="lastName" required>

                <label for="uname"><b>Email</b></label>
                <input type="text" placeholder="Enter Email Address" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
        
                <button type="submit" name="submitTeacher"  id="submit">Register As Teacher</button>
                <!-- <label>
                  <input type="checkbox" checked="checked" name="remember"> Remember me
                </label> -->
            </div>

            <div class="container" style="background-color:#F1F1F1">
                <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw">Already Registerd? <a href="../Login/login.php">Login</a></span>
            </div>

          </form>

      </div>
	

	    
  		<div style="background-color:#5c8a8a; margin-top: -3%" id="center" class="button">
    	
          <!-- <table id="center"> -->
            <!-- <td> -->
              <a><button id="button" onclick="document.getElementById('id02').style.display='block' ">Register as Student</button></a>
            <!-- </td> -->
            <!-- <td></td><td><div class="vl"></div></td><td></td> -->
            <!-- <td> -->
              <a><button id="button" onclick="document.getElementById('id03').style.display='block' "> Register as Teacher </button></a>
            <!-- </td> -->
          <!-- </table> -->
          
      </div>
	       
<script>
// Get the modal
var modal = document.getElementById('id01');
// var modal_stu = document.getElementById('id02');
// var modal_tea = document.getElementById('id03');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event1.target == modal) {
        modal.style.display = "none";
    }
    // else if (event.target == modal_stu) {
    //     modal_stu.style.display = "none";
    // }
    // else if (event.target == modal_tea) {
    //     modal_tea.style.display = "none";
    // }
}

var modal_stu = document.getElementById('id03');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal_stu) {
        modal_stu.style.display = "none";
    }
}

var modal_tea = document.getElementById('id03');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal_tea) {
        modal_tea.style.display = "none";
    }
}
</script>
  
        
        
    </body>
    
</html> 

 <?php mysqli_close($con); ?>