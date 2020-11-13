<?php include '../../../../connection.php'; 

$id = $_GET['tea_id']; 


$query = "DELETE FROM teacher WHERE teacher_id=$id";
$result = mysqli_query($con, $query);

if($result)
{
    header("location:TeacherManage.php"); 
    exit;	
}
else
{
    echo "Query is Failed!";
}
mysqli_close($con); ?>