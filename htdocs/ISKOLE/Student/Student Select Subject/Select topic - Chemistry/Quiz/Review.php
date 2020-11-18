<?php include '../../../../connection.php'; ?>

<!DOCTYPE html>
<html>

<head>
	<title>Quiz review</title>
	<link rel = "icon" href = "../../../../Images/logo.PNG" type = "image/x-icon"> 
    <link href="Review.css" rel="stylesheet" type="text/css">

    <script>
		function logout() {
  		var txt;
  		var r = confirm("Are you sure you want to logout?");
  		if (r == true) {
    	location.replace("../../../../Home/index.php");
  	}
}
</script>
</head>

<body>

	<nav class="navigation-bar">
        <a href="../../../../Home/index.php" id="logo"><img class="logo" src="../../../../Images/logo.PNG" width="100" height="100"></a>
        <a><button id="sign_in" onclick="logout()"><b>Log out</b></button></a>
        <a href="../ManageUsers.html"><button id="log_in"><b>Back</button></a>
    </nav>

	<div class="container">
  
 

<?php 
 		
?>
             
  <table id="customers" width="100%" border="1">
    
      <tr align="center" class="info">
        <th>Question</th>
        <!-- <th>Last_Name</th> -->
        <th>Answer</th>
        <!-- <th>enPw</th> -->
      </tr>

<?php
	$query = "SELECT que,ans FROM quiz";
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
 			$question = $row['que'];
 			$answer = $row['ans'];

 			echo "<tr>";
        	echo "<td>".$question."</td>";
        	echo "<td>".$answer."</td>";
        	 ?>

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