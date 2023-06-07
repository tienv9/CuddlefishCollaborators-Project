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

<<<<<<< HEAD
<div class="topnav">
  <a class="title" >Welcome to our site <b><?php echo htmlspecialchars($_SESSION["email"]); ?></b> </a>
  <a class="login" href="reset-password.php">Reset Your Password</a>
  <a class="login" href="logout.php">Sign Out of Your Account</a>
  <a class="login" href="event.php">Event Creation</a>
</div>
=======
<nav class="topnav">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
      <img alt="Home" src="../HTML/Cuttlefishy.png"
           width= "50"  height= "50" "./Cuttlefishy.png">
      </a
      <a class="title" href="../HTML/index.html">Cuttlefish Events</a>
      <a class="title" >Welcome to our site <b><?php echo htmlspecialchars($_SESSION["first_name"]); ?></b> </a>
      <a class="login" href="reset-password.php">Reset Your Password</a>
      <a class="login" href="logout.php">Sign Out of Your Account</a>
      <a class="login" href="event.php">Event Creation</a>
      <a class="login" href="eventRegister.php">Event Registration</a>
    </div>
  </div>
</nav>
>>>>>>> main
<img src="../image/346725.jpg" style="height: 200px; width: 100%;" alt="uhhhidk" >

<div style="display: flex;">
  <section class="about">
    <h1 style = "background-color: #5b2363"><center>About Us</center></h1>
    <p>Welcome to Cuttlefish Events. This is a webpage created by the Cuttlefish Collaborators.
      We are a group of students from EWU in the spring quarter class of CSCD 378 Web Applications. This page was developed as a project for our class. </p>
  </section>
    <div class="sideboxes">
      <div class="bigsidebox">
        <h1 style = "background-color: #5b2363"><center>Cuttlefish Events</center></h1>
      </div>
      <div class ="smallsideboxes">
        <h2 style = "background-color: #5b2363"><center>Location</center></h2>
        <ul class="list-group">
          <li class="list-group-item">An item</li>
          <li class="list-group-item">A second item</li>
          <li class="list-group-item">A third item</li>
          <li class="list-group-item">A fourth item</li>
          <li class="list-group-item">And a fifth one</li>
        </ul>
      </div>
      <div class ="smallsideboxes">
        <h2 style = "background-color: #5b2363"><center>Current Events</center></h2>
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action">A simple default list group item</a>

          <a href="#" class="list-group-item list-group-item-action list-group-item-primary">A simple primary list group item</a>
          <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">A simple secondary list group item</a>
          <a href="#" class="list-group-item list-group-item-action list-group-item-success">A simple success list group item</a>
          <a href="#" class="list-group-item list-group-item-action list-group-item-danger">A simple danger list group item</a>
          <a href="#" class="list-group-item list-group-item-action list-group-item-warning">A simple warning list group item</a>
          <a href="#" class="list-group-item list-group-item-action list-group-item-info">A simple info list group item</a>
          <a href="#" class="list-group-item list-group-item-action list-group-item-light">A simple light list group item</a>
          <a href="#" class="list-group-item list-group-item-action list-group-item-dark">A simple dark list group item</a>

        <!--<a href="./eventList.php">List of events</a>
        <p>a list of event that is also button that link to the event</p> -->
        </div>
      </div>
      <div class ="smallsideboxes">
        <h2 style = "background-color: #5b2363"><center>Calendar</center></h2>
        <head>
          <style>
            table {
              border-collapse: collapse;
              background: white;
              color: black;
            }

            th,
            td {
              font-weight: bold;
            }
          </style>
        </head>

        <body>
        <h3 style="color: orange;">
          June 2023
        </h3>
        <br />

        <table>
          <thead>
          <tr>
            <th style="color: white; background: purple;">
              Sun</th>
            <th style="color: white; background: purple;">
              Mon</th>
            <th style="color: white; background: purple;">
              Tue</th>
            <th style="color: white; background: purple;">
              Wed</th>
            <th style="color: white; background: purple;">
              Thu</th>
            <th style="color: white; background: purple;">
              Fri</th>
            <th style="color: white; background: purple;">
              Sat</th>
          </tr>
          </thead>

          <tbody>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>1</td>
            <td>2</td>
            <td>3</td>
          </tr>
          <tr></tr>
          <tr>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            <td>9</td>
            <td>10</td>
          </tr>
          <tr>
            <td>11</td>
            <td>12</td>
            <td>13</td>
            <td>14</td>
            <td>15</td>
            <td>16</td>
            <td>17</td>
          </tr>
          <tr>
            <td>18</td>
            <td>19</td>
            <td>20</td>
            <td>21</td>
            <td>22</td>
            <td>23</td>
            <td>24</td>
          </tr>
          <tr>
            <td>25</td>
            <td>26</td>
            <td>27</td>
            <td>28</td>
            <td>29</td>
            <td>30</td>
            <td>1</td>
          </tr>
          <tr>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
          </tr>
          </tbody>
        </table>
        </body>
      </div>
    </div>
  </div>
  


</body>
</html>