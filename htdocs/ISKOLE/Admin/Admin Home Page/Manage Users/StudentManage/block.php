<?php include '../../../../connection.php'; 

$id = $_GET['stu_id']; 

//block
$query = "UPDATE student SET status = 0 WHERE student_id=$id AND status=1";
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