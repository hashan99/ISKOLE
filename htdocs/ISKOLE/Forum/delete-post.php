<?php 
    session_start();
    include '../connection.php';

        if($_GET["id"]){

        $delete_question = $_GET["id"];
        $dbQuery2 = "DELETE FROM thread WHERE thread_id='$delete_question'";

        $result_delete = mysqli_query($con, $dbQuery2);

        if($result_delete)
        {
            header ('location:Forum.php');
        }
        else
        {
            echo "Failed!";
        }
    }
 mysqli_close($con); ?>