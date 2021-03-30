<?php include '../connection.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Register for Free</title>
        <link rel = "icon" href = "../Images/logo.PNG" type = "image/x-icon"> 
        <link href="register.css" rel="stylesheet" type="text/css">
    </head>
    
    <body>

      <!-- php code here -->
      <?php
        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
}
        //register
        if(isset($_POST['submitStudent']))
        {
          $fName = $_POST['firstName'];
          $lName = $_POST['lastName'];
          $grade = $_POST['grade'];
          $medium = $_POST['medium'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $c_password = $_POST['c_password'];
          $enPassword = sha1($password);
          $c_enPassword = sha1($c_password);

          $fname = test_input($_POST["firstName"]);
          $lname = test_input($_POST["lastName"]);
          $email = test_input($_POST["email"]);

          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z-' ]*$/",$fname) || !preg_match("/^[a-zA-Z-' ]*$/",$lname))
          {
            echo "<script>alert('Only letters and white space allowed for the first name and last name.');</script>";
          }
          // check if e-mail address is well-formed
          else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
          {
            echo "<script>alert('Invalid email format.');</script>";
          }
          else if($password == $c_password)
          {
            $dbQuery = "INSERT into student (first_name, last_name, grade, medium, email, password, status) VALUES ('$fName','$lName', '$grade', '$medium', '$email', '$enPassword', 1)";

            $result = mysqli_query($con, $dbQuery);

            if($result)
            {
              echo "<script>alert('Registration Succesfull. You can log in to the system now !');</script>";
              // header("Location:../Home/index.php");
            }
            else
            {
              echo "<script>alert('Registration Unsuccesfull.');</script>";
            }
          }
          else
          {
              echo "<script>alert('Your passwords doesn't matched !');</script>";
          }

          
          // header("Location:../Home/index.php");
        }

        if(isset($_POST['submitTeacher']))
        {
          $fName = $_POST['firstName'];
          $lName = $_POST['lastName'];
          $subject = $_POST['subject'];
          $medium = $_POST['medium'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $c_password = $_POST['c_password'];
          $enPassword = sha1($password);
          $c_enPassword = sha1($c_password);
          $date = date('Y-m-d H:i:s');

          $fname = test_input($_POST["firstName"]);
          $lname = test_input($_POST["lastName"]);
          $email = test_input($_POST["email"]);

          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z-' ]*$/",$fname) || !preg_match("/^[a-zA-Z-' ]*$/",$lname))
          {
            echo "<script>alert('Only letters and white space allowed for the first name and last name.');</script>";
          }
          // check if e-mail address is well-formed
          else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
          {
            echo "<script>alert('Invalid email format.');</script>";
          }
          else if($password == $c_password)
          {
            $dbQuery = "INSERT into new_teacher_notifications (first_name, last_name, subject, medium, email, password, cr_date) VALUES ('$fName','$lName', '$subject', '$medium', '$email', '$enPassword', '$date')";

            $result = mysqli_query($con, $dbQuery);

            if($result)
            {
              // echo "Record is Added!";
              // $success = "Record is Added!";
              echo "<script>alert('Registration Succesfull. You need an admin approval to log in to the system. When admin accept your registration you will be informed via email !');</script>";
              // header("Location:../Home/index.php");
            }
            else
            {
              echo "<script>alert('Registration Unsuccesfull.');</script>";
            }
          }
          else
          {
              echo "<script>alert('Your passwords doesn't matched !');</script>";
          } 
        }

        // session_destroy();
      ?>  
      
      <!-- <nav class="navigation-bar">
          <a href="../Home/index.php" id="logo"><img class="logo" src="../Images/logo.PNG" width="100" height="100"></a>
          <a href="register.php"><button id="sign_in"><b>Register for Free</b></button></a>
          <a><button id="log_in" onclick="document.getElementById('id01').style.display='block' "><b>Login
          </button></a>
      </nav> -->

      <!-- login model -->
      <div id="id01"  class="modal">
  
          <form class="modal-content animate" style="background-color:#F1F1FF" action="../authentication.php" method="POST">
            
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

                <!-- <div class="error"> -->
                  <!-- <?php 
                    // echo $_SESSION['error']; 
                  ?> -->
                <!-- </div> -->
                
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
  
          <form class="modal-content animate" style="background-color:#F1F1FF" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

            <div class="imgcontainer">
                <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                <!-- <img src="ava.png" alt="Avatar" class="avatar"> -->
            </div>

            <div class="container">
                <label for="fname"><b>First Name</b></label>
                <input type="text" placeholder="Enter First Name" name="firstName" required>

                <label for="lname"><b>Last Name</b></label>
                <input type="text" placeholder="Enter Last Name" name="lastName" required>

                <!-- <label for="gender"><b>Gender</b></label>
                <select name="gender" id="gender" required>
                  <option value=""></option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select> -->

                <label for="grade"><b>Grade</b></label>
                <!-- <input type="text" placeholder="Enter Last Name" name="lastName" required> -->
                <select name="grade" id="grade" required>
                  <option value=""></option>
                  <option value="5">Grade 5</option>
                  <option value="6">Grade 6</option>
                  <option value="7">Grade 7</option>
                  <option value="8">Grade 8</option>
                  <option value="9">Grade 9</option>
                  <option value="10">Grade 10</option>
                  <option value="11">Grade 11</option>
                </select>

                <label for="medium"><b>Medium</b></label>
                <!-- <input type="text" placeholder="Select Grade" name="lastName" required> -->
                <select name="medium" id="medium" required>
                  <option value=""></option>
                  <option value="English">English</option>
                  <option value="Sinhala">Sinhala</option>
                  <option value="Tamil">Tamil</option>
                </select>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email Address" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" minlength="8" required>

                <label for="c_psw"><b>Re-Enter Password</b></label>
                <input type="password" placeholder="Re-Enter Password" name="c_password" minlength="8" required>
        
                <button type="submit" name="submitStudent" id="submit">Register As Student</button>
                <!-- <label>
                  <input type="checkbox" checked="checked" name="remember"> Remember me
                </label> -->
                <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw">Already Registerd? <a href="../Home/index.php">Login</a></span>
            </div>

            <!-- <div class="container" style="background-color:#F1F1F1">
                <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw">Already Registerd? <a href="../Home/index.php">Login</a></span>
            </div> -->

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
                <label for="fname"><b>First Name</b></label>
                <input type="text" placeholder="Enter First Name" name="firstName" required>

                <label for="lname"><b>Last Name</b></label>
                <input type="text" placeholder="Enter Last Name" name="lastName" required>

                <label for="grade"><b>Subject</b></label>
                <!-- <input type="text" placeholder="Enter Last Name" name="lastName" required> -->
                <select name="subject" id="grade" required>
                  <option value=""></option>
                  <option value="Science">Science</option>
                  <option value="Mathematics">Mathematics</option>
                  <option value="Geography">Geography</option>
                  <option value="Music">Music</option>
                  <option value="Health">Health</option>
                  <option value="English">English</option>
                </select>

                <label for="medium"><b>Medium</b></label>
                <!-- <input type="text" placeholder="Select Grade" name="lastName" required> -->
                <select name="medium" id="medium" required>
                  <option value=""></option>
                  <option value="English">English</option>
                  <option value="Sinhala">Sinhala</option>
                  <option value="Tamil">Tamil</option>
                </select>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email Address" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" minlength="8" required>

                <label for="c_psw"><b>Re-Enter Password</b></label>
                <input type="password" placeholder="Re-Enter Password" name="c_password" minlength="8" required>
        
                <button type="submit" name="submitTeacher"  id="submit">Register As Teacher</button>

                <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw">Already Registerd? <a href="../Home/index.php">Login</a></span>
                
                <!-- <div class="error" align="center"> -->
                <!-- <?php 
                  // echo $success; 
                  // echo $_SESSION['error'];
                ?> -->
                <!-- </div> -->

                <!-- <label>
                  <input type="checkbox" checked="checked" name="remember"> Remember me
                </label> -->
            </div>

            <!-- <div class="container" style="background-color:#F1F1F1">
                <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw">Already Registerd? <a href="../Home/index.php">Login</a></span>
            </div> -->

          </form>

      </div>
	
      <div class="relative">
      <div class="absolute1" align="center">
        <a href="../Home/index.php"><img src="../Images/logo.PNG" width="250" height="250"></a> 
      </div>
      <div class="absolute2" align="center">
        <p class="serif">I S K O L E</p>
      </div>
      <div class="absolute4" align="center">
        <p class="monospace thick">Where Learning Meets Passion.</p>
      </div>
      <div class="absolute3" align="center">
        <a><button id="button" onclick="document.getElementById('id01').style.display='block' "><b>Login
        </button></a>
        &nbsp &nbsp
        <a><button id="button" onclick="document.getElementById('id02').style.display='block' ">Register as Student</button></a>
        &nbsp &nbsp 
        <a><button id="button" onclick="document.getElementById('id03').style.display='block' "> Register as Teacher </button></a>
      </div>
    </div>
	    
  		<!-- <div  id="center" class="relative" align="center">
    	
          
              <a><button id="button" onclick="document.getElementById('id02').style.display='block' ">Register as Student</button></a><br>
            
              <a><button id="button" onclick="document.getElementById('id03').style.display='block' "> Register as Teacher </button></a>
      
          
      </div> -->
	       
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