<!DOCTYPE html>
<html>
    <head>
        <title>Manage Students</title>
        <link href="ManageStudents.css" rel="stylesheet" type="text/css">


</style>

    </head>
    <body>
        <nav class="navigation-bar">
            <img class="logo" src="logo.PNG" width="120" height="120">
            <a><button id="log_out"><b>Log out</b></button></a>
            <a><button id="back" onclick="goBack()"> <b>Back </b></button></a>

            <script>
                function goBack() {
                    window.history.back();
                }
            </script>
        </nav>
	
        <div id="center">

        <table id="students">
  <tr>
    <td>Id.</td>
    <td>First Name</td>
    <td>Last name</td>
    <td>Email</td>
    <td>Delete</td>
  </tr>

        <?php include '../../../../Connection/connection.php'; 
            $records = mysqli_query($con,"select * from student"); // fetch data from database

            while($data = mysqli_fetch_array($records))
            {
        ?>
        <tr>
    <td><?php echo $data['student_id']; ?></td>
    <td><?php echo $data['first_name']; ?></td>
    <td><?php echo $data['last_name']; ?></td>
    <td><?php echo $data['email']; ?></td>    
    <td><a style="text-decoration:none" href="delete.php?id=<?php echo $data['student_id']; ?>"><button id="button">Delete</button></a></td>
  </tr>	
<?php
}
?>
</table>

            
            
        </div>
    </body>
</html> 

<?php mysqli_close($con); ?>