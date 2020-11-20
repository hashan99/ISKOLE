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
            <a href="../Home/index.php" id="logo"><img class="logo" src="logo.PNG" width="100" height="100"></a>
        </nav>

        <div class="container">
        <h1 align="center">Quiz Review</h1>
  <table id="customers" width="100%" border="1">
    
      <tr align="center" class="info">
        <th>Question</th>
        <th>Your Answer</th>
        <th>Correct Answer</th>
      </tr>

<?php
	$query = "SELECT que,ans,userans FROM quiz";
 		$result = mysqli_query($con, $query);
      if($result)
      {
 		while($row = mysqli_fetch_assoc($result))
 		{
       $question = $row['que'];
       $useranswer = $row['userans'];
 			$answer = $row['ans'];

 			echo "<tr>";
          echo "<td>".$question."</td>";
          echo "<td>".$useranswer."</td>";
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
    
  </table>
  <div id="center">
  <a><button id="cancel"><b>Back to content</b></button></a>
  </div>
  </div>
</body>
</html>

<?php mysqli_close($con); ?>