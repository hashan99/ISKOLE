<? php include '../connection.php'; ?>
<? php 
    // session_start();

?>


<!DOCTYPE html>
<html>
  
  <head>
      <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
      <title>ISKOLE</title>
      <link rel = "icon" href = "../Images/logo.PNG" type = "image/x-icon"> 
      <link href="index.css" rel="stylesheet" type="text/css">
  </head>

  <body>

    
    <!-- php code here -->

    <nav class="navigation-bar">
        <a href="index.php" id="logo"><img class="logo" src="../Images/logo.PNG" width="100" height="100"></a>
        <a href="../Register/register.php"><button id="sign_in"><b>Register for Free</b></button></a>
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
        
          <!-- <a href="../Student/StudentHome.html"> -->
            <button type="submit" name="sumbitLogin" id="submit">Login</button>
          <!-- </a> -->

          <!-- <div class="error"> -->
              <!-- <?php 
                // echo $error; 
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
<? php 
    // session_destroy();
?>
<? php mysqli_close($con); ?>