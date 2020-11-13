<?php include '../../../../connection.php'; 

$id = $_GET['cm_id']; 

//unblock
$query = "UPDATE content_manager SET status = 1 WHERE cm_id=$id AND status=0";
$result = mysqli_query($con, $query);

if($result)
{
    header("location:CMManage.php"); 
    exit;	
}
else
{
    echo "Query is Failed!";
}
mysqli_close($con); ?>