<?php include '../../../connection.php'; 

$idStudent = $_GET['stu_id'];
$idTeacher = $_GET['tea_id']; 
$idCM = $_GET['cm_id'];  

//delete
$queryStudent = "DELETE FROM student WHERE student_id=$idStudent";
$resultStudent = mysqli_query($con, $queryStudent);

$queryTeacher = "DELETE FROM teacher WHERE teacher_id=$idTeacher";
$resultTeacher = mysqli_query($con, $queryTeacher);

$queryCM = "DELETE FROM content_manager WHERE cm_id=$idCM";
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