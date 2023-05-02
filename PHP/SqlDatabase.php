<?php
if (!empty($_GET['q'])) {
    switch ($_GET['q']) {
        case 'info':
            phpinfo();
            exit;
            break;
    }
}
?>

//Create Database
<?php
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

//Create Table Event
<?php
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
`start_time` DATE NOT NULL,
`end_time` DATE NOT NULL,
`location` VARCHAR(255) NOT NULL,
`capacity` INT NOT NULL,
`category_id` INT NOT NULL,
`status` ENUM ('planning', 'planned', 'completed') NOT NULL DEFAULT 'planning',
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

//Create Table Users
<?php
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

//Create Table Registration
<?php
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
`userid` int UNIQUE NOT NULL,
`eventid` int UNIQUE NOT NULL,
`status` ENUM('Interested', 'Attending', 'Not Attending') NOT NULL DEFAULT 'Not Attending',
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

//Create Table Categories
<?php
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

//Create Table logs
<?php
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
`user_id` INT UNIQUE NOT NULL,
`event_id` INT UNIQUE NOT NULL,
`action` ENUM('create', 'edit', 'delete') NOT NULL DEFAULT 'create',
`ip_adress` VARCHAR(45) NOT NULL,
`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Logs created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
