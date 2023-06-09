<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "FinalProject";
$dbname = "CudFishProject";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$status = "";
$eventID = null;
$userid = $eventid = 0;

if (isset($_GET['id'])) {
    $eventID = $_GET['id'];
}

session_start();
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = $_POST["status"];
    $userid = $_SESSION["id"];
    $eventid = $_POST["eventid"];

    $sql = "INSERT INTO registration (userid, eventid, status) VALUES ('$userid', '$eventid', '$status')";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        // Log the event user status into the logs table
        $log_action = "Event User Status Updated: Status $status";
        $log_sql = "INSERT INTO logs (user_id, action) VALUES (?, ?)";
        if ($log_stmt = mysqli_prepare($link, $log_sql)) {
            mysqli_stmt_bind_param($log_stmt, "is", $userid, $log_action);
            mysqli_stmt_execute($log_stmt);
            mysqli_stmt_close($log_stmt);
        }

        header("location: welcome.php");
    } else {
        echo "Error updating registration: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="nav" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../CSS/styles.css">


    <nav class="topnav">
    <a class="navbar-brand" href="#">
        <img alt="Home" src="../HTML/Cuttlefishy.png" width= "50"  height= "50" href="welcome.php">
    </a>
    <a class="title" href="./welcome.php">Cuttlefish Events</a>
</nav>
</head>
<body>
<div class="register">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
        <p>Are you interested in attending this event?</p>
        <input type="hidden" name="eventid" value="<?php echo $eventID; ?>">
        <label for="status">Invitation Response: </label>
        <select id="status" name="status">
            <option value="interested">Interested</option>
            <option value="attending">Attending</option>
            <option value="not-attending">Not Attending</option>
        </select> 
        <button type="submit">Update Registration</button>
</form>
</div>
</body>
</html>
