<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to the welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = $login_err = "";

// Check if the "Remember me" checkbox is checked and set cookies accordingly
if (isset($_POST["remember"])) {
    setcookie("email", $_POST["email"], time() + (86400 * 30), "/"); // 30 days
    setcookie("password", $_POST["password"], time() + (86400 * 30), "/"); // 30 days
} else {
    setcookie("email", "", time() - 3600, "/"); // delete the cookie
    setcookie("password", "", time() - 3600, "/"); // delete the cookie
}

// Set the email and password variables from the cookies if they exist
if (isset($_COOKIE["email"]) && isset($_COOKIE["password"])) {
    $email = $_COOKIE["email"];
    $password = $_COOKIE["password"];
}

// Processing form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if email is empty
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($email_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, email, password FROM users WHERE email = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = $email;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if email exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;

                            // Log the user action into the logs table
                            $log_action = "User logged in";
                            $log_user_id = $id;

                            $log_sql = "INSERT INTO logs (user_id, action) VALUES (?, ?)";
                            if ($log_stmt = mysqli_prepare($link, $log_sql)) {
                                mysqli_stmt_bind_param($log_stmt, "is", $log_user_id, $log_action);
                                mysqli_stmt_execute($log_stmt);
                                mysqli_stmt_close($log_stmt);
                            }
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else {
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid email or password.";
                        }
                    }
                } else {
                    // Email doesn't exist, display a generic error message
                    $login_err = "Invalid email or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="nav" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../CSS/styles.css">

    <nav class="topnav">
        <a class="navbar-brand" href="#">
            <img alt="Home" src="../HTML/Cuttlefishy.png" width="50" height="50" href="../HTML/index.html">
        </a>
        <a class="title" href="../HTML/index.html">Cuttlefish Events</a>
        <a class="login" href="./register.php">Register</a>
    </nav>
</head>
<body>
<div class="register">
    <form id="login-form" method="post">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $email; ?>">
        <span><?php echo $email_err; ?></span><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo $password; ?>">
        <span class="border-right-1"><?php echo $password_err; ?></span><br>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="remember" name="remember"> Remember me
                    </label>
                </div>
            </div>
        </div>

        <button type="submit">Sign in</button>
        <span><?php echo $login_err; ?></span>
    </form>
</div>
</body>
</html>
