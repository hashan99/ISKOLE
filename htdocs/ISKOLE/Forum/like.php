<?php 
    session_start();
    include '../connection.php';
    $user = $_SESSION['stuid'];
    $question= $_GET["x"];

        if($_GET["id"]){

        $liked_reply = $_GET["id"];
        $dbQuery2 = "INSERT INTO likes (reply_id, student_id) VALUES ('$liked_reply','$user') ";

        $result_like = mysqli_query($con, $dbQuery2);

        if($result_like)
        {
            header ("location:view-post.php?x=$question");
        }
        else
        {
            echo "Failed!";
        }
    }
 mysqli_close($con); ?>