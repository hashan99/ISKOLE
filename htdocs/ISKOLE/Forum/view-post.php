<?php
    session_start();
    include '../connection.php';
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
  /* Set the width of the sidebar to 250px (show it) */
  function openNav() {
  document.getElementById("myReply").style.height = "auto";
  document.getElementById("myReply").style.paddingBottom = "60px";
}

/* Set the width of the sidebar to 0 (hide it) */
function closeNav() {
  document.getElementById("myReply").style.height = "0";
  document.getElementById("myReply").style.paddingBottom = "0";
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
            <a><button class="reply-button" onclick="openNav()">Reply</button></a>
          </section>
        </div>
        <div id="myReply" class="replybox">
          <a class="closebtn" onclick="closeNav()">&times;</a>
            <p class="replying-to">Replying to Bhathiya Gunathilaka</p>
            <form method="POST">
              <div>
              <textarea placeholder="Start typing..." class="reply-message"></textarea>
              <br><button class="post-button">Post</button>
              </div>

            </form>
        </div>
        <div class="box3">
          <section class="section">
            <img src="avatar.png" class="question-avatar">
            <div class="question-name">Dumindu Hebdalage</div>
            <div class="question-date">Posted by a teacher on 10th Nov. 2020
            </div>
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