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
          <a href="../Home/index.php" id="logo"><img class="logo" src="../Images/logo.PNG" width="100" height="100"></a>
          <a href="register.php"><button id="sign_in"><b>Register for Free</b></button></a>
          <a><button id="log_in" onclick="document.getElementById('id01').style.display='block' "><b>Login
          </button></a>
      </nav>

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
  
          <form class="modal-content animate" style="background-color:#F1F1FF" action="register.php" method="POST">

            <!-- <div class="imgcontainer">
                <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="ava.png" alt="Avatar" class="avatar">
            </div> -->

            <div class="container">
                <label for="uname"><b>First Name</b></label>
                <input type="text" placeholder="Enter First Name" name="firstName" required>

                <label for="uname"><b>Last Name</b></label>
                <input type="text" placeholder="Enter Last Name" name="lastName" required>

                <label for="uname"><b>Grade</b></label>
                <input type="text" placeholder="Enter Last Name" name="lastName" required>

                <label for="uname"><b>Grade</b></label>
                <input type="text" placeholder="Select Grade" name="lastName" required>

                <label for="uname"><b>Medium</b></label>
                <input type="text" placeholder="Select Medium" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
        
                <button type="submit" name="submitStudent" id="submit">Register As Student</button>
                <!-- <label>
                  <input type="checkbox" checked="checked" name="remember"> Remember me
                </label> -->
            </div>

            <div class="container" style="background-color:#F1F1F1">
                <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw">Already Registerd? <a href="../Home/index.php">Login</a></span>
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
                <span class="psw">Already Registerd? <a href="../Home/index.php">Login</a></span>
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