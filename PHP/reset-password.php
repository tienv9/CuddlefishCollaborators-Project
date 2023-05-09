<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else{
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
</head>
<body>

<div class="topnav">
  <a class="title" href="../HTML/index.html">This is a title, but should also be a link to main page</a>
  <a class="login" href="register.php">Register</a>
</div>
</head>
<body>
	<div class="register">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
        <h2>Reset Password</h2>
        <p>Please fill out this form to reset your password.</p>

		<label for="New Password">New Password:</label>
		<input type="text" id="new_password" name="new_password" value="<?php echo $new_password; ?>">
        <span class="invalid-feedback"><?php echo $new_password_err; ?></span><br>

		<label for="Confirm Password">Confirm Password:</label>
		<input type="password" id="confirm_password" name="confirm_password" value="<?php echo $password; ?>">
        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>

		<button type="submit">Sign in</button>
		<a href="welcome.php">Cancel</a>
	</form>
	</div>
</body>
</html>