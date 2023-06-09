<?php
// Initialize the session
session_start();

// Include config file
require_once "config.php";

// Check if the user is logged in
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    // Log the user logout action into the logs table
    $log_action = "User logged out";
    $log_user_id = $_SESSION["id"];

    $log_sql = "INSERT INTO logs (user_id, action) VALUES (?, ?)";
    if ($log_stmt = mysqli_prepare($link, $log_sql)) {
        mysqli_stmt_bind_param($log_stmt, "is", $log_user_id, $log_action);
        mysqli_stmt_execute($log_stmt);
        mysqli_stmt_close($log_stmt);
    }

    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session.
    session_destroy();
}

// Redirect to login page
header("location: ../HTML/index.html");
exit;
?>