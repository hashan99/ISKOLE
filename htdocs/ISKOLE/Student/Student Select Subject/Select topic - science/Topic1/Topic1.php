<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel = "icon" href = "../Images/logo.PNG" type = "image/x-icon">
        <link href="Topic1.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <script>
function myFunction() {
  var txt;
  var r = confirm("Are you sure you want to logout?");
  if (r == true) {
    location.replace("Profile/Profile.html");
  }
}
</script> -->
    </head>
    <body>

        <nav class="navigation-bar">
            <img class="logo" src="logo.PNG" width="100" height="100">
            <!-- <a><button id="log_out"><b>Log out</b></button></a> -->
            <a href="../../../../logout.php"><button id="log_out">Log out</button></a>
            <!-- <a><button id="back" onclick="goBack()"> <b>Back </b></button></a> -->

            <script>
                function goBack() {
                    window.history.back();
                }
            </script>
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
            echo '<pre>' .$row['Areas']. '</pre>';
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