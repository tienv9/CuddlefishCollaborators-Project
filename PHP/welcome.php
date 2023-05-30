<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang = eg>
<head>
<meta name="nav" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>

<div class="topnav">
  <a class="title" >Welcome to our site <b><?php echo htmlspecialchars($_SESSION["email"]); ?></b> </a>
  <a class="login" href="reset-password.php">Reset Your Password</a>
  <a class="login" href="logout.php">Sign Out of Your Account</a>
  <a class="login" href="event.php">Event Creation</a>
  <a class="login" href="eventRegister.php">Event Registration</a>
</div>
<img src="../image/346725.jpg" style="height: 200px; width: 100%;" alt="uhhhidk" >

<div style="display: flex;">
    <div class="about">
      <h2>Title of about</h2>
      <p>Welcome</p>
    </div>
    <div class="sideboxes">
      <div class="bigsidebox">
        <h2>Title of top box</h2>
        <p>Content of top box</p>
      </div>
      <div class ="smallsideboxes">
        <h2>Location</h2>
        <p>we can have like a list of 4-5 location with buttons to open the event here </p>
      </div>
      <div class ="smallsideboxes">        
        <a href="./eventList.php">List of events</a>
        <p>a list of event that is also button that link to the event</p>
      </div>
      <div class ="smallsideboxes">
        <h2>calender</h2>
        <p>Open a calendar page with all the planted event different color depend on type of event</p>
      </div>
    </div>
  </div>
  


</body>
</html>