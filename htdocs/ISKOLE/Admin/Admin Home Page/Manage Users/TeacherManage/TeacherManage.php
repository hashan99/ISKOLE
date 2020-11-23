<?php include '../../../../connection.php'; ?>

<!DOCTYPE html>
<html>

<head>
	<title>Admin Manage Teachers</title>
	<link rel = "icon" href = "../../../../Images/logo.PNG" type = "image/x-icon"> 
    <link href="TeacherManage.css" rel="stylesheet" type="text/css">

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
                        <img class="logo" src="../logo.PNG" width="100" height="100">
                        <div id="mySidepanel" class="sidepanel">
                          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                          <a href="../../AdminHome.php">Home</a>
                            <a href="../../View Contents/StudentSelectSubject.php">View Content</a>
                            <a href="../../../../Forum/Forum.php">Forum</a>
                            <a href="../../Submit Content/SubmitContent.php">Submit Content</a>
                            <a href="../../Manage Users/ManageUsers.html">Manage Users</a>
                            <!-- <a href="../../../Profile/Profile.php">Profile</a> -->
                            <a href="#">Notifications</a>
                            <a href="../../../../logout.php">Log out</a>
                            <!-- <a onclick="myFunction2()">Log out</a> -->
                        </div>
                        <a><button class="openbtn" onclick="openNav()">&#9776;</button></a>
                        <button id=name_tag><b>Admin(Super User)<br></b></button>
                        <img style="float: right; padding-top: 5px;" class="avatar" src="../../avatar.png" width="60" height="60">
                    </nav>

	<div class="container">
  <h1 align="center">Manage Teachers</h1>

  <br>
  <!-- <br> -->

<?php 
 		
?>
             
  <table id="customers" width="100%" border="1">
    
      <tr align="center" class="info">
        <th>Teacher_ID</th>
        <th>First_Name</th>
        <th>Last_Name</th>
        <th>Subject</th>
        <th>Medium</th>
        <th>Email</th>
        <!-- <th>enPw</th> -->
        <th>Status</th>
        <th>Delete</th>
        <th>Block</th>
        <th>Unblock</th>
        <!-- <th>Action</th> -->
      </tr>

<?php
	$query = "SELECT * FROM teacher";
 		$result = mysqli_query($con, $query);
      if($result)
      {
      	// echo mysqli_num_rows($result);
 		while($row = mysqli_fetch_assoc($result))
 		{
 			// echo "<pre>";
 			// print_r($row);
 			// echo "</pre><br>";
 			// echo "<button>Delete</button>";
 			// echo "&nbsp";
 			// echo "<button>Update</button>";
 			$teacher_id = $row['teacher_id'];
 			$first_name = $row['first_name'];
 			$last_name  = $row['last_name'];
      $subject    = $row['subject'];
      $medium     = $row['medium'];
 			$email 		  = $row['email'];
 			// $enPw 		= $row['password'];
 			$status 	  = $row['status'];

 			echo "<tr>";
        	echo "<td>".$teacher_id."</td>";
        	echo "<td>".$first_name."</td>";
        	echo "<td>".$last_name."</td>";
          echo "<td>".$subject."</td>";
          echo "<td>".$medium."</td>";
        	echo "<td>".$email."</td>";
        	// echo "<td>".$password."</td>";
        	echo "<td>".$status."</td>"; ?>

        	<!-- echo "<td>"."<a href>Delete</Button>"."</td>"; -->
        	<!-- echo "<td>"."<Button>Delete</Button>"."</td>";
        	echo "<td>"."<Button>Block</Button>"."</td>";
          echo "<td>"."<Button>Unblock</Button>"."</td>"; -->
          <td><a style="text-decoration:none" href="../delete.php?tea_id=<?php echo $teacher_id; ?>"><button id="button">Delete</button></a></td>
          <td><a style="text-decoration:none" href="../block.php?tea_id=<?php echo $teacher_id; ?>"><button id="button">Block</button></a></td>
          <td><a style="text-decoration:none" href="../unblock.php?tea_id=<?php echo $teacher_id; ?>"><button id="button">Unblock</button></a></td>
        	<?php echo "</tr>"; 
 		}

      }
      else
 		{
 			echo "There is no data found!";
 		}
?>
    
    
      
   <!--  <?php
      // foreach ($data as $row)
      // {
      //   echo "<tr>";
      //   echo "<td>".$row->Member_ID."</td>";
      //   echo "<td>".$row->First_Name."</td>";
      //   echo "<td>".$row->Last_Name."</td>";
      //   echo "<td>".$row->IGN."</td>";
      //   echo "<td>".$row->Contact_Number."</td>";
      //   echo "<td>".$row->Primary_Game."</td>";
      //   echo "<td><a href='deletedata?Member_ID=".$row-> Member_ID."'>Delete</a></td>";
      //   // echo "<td><a href='updatedata?Member_ID=".$row-> Member_ID."'>Update</a></td>";
      //   echo "</tr>";
      // }

    ?> -->
    
  </table>
</div>

	

</body>
</html>

<?php mysqli_close($con); ?>