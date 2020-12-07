<!DOCTYPE html>
<html>
    <head>
        <title>CM Home</title>
        <link href="CMHome.css" rel="stylesheet" type="text/css">
        <link rel = "icon" href = "logo.PNG" type = "image/x-icon">
        <!-- <script>
            function myFunction2() {
              var txt;
              var r = confirm("Are you sure you want to logout?");
              if (r == true) {
                location.replace("../../Home/index.php");
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
                          <a href="CMHome.php">Home</a>
                            <a href="View Contents/StudentSelectSubject.php">View Content</a>
                            <a href="../../Forum/Forum.php">Forum</a>
                            <a href="Submit Content/SubmitContent.php">Submit Content</a>
                            <!-- <a href="../../Profile/Profile.php">Profile</a> -->
                            <a href="#">Notifications</a>
                            <a href="../../logout.php">Log out</a>
                            <!-- <a onclick="myFunction2()">Log out</a> -->
                        </div>
                        <a><button class="openbtn" onclick="openNav()">&#9776;</button></a>
                        <button id=name_tag><b>Content Manager<br></b></button>
                        <img style="float: right; padding-top: 5px;" class="avatar" src="avatar.png" width="60" height="60">
                    </nav>
	
                    <div class="relative">
                        <div class="absolute1" align="center">
                          <a><img src="logo.PNG" width="250" height="250"></a> 
                        </div>
                        <div class="absolute2" align="center">
                          <p class="serif">I S K O L E</p>
                        </div>
                        <div class="absolute4" align="center">
                          <p class="monospace thick">Where Learning Meets Passion.</p>
                        </div>
                        <div class="absolute3" align="center">
                          <a style="text-decoration:none" href="Submit Content/SubmitContent.php"><button id="button"><b>Submit Content</button></a>
                            &nbsp &nbsp &nbsp
                            <a style="text-decoration:none" href="View Contents/StudentSelectSubject.php"><button id="button"><b>View Content</b></button></a>                       
                        </div>
                      </div>  
    </body>
</html> 