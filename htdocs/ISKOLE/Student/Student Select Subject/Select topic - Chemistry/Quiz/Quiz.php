<?php include '../../../../connection.php'; session_start() ?>
    <!DOCTYPE html>
    <html>

        <head>
            <title>Quiz</title>
            <link rel = "icon" href = "../../../../Images/logo.PNG" type = "image/x-icon">
            <link href="Quiz.css" rel="stylesheet" type="text/css">
        </head>

        <body>

        <nav class="navigation-bar">
            <a href="../Home/index.php" id="logo"><img class="logo" src="logo.PNG" width="100" height="100"></a>
        </nav>
        
        <div id="center">
        <?php 															
			if (isset($_POST['click']) || isset($_GET['start'])) {
				@$_SESSION['clicks'] += 1 ;
				$c = $_SESSION['clicks'];
				if(isset($_POST['userans'])) { $userselected = $_POST['userans'];													
					$fetchqry2 = "UPDATE `quiz` SET `userans`='$userselected' WHERE `quiz_id`=$c-1"; 
					$result2 = mysqli_query($con,$fetchqry2);
				}													
 			}else {
				$_SESSION['clicks'] = 0;
			}
        ?>
        
        <div class="bump">
            <br>
            <form>
                <?php if($_SESSION['clicks']==0){ ?> 
                    <button class="button" name="start" float="left"><span>START QUIZ</span></button> 
                    <?php } ?>
            </form>
        </div>
    
        
        <form action="" method="post">  				
        <table>
            <?php if(isset($c)) {   
                $fetchqry = "SELECT * FROM `quiz` where quiz_id='$c'"; 
				$result=mysqli_query($con,$fetchqry);
				$num=mysqli_num_rows($result);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC); 
            }
            ?>
            
        <tr>
            <td>
                <h3><br><?php echo @$row['que'];?></h3>
            </td>
        </tr> 
        <?php if($_SESSION['clicks'] > 0 && $_SESSION['clicks'] < 6){ ?>
            <tr><td><input required type="radio" name="userans" value="<?php echo $row['option 1'];?>">&nbsp;<?php echo $row['option 1']; ?><br>
            <tr><td><input required type="radio" name="userans" value="<?php echo $row['option 2'];?>">&nbsp;<?php echo $row['option 2'];?></td></tr>
            <tr><td><input required type="radio" name="userans" value="<?php echo $row['option 3'];?>">&nbsp;<?php echo $row['option 3']; ?></td></tr>
            <tr><td><input required type="radio" name="userans" value="<?php echo $row['option 4'];?>">&nbsp;<?php echo $row['option 4']; ?><br><br><br></td></tr>
            <tr><td><button class="button3" name="click" >Next</button></td></tr> 
        <?php } ?> 
        
        <form>
        <?php if($_SESSION['clicks']>5){ 
	        $qry3 = "SELECT `ans`, `userans` FROM `quiz`;";
	        $result3 = mysqli_query($con,$qry3);
	        $storeArray = Array();
	        while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
                if($row3['ans']==$row3['userans']){
		            @$_SESSION['score'] += 1 ;
	             }
            }
            ?>  
 
            <h2>Result</h2>
            <span>No. of Correct Answer:&nbsp;<?php echo $no = @$_SESSION['score']; ?></span><br>
            <span>Your Score:&nbsp<?php echo $no*2; ?></span><br><br><br>
            <a ><button id="cancel"><b>Review</b></button></a>
        <?php } ?>
        
        </dev>

        <?php if($_SESSION['clicks']==7){ ?>
            <?php session_unset();?>
            <?php
            header("Location: Review.php");
            exit();
            ?>
        <?php } ?>
        
        </body>
    </html> 
    <?php mysqli_close($con); ?>