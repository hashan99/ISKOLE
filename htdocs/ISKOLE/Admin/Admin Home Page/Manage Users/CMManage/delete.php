<?php include '../../../../connection.php'; 

$id = $_GET['cm_id']; 


$query = "DELETE FROM content_manager WHERE cm_id=$id";
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