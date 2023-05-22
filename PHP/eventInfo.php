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
if (isset($_GET['id']))
    $eventID = $_GET['id'];

    // Query to fetch event details based on the event ID
    $sql = "SELECT * FROM event WHERE id = $eventID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
        $event = $result->fetch_assoc();
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
<div class="eventInfo">
    <h1>Your Event Information</h1>

    <p>Event Title: <?php echo $event["title"]; ?> </p> 
    <p>Description: <?php echo $event["description"]; ?> </p>
    <p>Event Date: <?php echo $event["event_date"]; ?> </p>
    <p>Start Time: <?php echo $event["start_time"]; ?> </p>
    <p>End Time: <?php echo $event["end_time"]; ?> </p>
    <p>Location: <?php echo $event["location"]; ?> </p>
    <p>Event Capacity: <?php echo $event["capacity"]; ?> </p>
    <p>Event Category: <?php echo $event["category"]; ?> </p>
    <p>If Other Category: <?php echo $event["other"]; ?> </p>

    <a href="./eventList.php">Back to Event List</a> 
    <br/>
    <br/>
    <a href="./eventRegister.php?id=<?php echo $eventID; ?>">Register for this Event</a>
</div>

</body>

</html>

<style>
    .eventInfo {
        padding-left: 10px;
    }
</style>


