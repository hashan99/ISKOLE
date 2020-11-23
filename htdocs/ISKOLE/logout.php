<?php
session_start();
// unset($_SESSION["un"]);
unset($_SESSION["stuid"]);
unset($_SESSION["fname"]);
unset($_SESSION["lname"]);
unset($_SESSION["grade"]);
unset($_SESSION["medium"]);
unset($_SESSION["email"]);
// unset($_SESSION["xp"]);
// unset($_SESSION["enPwd1"]);
// unset($_SESSION["type"]);
// unset($_SESSION["link"]);
// unset($_SESSION["teaid"]);
// unset($_SESSION["error"]);
    session_destroy();
    header('Location:../ISKOLE/Home/index.php');

?>
