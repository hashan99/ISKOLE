<?php include '../../../../../connection.php'; session_start(); ?>
    <!DOCTYPE html>
    <html>

        <head>
            <title>Quiz</title>
            <link rel = "icon" href = "../../../../Images/logo.PNG" type = "image/x-icon">
            <link href="Quiz.css" rel="stylesheet" type="text/css">
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
                          <a href="../../../AdminHome.php">Home</a>
                            <a href="../../../View Contents/StudentSelectSubject.php">View Content</a>
                            <a href="../../../../../Forum/Forum.php">Forum</a>
                            <a href="../../../Submit Content/SubmitContent.php">Submit Content</a>
                            <a href="../../../Manage Users/ManageUsers.html">Manage Users</a>
                            <!-- <a href="../../../../Profile/Profile.php">Profile</a> -->
                            <a href="#">Notifications</a>
                            <a href="../../../../../logout.php">Log out</a>
                            <!-- <a onclick="myFunction2()">Log out</a> -->
                        </div>
                        <a><button class="openbtn" onclick="openNav()">&#9776;</button></a>
                        <button id=name_tag><b>Admin(Super User)<br></b></button>
                        <img style="float: right; padding-top: 5px;" class="avatar" src="../../../avatar.png" width="60" height="60">
          </nav>
        
        <div id="center">
        <?php 															
			if (isset($_POST['click']) || isset($_GET['start'])) {
				@$_SESSION['clicks'] += 1 ;
				$c = $_SESSION['clicks'];
				if(isset($_POST['userans'])) { $userselected = $_POST['userans'];													
					$fetchqry2 = "UPDATE `quiz` SET `userans`='$userselected' WHERE `quiz_id`=$c-1"; 
					$result2 = mysqli_query($con,$fetchqry2);
				}													
 			}else {
				$_SESSION['clicks'] = 0;
			}
        ?>
        
        <div class="bump">
            <br>
            <form>
                <?php if($_SESSION['clicks']==0){ ?> 
                    <button class="button" name="start" float="left"><span>START QUIZ</span></button> 
                    <?php } ?>
            </form>
        </div>
    
        
        <form action="" method="post">  				
        <table>
            <?php if(isset($c)) {   
                $fetchqry = "SELECT * FROM `quiz` where quiz_id='$c'"; 
				$result=mysqli_query($con,$fetchqry);
				$num=mysqli_num_rows($result);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC); 
            }
            ?>
            
        <tr>
            <td>
                <h3><br><?php echo @$row['que'];?></h3>
            </td>
        </tr> 
        <?php if($_SESSION['clicks'] > 0 && $_SESSION['clicks'] < 6){ ?>
            <tr><td><h4><input required type="radio" name="userans" value="<?php echo $row['option 1'];?>">&nbsp;<?php echo $row['option 1']; ?></h4></td></tr>
            <tr><td><h4><input required type="radio" name="userans" value="<?php echo $row['option 2'];?>">&nbsp;<?php echo $row['option 2'];?></h4></td></tr>
            <tr><td><h4><input required type="radio" name="userans" value="<?php echo $row['option 3'];?>">&nbsp;<?php echo $row['option 3']; ?></h4></td></tr>
            <tr><td><h4><input required type="radio" name="userans" value="<?php echo $row['option 4'];?>">&nbsp;<?php echo $row['option 4']; ?></h4><br><br><br></td></tr>
            <tr><td><button class="button3" name="click" >Next</button></td></tr> 
        <?php } ?> 
        
        <form>
        <?php if($_SESSION['clicks']>5){ 
	        $qry3 = "SELECT `ans`, `userans` FROM `quiz`;";
	        $result3 = mysqli_query($con,$qry3);
	        $storeArray = Array();
	        while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
                if($row3['ans']==$row3['userans']){
		            @$_SESSION['score'] += 1 ;
	             }
            }
            ?>  
 
            <h1>Result</h1>
            <span><h2>No. of Correct Answer:&nbsp;<?php echo $no = @$_SESSION['score']; ?></h2></span><br>
            <span><h2>Your Score:&nbsp<?php echo $no*2; ?></span><h2><br><br><br>
            <a ><button id="review"><b>Review</b></button></a>
        <?php } ?>
        
        </dev>

        <?php if($_SESSION['clicks']==7){ ?>
           <!--  <?php 
                // session_unset();
            ?> -->
            <?php
            header("Location: Review.php");
            exit();
            ?>
        <?php } ?>
        
        </body>
    </html> 
    <?php mysqli_close($con); ?>