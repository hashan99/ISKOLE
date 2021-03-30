<?php session_start() ?>

<!DOCTYPE html>
<html>
    <head>
        <title>CM Content View</title>
        <link rel = "icon" href = "logo.PNG" type = "image/x-icon">
        <link rel = "icon" href = "../Images/logo.PNG" type = "image/x-icon">
        <link href="content_view.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <script>
      function myFunction2() {
        var txt;
        var r = confirm("Are you sure you want to logout?");
        if (r == true) {
        location.replace("../../../../Home/index.php");
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
                            <!-- <a href="../../../View Contents/StudentSelectSubject.php">View Content</a>
                            <a href="../../../../../Forum/Forum.php">Forum</a>
                            <a href="../../../Submit Content/SubmitContent.php">Submit Content</a>
                            <a href="../../../Manage Users/ManageUsers.html">Manage Users</a> -->
                            <!-- <a href="../../../../Profile/Profile.php">Profile</a> -->
                            <a href="view_teacher_notifications.php">Teacher Requests</a>
                            <a href="view_content_notifications.php">Content Requests</a>
                            <a href="../../../logout.php">Log out</a>
                            <!-- <a onclick="myFunction2()">Log out</a> -->
                        </div>
                        <a><button class="openbtn" onclick="openNav()">&#9776;</button></a>
                        <button id=name_tag><b>Admin(Super User)<br></b></button>
                        <img style="float: right; padding-top: 5px;" class="avatar" src="avatar.png" width="60" height="60">
          </nav>


     
       <div class="header">

    <?php
       
	
	// Database connection
	$connection = new mysqli('localhost','root','','iskole');
	if($connection->connect_error){
		echo "$connection->connect_error";
		die("Connection Failed : ". $connection->connect_error);
    }

    if(isset($_GET['id']))
    {
        $view_id = $_GET['id'];
    }
       

    $result = mysqli_query($connection,"SELECT Topic FROM new_content_notifications WHERE id='$view_id'");
    if(!$result)
    {
     echo 'Could not load the data from database! ';
    }
    else
    {
     if(mysqli_num_rows($result) == 0)
     {
         echo 'No record in database found with such Topic_id.';
     }
     else
     {
         while($row = mysqli_fetch_assoc($result))
         {
            echo '<h1>' .$row['Topic']. '</h1>';
         }
     }
    }
     ?>
          
       </div>
       

<div class="row">
  <div class="leftcolumn">
    <div class="card">

    <?php 

    $result = mysqli_query($connection,"SELECT Presentation FROM new_content_notifications WHERE id='$view_id'");
    if(!$result)
    {
     echo 'Could not load the data from database! ';
    }
    else
    {
     if(mysqli_num_rows($result) == 0)
     {
         echo 'No record in database found with such Topic_id.';
     }
     else
     {
         while($row = mysqli_fetch_assoc($result))
         {
            echo '<iframe src=' .$row['Presentation']. '></iframe>' ;
         }
     }
    }

     ?>
      
       
  </div>
    <div class="card">
    
    <!-- add buttons for the quiz and forum here-->


    </div>
  </div>
  <div class="rightcolumn">
    <div class="card">
      <h2>Topics covered</h2>
     
      <?php
      $result = mysqli_query($connection,"SELECT Areas FROM new_content_notifications WHERE id='$view_id'");
    if(!$result)
    {
     echo 'Could not load the data from database! ';
    }
    else
    {
     if(mysqli_num_rows($result) == 0)
     {
         echo 'No record in database found with such Topic_id.';
     }
     else
     {
         while($row = mysqli_fetch_assoc($result))
         {
            echo '<p>' .$row['Areas']. '</p>';
         }
     }
    }
     ?>

    </div>

    <div class="card">
      <h3>Further Reading</h3>
      <div>  
               <?php
                    $result = mysqli_query($connection,"SELECT Further_Reading FROM new_content_notifications WHERE id='$view_id'");
                        if(!$result)
                        {
                            echo 'Could not load the data from database! ';
                        }
                        else
                        {
                        if(mysqli_num_rows($result) == 0)
                        {
                            echo 'No record in database found with such Topic_id.';
                        }
                        else
                        {
                         while($row = mysqli_fetch_assoc($result))
                         {
                             // echo '<p>' .$row['Further_Reading']. '</p>';
                            echo '<p><a href="'.$row['Further_Reading'].'">'.$row['Further_Reading'].'  </a></p>';
                        }
                        }   
                        }
                ?> 
     </div><br>

    </div>
    <div class="card">
      <a style="text-decoration:none" href="content_accept.php?id=<?php echo $view_id; ?>"><button id="button"><b>Accept</b></button></a>
      <a style="text-decoration:none" href="content_decline.php?id=<?php echo $view_id; ?>"><button id="button"><b>Decline</b></button></a>
    </div>
  </div>
</div>

<!-- <div class="footer">
  <h2>Footer</h2>
</div> -->
    </body>
</html> 