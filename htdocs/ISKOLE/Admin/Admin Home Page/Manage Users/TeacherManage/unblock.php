<?php include '../../../../connection.php'; 

$id = $_GET['tea_id']; 

//unblock
$query = "UPDATE teacher SET status = 1 WHERE teacher_id=$id AND status=0";
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