<?php include '../../../Connection/connection.php'; ?>


<!DOCTYPE html>
<html>
    <head>
        <title>Subject</title>
        <link href="SubmitContent.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <nav class="navigation-bar">
            <img class="logo" src="logo.PNG" width="100" height="100">
            <a><button id="log_out"><b>Log out</b></button></a>
            <a><button id="back" onclick="goBack()"> <b>Back </b></button></a>

            <script>
                function goBack() {
                    window.history.back();
                }
            </script>
        </nav>

        
	    <div id="center">
              <!--add the dropdown for grade and subject then the content -->
              <div class="container">
                <form action="/action_page.php">
                              
                <div class="row">
                  <div class="col-25">
                    <label for="grade">Grade</label>
                  </div>
                  <div class="col-75">
                    <select id="grade" name="grade">
                      <option value="o1">Grade 01</option>
                      <option value="02">Grade 02</option>
                      <option value="03">Grade 03</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-25">
                    <label for="subject">Subject</label>
                  </div>
                  <div class="col-75">
                    <select id="subject" name="subject">
                      <option value="maths">Maths</option>
                      <option value="science">Science</option>
                      <option value="english">English</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-25">
                    <label for="topic">Topic</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="topic" name="topic" placeholder="Topic here...">
                  </div>
                </div>

                <div class="row">
                  <div class="col-25">
                    <label for="content">Content</label>
                  </div>
                  <div class="col-75">
                    <textarea id="content" name="content" placeholder="Write your content here.." style="height:200px"></textarea>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-30">
                    <a><button id="submitButton"> Submit </button></a>
                  </div>
                  <div class="col-70">
                    <a><button id="cancelButton"> Cancel </button></a>
                  </div>
                </div>
                </form>
              </div>
            
        </div> 
          
    </body>
</html> 

<?php mysqli_close($con); ?>