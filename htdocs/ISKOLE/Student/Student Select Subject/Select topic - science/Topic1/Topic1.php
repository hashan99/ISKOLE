<?php include '../../../../connection.php'; 
  session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel = "icon" href = "../Images/logo.PNG" type = "image/x-icon">
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
              <a href="../../../StudentHome.php">Home</a>
              <a href="../../../Student Select Subject/StudentSelectSubject.php">Subjects</a>
              <a href="../../../../Forum/Forum.php">Forum</a>
              <a href="../../../LeaderBoard/leaderboard.php">Leaderboard</a>
              <a href="../../../GetHelp/gethelp.php">Get Help</a>
              <a href="../../../../Profile/StuProfile.php">Profile</a>
              <a href="../../../../logout.php">Log out</a>
              <!-- <a onclick="myFunction2()">Log out</a> -->
            </div>
            <a><button class="openbtn" onclick="openNav()">&#9776;</button></a>
            <a href="../../../../Profile/StuProfile.php"><button id=name_tag><b><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?>
            <br>
            <?php 
                if($_SESSION['type'] == 1)
                  {
                    echo $_SESSION['xp']." xp | #3"; 
                  }
                  else
                  {
                    // echo $_SESSION['subject'];
                  }
              ?></b></button>
            <img style="float: right; padding-top: 5px;" class="avatar" src="../../../avatar.png" width="60" height="60"></a>../
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
    <a style="text-decoration:none" href="../Quiz/Quiz.php"><button id="button"><b>Attempt Quiz</b></button></a>
    

    </div>
  </div>
</div>

    </body>
</html> 

<?php mysqli_close($con); ?>