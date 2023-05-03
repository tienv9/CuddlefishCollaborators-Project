<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$firstname = $lastname = $email = $password = $confirm_password = "";
$firstname_err = $lastname_err = $email_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate firstname
    if(empty(trim($_POST["firstname"]))){
        $username_err = "Please enter your first name.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["firstname"]))){
        $username_err = "firstname can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT first_name FROM users WHERE first_name = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["firstname"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate lastname
    if(empty(trim($_POST["lastname"]))){
        $username_err = "Please enter your last name.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["lastname"]))){
        $username_err = "lastname can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT last_name FROM users WHERE last_name = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["lastname"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate email
    if(empty(trim($_POST["email"]))){
        $username_err = "Please enter your email.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["email"]))){
        $username_err = "email can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT email FROM users WHERE email = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if($stmt->num_rows == 1){
                    $email_err = "This email is already in use.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
     if(empty($_POST["confirm_password"])){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }





    // Check input errors before inserting in database
    if(empty($firstname_err) && empty($lastname_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (?,?,?,?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_firstname, $param_lastname, $param_email, $param_password);

            // Set parameters
            $param_firstname = $firstname;
            $param_lastname = $lastname;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
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
    <a class="login" href="../HTML/login.html">Login</a>
</div>
</head>
<body>
<div class="register">
    <form action="register.php" method="post" >
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname"><br>

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname"><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email"><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br>

        <label for="passcheck">Confirm password:</label>
        <input type="password" id="passcheck" name="passcheck"><br>

        <button type="submit">Register</button>

        <script>
            const checkPasswords = () => {
                if (document.getElementById('password').value !== document.getElementById('passcheck').value) {
                    alert('Passwords do not match');
                    event.preventDefault();
                }
            }
        </script>

    </form>
</div>
</body>
</html>