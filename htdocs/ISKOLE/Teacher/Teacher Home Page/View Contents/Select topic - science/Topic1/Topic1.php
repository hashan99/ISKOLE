<?php session_start() ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Teacher Lesson View</title>
        <link rel = "icon" href = "../logo.PNG" type = "image/x-icon">
        <link href="Topic1.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                          <a href="../../../TeacherHome.php">Home</a>
                            <a href="../../../View Contents/StudentSelectSubject.php">View Content</a>
                            <a href="../../../../../Forum/Forum.php">Forum</a>
                            <a href="../../../Submit Content/SubmitContent.php">Submit Content</a>
                            <a href="../../../../../Profile/TeaProfile.php">Profile</a>
                            <a><div class="tooltip">Offline/Online
                                <span class="tooltiptext">Use the switch to mark you as offline/online, So the students can know whether you are available or not</span>
                            </div>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                              <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                              </label></a>
                            <a href="../../../../../logout.php">Log out</a>
                            <!-- <a onclick="myFunction2()">Log out</a> -->
            </div>
            <a><button class="openbtn" onclick="openNav()">&#9776;</button></a>
            <a href="../../../../../Profile/TeaProfile.php">            <button class="name-button"> 
              <img class="avatar" src="../../../avatar.png">  
              <div class="name-tag"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?>
              <br>
              </div>
          </button></a>
         </nav>


     
       <div class="header">

       <?php
       
	
	// Database connection
	$connection = new mysqli('localhost','root','','iskole');
	if($connection->connect_error){
		echo "$connection->connect_error";
		die("Connection Failed : ". $connection->connect_error);
    }

    $Topic_No = $_GET['topic_no'];
       

    $result = mysqli_query($connection,"SELECT Topic FROM content WHERE Topic_no=$Topic_No");
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

    $result = mysqli_query($connection,"SELECT Presentation FROM content WHERE Topic_no=$Topic_No");
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
      $result = mysqli_query($connection,"SELECT Areas FROM content WHERE Topic_no=$Topic_No");
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
                    $result = mysqli_query($connection,"SELECT Further_Reading FROM content WHERE Topic_no=$Topic_No");
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
    </div>
  </div>
</div>

<!-- <div class="footer">
  <h2>Footer</h2>
</div> -->
    </body>
</html> 