<?php include '../../../../connection.php'; 

$id = $_GET['cm_id']; 

//block
$query = "UPDATE content_manager SET status = 0 WHERE cm_id=$id AND status=1";
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