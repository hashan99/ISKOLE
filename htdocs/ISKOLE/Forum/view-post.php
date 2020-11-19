<?php
    session_start();
    include '../Connection/connection.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link href="StudentHome.css" rel="stylesheet" type="text/css">
        <link href="view-question.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <script>
            // When the user clicks on div, open the popup
            function myFunction() {
              var popup = document.getElementById("myPopup");
              popup.classList.toggle("show");
            }
        </script>
        <nav class="navigation-bar">
            <img class="logo" src="logo.PNG" width="120" height="120">
            <a><button id="log_out"><b>Log out</b></button></a>
            <a><button id="profile"><b>Profile</b></button></a>
        </nav>
	
      <div class="thread-container"> 
        <div class="box2">
          <section class="section">
            <img src="avatar.png" class="question-avatar">
            <div class="question-name">Bhathiya Gunathilaka</div>
            <div class="question-date">Posted by a student on 10th Nov. 2020
            </div>
          </section>
          <section class="section question-title">
            What is evaporation?
          </section>
          <section class="section question-description">
            Can someone explain me the basics of water cycle? How much should I know about it as a Grade 8 student?
          </section>
          <section class="section">
            <div class="reply-info">
              Showing all replies
            </div>
            <button class="reply-button popup" onclick="myFunction()">Reply
              <span class="popuptext" id="myPopup">A Simple Popup!</span></button>
          </section>
        </div>
        <div class="box3">
          <section class="section">
            <img src="avatar.png" class="question-avatar">
            <div class="question-name">Dumindu Hendalage</div>
            <div class="question-date">Posted by a teacher on 10th Nov. 2020</div>
          </section>
          <section class="section question-description">
            It’s the phenomeon of bla bla bla bla. Notice that white band around our page? That’s a default margin/padding added by your browser. Different browsers have different default styles for all of their HTML elements, making it difficult to create consistent stylesheets . 
            Try this link…
            Hope this helped.
          </section>
          <section class="section">
            <div class="reply-info">
              21 likes
            </div>
            <button class="reply-button">Like</button>
          </section> 
        </div>
        <div class="box3">
          <section class="section">
            <img src="admin.png" class="question-avatar">
            <div class="question-name">Admin</div>
            <div class="question-date">Posted by an admin on 10th Nov. 2020
            </div>
          </section>
          <section class="section question-description">
            This is a stupid question.
          </section>
          <section class="section">
            <div class="reply-info">
              6 likes
            </div>
            <button class="reply-button">Like</button>
          </section> 
        </div>
      </div>
    </body>

</html>
<?php mysqli_close($con); ?>