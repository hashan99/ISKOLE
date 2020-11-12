
function myFunction1() {
  var txt;
  var r = confirm("Are you sure you want to logout?");
  if (r == true) {
    location.replace("Profile/Profile.html");
  }
}
function goBack() {
                    window.history.back();
                }