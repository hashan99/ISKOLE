<?php

include '../../../../Connection/connection.php'; // Using database connection file here

$id = $_GET['id']; // get id through query string

$del = mysqli_query($con,"delete from student where student_id = '$id'"); // delete query

if($del)
{
    mysqli_close($con); // Close connection
    header("location:ManageStudents.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>