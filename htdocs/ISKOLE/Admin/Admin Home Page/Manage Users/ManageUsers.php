<!DOCTYPE html>
<html>
    <head>
        <title>Admin Manage Users</title>
        <link href="ManageUsers.css" rel="stylesheet" type="text/css">
        <link rel = "icon" href = "logo.PNG" type = "image/x-icon">
        <!-- <script>
            function myFunction2() {
              var txt;
              var r = confirm("Are you sure you want to logout?");
              if (r == true) {
                location.replace("../../../Home/index.php");
              }
            }
            </script> -->
            
            <script>
              /* Set the width of the sidebar to 250px (show it) */
            function openNav() {
              document.getElementById("mySidepanel").style.width = "250px";
            }
            
            /* Set the width of the sidebar to 0 (hide it) */
            function closeNav() {
              document.getElementById("mySidepanel").style.width = "0";
            }
              </script>
                </head>
                <body>
                    <nav class="navigation-bar">
                        <img class="logo" src="logo.PNG" width="100" height="100">
                        <div id="mySidepanel" class="sidepanel">
                          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                          <a href="../AdminHome.php">Home</a>
                            <a href="../View Contents/StudentSelectSubject.php">View Content</a>
                            <a href="../../../Forum/Forum.php">Forum</a>
                            <a href="../Submit Content/SubmitContent.php">Submit Content</a>
                            <a href="../Manage Users/ManageUsers.php">Manage Users</a>
                            <!-- <a href="../../../Profile/Profile.php">Profile</a> -->
                            <a href="#">Notifications</a>
                            <a href="../../../logout.php">Log out</a>
                            <!-- <a onclick="myFunction2()">Log out</a> -->
                        </div>
                        <a><button class="openbtn" onclick="openNav()">&#9776;</button></a>
                        <a><button class="name-button"><img class="avatar" src="../avatar.png">  
              <div class="name-tag"><?php echo 'Admin(Super User)'; ?>
              <br>
              </div>
          </button></a>
                        
                    </nav>
	
	    <div id="center">
          <div class="button">
            <a style="text-decoration:none" href="StudentManage/StudentManage.php"><button id="button"> Students </button></a>
            <a style="text-decoration:none" href="TeacherManage/TeacherManage.php"><button id="button"> Teachers </button></a>
            <a style="text-decoration:none" href="CMManage/CMManage.php"><button id="button"> Content managers </button></a>
          </div>
      </div>   
    </body>
</html> 