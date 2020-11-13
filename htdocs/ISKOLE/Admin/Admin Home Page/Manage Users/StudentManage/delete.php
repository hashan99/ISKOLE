<?php include '../../../../connection.php'; 

$id = $_GET['stu_id']; 


$query = "DELETE FROM student WHERE student_id=$id";
$result = mysqli_query($con, $query);

if($result)
{
    header("location:StudentManage.php"); 
    exit;	
}
else
{
    echo "Query is Failed!";
}
mysqli_close($con); ?>