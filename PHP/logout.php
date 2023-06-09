<?php
// Initialize the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();

// Delete regular HTTP cookies
$cookies = $_COOKIE;
foreach ($cookies as $cookie_name => $cookie_value) {
    setcookie($cookie_name, '', time() - 3600, '/');
}

// Delete jQuery cookies
echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
echo '<script>';
echo '$.removeCookie("email", { path: "/" });';
echo '$.removeCookie("password", { path: "/" });';
echo '</script>';

// Redirect to login page
header("location: ../HTML/index.html");
exit;
?>