<?php include '../../../connection.php'; 

$idStudent = $_GET['stu_id'];
$idTeacher = $_GET['tea_id']; 
$idCM = $_GET['cm_id'];  

//unblock
$queryStudent = "UPDATE student SET status = 1 WHERE student_id=$idStudent AND status=0";
$resultStudent = mysqli_query($con, $queryStudent);

$queryTeacher = "UPDATE teacher SET status = 1 WHERE teacher_id=$idTeacher AND status=0";
$resultTeacher = mysqli_query($con, $queryTeacher);

$queryCM = "UPDATE content_manager SET status = 1 WHERE cm_id=$idCM AND status=0";
$resultCM = mysqli_query($con, $queryCM);

if($resultStudent)
{
    header("location:StudentManage/StudentManage.php"); 
    exit;	
}
else if($resultTeacher)
{
    header("location:TeacherManage/TeacherManage.php"); 
    exit;	
}
else if($resultCM)
{
    header("location:CMManage/CMManage.php"); 
    exit;	
}
else
{
    echo "Query is Failed!";
}
mysqli_close($con); ?>