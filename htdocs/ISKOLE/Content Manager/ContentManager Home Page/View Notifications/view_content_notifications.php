<!-- <?php 
    // session_start();
?> -->
<?php include '../../../connection.php'; ?>
<?php 

if(isset($_GET['id']))
{
  $main_id = $_GET['id'];
  $sql_update = mysqli_query($con,"UPDATE new_content_notifications SET status=1 WHERE id='$main_id'");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>View Content Requests</title>
        <link href="view_notifications.css" rel="stylesheet" type="text/css">
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

            /* When the user clicks on the button, 
            toggle between hiding and showing the dropdown content */
            function myFunction() {
              document.getElementById("myDropdown").classList.toggle("show");
            }

            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
              if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                  var openDropdown = dropdowns[i];
                  if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                  }
                }
              }
            }
            </script>
    
                </head>
                <body>

                  <?php 
                    // $sql_get_t = mysqli_query($con,"SELECT * FROM new_teacher_notifications WHERE status=0");
                    // $count_t = mysqli_num_rows($sql_get_t);

                    $sql_get_c = mysqli_query($con,"SELECT * FROM new_content_notifications WHERE status=0");
                    $count_c = mysqli_num_rows($sql_get_c);
                    // $count = $count_t + $count_c;
                  ?>

                    <nav class="navigation-bar">
                        <img class="logo" src="logo.PNG" width="100" height="100">
                        <div id="mySidepanel" class="sidepanel">
                          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                          <a href="../CMHome.php">Home</a>
                            <a href="../View Contents/StudentSelectSubject.php">View Content</a>
                            <a href="../../../Forum/Forum.php">Forum</a>
                            <a href="../Submit Content/SubmitContent.php">Submit Content</a>
                            <!-- <a href="../Manage Users/ManageUsers.html">Manage Users</a> -->
                            <!-- <a href="../../Profile/Profile.php">Profile</a> -->
                            <!-- <a href="view_teacher_notifications.php">Teacher Requests</a> -->
                            <a href="view_content_notifications.php">Notifications</a>
                            <a href="../../../logout.php">Log out</a>
                            <!-- <a onclick="myFunction2()">Log out</a> -->
                        </div>
                        <a><button class="openbtn" onclick="openNav()">&#9776;</button></a>
                        <a><button class="name-button"><img class="avatar" src="avatar.png">  
                          <div class="name-tag"><?php echo 'Content Manager'; ?>
                           <br>
                          </div>
                       </button></a>

                        <p class="notification_tag"><?php echo $count_c; ?> Notifications</p>

                        <div class="dropdown" style="float: right; padding-top: 25px; padding-right: 20px;">
                          <!-- <button onclick="myFunction()" class="dropbtn">Dropdown</button> -->
                          <img src="envelope.png" height="25px" height="25px" onclick="myFunction()" class="dropbtn">
                          <div id="myDropdown" class="dropdown-content">
                            
                            <?php 

                              // $sql_get1 = mysqli_query($con,"SELECT * FROM new_teacher_notifications WHERE status=0 ORDER BY `cr_date` DESC");

                              $sql_get2 = mysqli_query($con,"SELECT * FROM new_content_notifications WHERE status=0 ORDER BY `cr_date` DESC");

                              if(mysqli_num_rows($sql_get2)>0)
                              {
                                // while($result = mysqli_fetch_assoc($sql_get1))
                                // {
                                //   echo '<a href="view_teacher_notifications.php?id='.$result['id'].'">'.$result['first_name'].' '.$result['last_name'].' registered as a teacher'.'</a>';
                                //   echo '<span class="notify_time">'.$result['cr_date'].'</span>';
                                // }

                                // echo '<HR>';

                                while($result2 = mysqli_fetch_assoc($sql_get2))
                                {
                                  echo '<a href="view_content_notifications.php?id='.$result2['id'].'">'.$result2['first_name'].' '.$result2['last_name'].' submited a new content'.'</a>';
                                  echo '<span class="notify_time">'.$result2['cr_date'].'</span>';
                                  // echo '<div class="dropdown-divider"></div>';
                                }
                              }
                              else
                              {
                                echo '<a class="dropdown-item text-danger font-weight-bold" href="#">Sorry No New Notifications</a>';
                              }
                            ?>

                            <!-- <a href="#home">Home</a> -->
                          </div>
                        </div>

                        <!-- <img src="envelope.png" style="float: right; padding-top: 25px; padding-right: 20px;" height="25px" height="25px"> -->
                    </nav>
  
                    <!-- <div class="relative">
                        <div class="absolute1" align="center">
                          <a href="AdminHome.php"><img src="logo.PNG" width="250" height="250"></a> 
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
                            <a style="text-decoration:none" href="Manage Users/ManageUsers.html"><button id="button"><b>Manage Users</b></button></a>                       
                        </div>
                    </div> --> 

                    <div class="container" id="table1">
                      <div class="row">
                        <table id="notifications" width="100%" border="1">
                          <thead>
                            <tr align="center" class="info">
                              <th>S.no</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Grade</th>
                              <th>Subject</th>
                              <th>Topic_no</th>
                              <th>Topic</th>
                              <th>cr_date</th>
                              <th>View</th>
                              <!-- <th>Decline</th> -->
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                              $sr_no = 1;
                              $sql_get = mysqli_query($con,"SELECT * FROM new_content_notifications WHERE status=1 ORDER BY `cr_date` DESC"); 
                              while($main_result = mysqli_fetch_assoc($sql_get)):
                            ?>
                            <tr align="center" class="info">
                              <th><?php echo $sr_no++; ?></th>
                              <td><?php echo $main_result['first_name']; ?></td>
                              <td><?php echo $main_result['last_name']; ?></td>
                              <td><?php echo $main_result['Grade']; ?></td>
                              <td><?php echo $main_result['Subject']; ?></td>
                              <td><?php echo $main_result['Topic_no']; ?></td>
                              <td><?php echo $main_result['Topic']; ?></td>
                              <td><?php echo $main_result['cr_date']; ?></td>
                              <!-- <td><a href="delete.php?id=<?php echo $main_result['id']; ?>" class="text-danger"><i class="fas fa-trash"></i></a></td> -->
                              <td><a style="text-decoration:none" href="content_view.php?id=<?php echo $main_result['id']; ?>"><button id="button">View</button></a></td>
                              <!-- <td><a style="text-decoration:none" href="decline.php?id=<?php echo $main_result['id']; ?>"><button id="button">Decline</button></a></td> -->          
                            </tr>
                          <?php endwhile ?>
                          </tbody>
                        </table>
                      </div>
                    </div>    
    </body>
</html> 
<!-- <?php 
    // session_destroy();
?>