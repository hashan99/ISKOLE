<?php include '../../../../connection.php'; 

$id = $_GET['stu_id']; 

//unblock
$query = "UPDATE student SET status = 1 WHERE student_id=$id AND status=0";
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