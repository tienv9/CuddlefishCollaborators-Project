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
        echo "Registration updated successfully";
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


    <div class="topnav">
        <a class="title" href="./welcome.php">This is a title, but should also be a link to main page</a>
    </div>
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
