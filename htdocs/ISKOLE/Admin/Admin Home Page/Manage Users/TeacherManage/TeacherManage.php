<?php include '../../../../connection.php'; ?>

<!DOCTYPE html>
<html>

<head>
	<title>Manage Teachers</title>
	<link rel = "icon" href = "../../../../Images/logo.PNG" type = "image/x-icon"> 
    <link href="TeacherManage.css" rel="stylesheet" type="text/css">

    <script>
		function logout() {
  		var txt;
  		var r = confirm("Are you sure you want to logout?");
  		if (r == true) {
    	location.replace("../../../../Home/index.php");
  	}
}

// function stu_delete() {
//       var txt;
//       var r = confirm("Are you sure you want to delete student?");
//       if (r == true) {
//       // location.replace("../../../../Home/index.php");
//     }
// }
</script>
</head>

<body>

	<nav class="navigation-bar">
        <a href="../../../../Home/index.php" id="logo"><img class="logo" src="../../../../Images/logo.PNG" width="100" height="100"></a>
        <a><button id="sign_in" onclick="logout()"><b>Log out</b></button></a>
        <a href="../ManageUsers.html"><button id="log_in"><b>Back</button></a>
    </nav>

	<div class="container">
  <h1 align="center">Manage Teacher Details</h1>

  <br>
  <!-- <br> -->

<?php 
 		
?>
             
  <table id="customers" width="100%" border="1">
    
      <tr align="center" class="info">
        <th>Teacher_ID</th>
        <th>First_Name</th>
        <th>Last_Name</th>
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
 			$email 		  = $row['email'];
 			// $enPw 		= $row['password'];
 			$status 	  = $row['status'];

 			echo "<tr>";
        	echo "<td>".$teacher_id."</td>";
        	echo "<td>".$first_name."</td>";
        	echo "<td>".$last_name."</td>";
        	echo "<td>".$email."</td>";
        	// echo "<td>".$password."</td>";
        	echo "<td>".$status."</td>"; ?>

        	<!-- echo "<td>"."<a href>Delete</Button>"."</td>"; -->
        	<!-- echo "<td>"."<Button>Delete</Button>"."</td>";
        	echo "<td>"."<Button>Block</Button>"."</td>";
          echo "<td>"."<Button>Unblock</Button>"."</td>"; -->
          <td><a style="text-decoration:none" href="delete.php?tea_id=<?php echo $teacher_id; ?>"><button id="button">Delete</button></a></td>
          <td><a style="text-decoration:none" href="block.php?tea_id=<?php echo $teacher_id; ?>"><button id="button">Block</button></a></td>
          <td><a style="text-decoration:none" href="unblock.php?tea_id=<?php echo $teacher_id; ?>"><button id="button">Unblock</button></a></td>
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