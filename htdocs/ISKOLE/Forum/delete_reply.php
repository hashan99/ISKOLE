<?php 
    session_start();
    include '../connection.php';

        if($_GET["id"]){

        $delete_reply = $_GET["id"];
        $dbQuery2 = "DELETE FROM reply WHERE reply_id='$delete_reply'";

        $result_delete = mysqli_query($con, $dbQuery2);

        if($result_delete)
        {
            header ('location:view-post.php');
        }
        else
        {
            echo "Failed!";
        }
    }
 mysqli_close($con); ?>