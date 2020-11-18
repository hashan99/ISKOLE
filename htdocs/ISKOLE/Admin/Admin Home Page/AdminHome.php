<!-- <?php 
    // session_start();
?> -->
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link href="AdminHome.css" rel="stylesheet" type="text/css">
        <script>
function myFunction() {
  var txt;
  var r = confirm("Are you sure you want to logout?");
  if (r == true) {
    location.replace("../../Home/index.php");
  }
}
</script>
    </head>
    </head>
    <body>
        <nav class="navigation-bar">
            <img class="logo" src="logo.PNG" width="100" height="100">
            <a><button id="log_out" onclick="myFunction()"><b>Log out</b></button></a>
            <a><button id="notifications"><b>Notifications</b></button></a>
            <a><button id="profile"><b>Profile</b></button></a>
        </nav>
        <pre>
    <!-- <?php 
        // print_r($_SESSION);
    // echo $_SESSION['un'];
    ?> -->
    </pre>
	
	    <div id="center">
  		    <div class="button">
                <a><button style="margin:25px" id="button"> Forum </button></a>
                <a style="text-decoration:none" href="../../Content Manager/ContentManager Home Page/Submit Content/SubmitContent.html"><button style="margin:25px" id="button">Submit Content</button></a>
                <a style="text-decoration:none" href="Manage Users/ManageUsers.html"><button style="margin:25px" id="button">Manage Users</button></a>

  		    </div>
	    </div>   
    </body>
</html> 
<!-- <?php 
    // session_destroy();
?> -->