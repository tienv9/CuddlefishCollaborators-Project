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
    <div>
        <h1>Event List</h1>
        <p>Please Select Your Event</p>

        <table class="eventListTable">
            <tr>
                <th>Event Title</th>
                <th>Description</th>
                <th>Event Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Location</th>
                <th>Event Capacity</th>
                <th>Event Category</th>
                <th>Other</th>
            </tr>

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

            // Query to retrieve data from the event table
            $sql = "SELECT * FROM event";
            $result = $conn->query($sql);

            // Display data in the table rows
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["title"] . "</td>";
                    echo "<td>" . $row["description"] . "</td>";
                    echo "<td>" . $row["event_date"] . "</td>";
                    echo "<td>" . $row["start_time"] . "</td>";
                    echo "<td>" . $row["end_time"] . "</td>";
                    echo "<td>" . $row["location"] . "</td>";
                    echo "<td>" . $row["capacity"] . "</td>";
                    echo "<td>" . $row["category"] . "</td>";
                    echo "<td>" . $row["other"] . "</td>";
                    echo "<td><a href='./eventInfo.php?id=" . $row["id"] ."'>Select</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No events found.</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>

<style>
th{
  text-align: center;
  padding: 8px;
}
td{
  text-align: center;
  padding: 8px;
}
</style>