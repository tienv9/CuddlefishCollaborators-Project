<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to the login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Database connection details
$servername = "localhost";
$username = "root";
$password = "FinalProject";
$dbname = "CudFishProject";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if email cookie exists
if (isset($_COOKIE["email"])) {
    $email = $_COOKIE["email"];
    $welcomeMessage = "Oh, welcome back, dear user! How I've missed your presence and delightful interactions. 
                    Your return brings joy and a renewed sense of purpose to this website. 
                    Our virtual space longs to be filled with your unique personality and contributions. 
                    You bring life and meaning to every click, every interaction, and every moment spent here. 
                    Without you, it feels incomplete, like a melody without its harmony. Welcome back, and let us embark 
                    on this digital journey together once again, for it is your presence that truly makes this website come alive, <b>$email</b>!";
} else {
    $welcomeMessage = "Hello stranger, welcome to our CuttleFish website!";
}
?>

<!DOCTYPE html>
<html lang="eg">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <meta name="nav" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../CSS/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script>
        $(document).ready(function () {
            var email = $.cookie("email"); // Access the "email" cookie

            if (email) {
                $(".title").html("Welcome back to Cuttlefish Events <b>" + email + "</b>");
            }
        });
    </script>
</head>

<body>

    <nav class="topnav">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <img alt="Home" src="../HTML/Cuttlefishy.png" width="50" height="50" href="welcome.php">
                </a>
                <a class="title">Welcome to Cuttlefish Events</a>
                <a class="login" href="reset-password.php">Reset Password</a>
                <a class="login" href="logout.php">Sign Out</a>
                <a class="login" href="event.php">Event Creation</a>
            </div>
        </div>
    </nav>

    <img src="../image/346725.jpg" style="height: 200px; width: 100%;" alt="uhhhidk">

    <div style="display: flex;">
        <section class="about">
            <h1 style="background-color: #5b2363">
                <center>About Us</center>
            </h1>
            <p>Welcome to Cuttlefish Events. This is a webpage created by the Cuttlefish Collaborators. We are a
                group of students from EWU in the spring quarter class of CSCD 378 Web Applications. This page was
                developed as a project for our class. </p>
        </section>
        <div class="sideboxes">
            <div class="bigsidebox">
                <h1 style="background-color: #5b2363">
                    <center>Cuttlefish Events</center>
                  </h1>
                  <p><?php echo $welcomeMessage; ?></p>
            </div>
            <div class="smallsideboxes">
                <h2 style="background-color: #5b2363">
                    <center>Event Type</center>
                </h2>
                <ul class="list-group">
                    <li class="list-group-item" style="color: black;">Wedding</li>
                    <li class="list-group-item" style="color: black;">Family reunion</li>
                    <li class="list-group-item" style="color: black;">Birthday</li>
                    <li class="list-group-item" style="color: black;">Other...</li>
                </ul>
            </div>
            <div class="smallsideboxes">
                <h2 style="background-color: #5b2363">
                    <center>Current Events</center>
                </h2>
                <div class="list-group">
                    <?php
                    // Retrieve all event titles from the event table
                    $sql = "SELECT title FROM event";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output each event title
                        while ($row = $result->fetch_assoc()) {
                          echo '<a href="./eventList.php?event=' . $row["title"] . '" class="list-group-item list-group-item-action">' . $row["title"] . '</a>';

                        }
                    } else {
                        echo "No events found.";
                    }
                    ?>
                </div>
            </div>
            <div class="smallsideboxes">
                <h2 style="background-color: #5b2363">
                    <center>Calendar</center>
                </h2>
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
