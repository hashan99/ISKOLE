<?php include '../../../connection.php'; session_start(); 
$id=$_GET["id"];
$id1=$_GET["id1"];

mysqli_query($con, "DELETE FROM questions WHERE id=$id");

?>
<script type="text/javascript">
    window.location="AddQuestions.php?id=<?php echo $id1?>";
    </script>