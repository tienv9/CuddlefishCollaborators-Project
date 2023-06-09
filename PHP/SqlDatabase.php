<?php
if (!empty($_GET['q'])) {
    switch ($_GET['q']) {
        case 'info':
            phpinfo();
            exit;
    }
}
?>

<?php
//Create Database

$servername = "localhost";
$username = "root";
$password = "FinalProject";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS CudFishProject";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?>

<?php
//Create Table Event

$servername = "localhost";
$username = "root";
$password = "FinalProject";
$dbname = "CudFishProject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE if not exists `event` (
`id` INT AUTO_INCREMENT PRIMARY KEY,
`organizerid` INT NOT NULL,
`title` VARCHAR(255) NOT NULL,
`description` TEXT NOT NULL,
`event_date` DATE NOT NULL,
`start_time` DATETIME NOT NULL,
`end_time` DATETIME NOT NULL,
`location` VARCHAR(255) NOT NULL,
`capacity` INT NOT NULL,
`category` ENUM ('wedding', 'family-reunion', 'birthday', 'other') NOT NULL DEFAULT 'wedding',
`other` VARCHAR(255) NOT NULL,
`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
`updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Event created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

<?php
//Create Table Users

$servername = "localhost";
$username = "root";
$password = "FinalProject";
$dbname = "CudFishProject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE if not exists `users` (
`id` INT AUTO_INCREMENT PRIMARY KEY,
`email` VARCHAR(255) UNIQUE NOT NULL,
`password` VARCHAR(255) NOT NULL,
`first_name` VARCHAR(50) NOT NULL,
`last_name` VARCHAR(50) NOT NULL,
`user_role` ENUM('admin', 'event_organizer', 'participant') NOT NULL DEFAULT 'participant',
`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
`updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>


<?php
//Create Table Registration

$servername = "localhost";
$username = "root";
$password = "FinalProject";
$dbname = "CudFishProject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE if not exists `registration` (
`id` INT AUTO_INCREMENT PRIMARY KEY,
`userid` INT NOT NULL,
`eventid` INT NOT NULL,
`status` ENUM('interested', 'attending', 'not-attending') NOT NULL DEFAULT 'not-attending',
`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
`updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Registration created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

<?php
//Create Table Categories

$servername = "localhost";
$username = "root";
$password = "FinalProject";
$dbname = "CudFishProject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE if not exists `categories` (
`id` INT AUTO_INCREMENT PRIMARY KEY,
`name` VARCHAR(50) NOT NULL,
`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
`updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Category created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

<?php
//Create Table logs

$servername = "localhost";
$username = "root";
$password = "FinalProject";
$dbname = "CudFishProject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE if not exists `logs` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `action` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Logs created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
