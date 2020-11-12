<?php include '../Connection/connection.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Manage Users</title>
        <link href="ManageUsers.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <nav class="navigation-bar">
            <img class="logo" src="logo.PNG" width="120" height="120">
            <a><button id="log_out"><b>Log out</b></button></a>
            <a><button id="back" onclick="goBack()"> <b>Back </b></button></a>

            <script>
                function goBack() {
                    window.history.back();
                }
            </script>
        </nav>
	
	    <div id="center">
  		    <div class="button">
    		    <a><button id="button"> Students </button></a>
                <a><button id="button"> Teachers </button></a>
  		    </div>
	    </div>   
    </body>
</html> 

<?php mysqli_close($con); ?>