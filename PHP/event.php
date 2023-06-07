<?php
// Include config file
session_start();

require_once "config.php";

// Define variables and initialize with empty values
$title = $description = $event_date = $start_time = $end_time = $location = $capacity = $category = $other = "";
$title_err = $event_date_err = $start_time_err = $end_time_err = $location_err ="";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate title
    if(empty(trim($_POST["title"]))){
        $title_err = "Please enter your title.";
    } else{
        // Prepare a select statement
        $sql = "SELECT title FROM event WHERE title = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_title);

            // Set parameters
            $param_title = trim($_POST["title"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                $title = trim($_POST["title"]);
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }


        // Prepare a select statement
        $sql = "SELECT description FROM event WHERE description = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_description);

            // Set parameters
            $param_description = trim($_POST["description"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                $description = trim($_POST["description"]);
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    


    // Validate event_date
    if(empty(trim($_POST["event_date"]))){
        $event_date_err = "Please enter your event_date.";
    } else{
        // Prepare a select statement
        $sql = "SELECT event_date FROM event WHERE event_date = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_event_date);

            // Set parameters
            $param_event_date = trim($_POST["event_date"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                $event_date = trim($_POST["event_date"]);
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate start_time
    if(empty(trim($_POST["start_time"]))){
        $start_time_err = "Please enter your start_time.";
    } else{
        // Prepare a select statement
        $sql = "SELECT start_time FROM event WHERE start_time = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_start_time);

            // Set parameters
            $param_start_time = trim($_POST["start_time"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                $start_time = trim($_POST["start_time"]);
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate end_time
    if(empty(trim($_POST["end_time"]))){
        $end_time_err = "Please enter your end_time.";
    } else{
        // Prepare a select statement
        $sql = "SELECT end_time FROM event WHERE end_time = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_end_time);

            // Set parameters
            $param_end_time = trim($_POST["end_time"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                $end_time = trim($_POST["end_time"]);
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate location
    if(empty(trim($_POST["location"]))){
        $location_err = "Please enter your location.";
    } else{
        // Prepare a select statement
        $sql = "SELECT location FROM event WHERE location = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_location);

            // Set parameters
            $param_location = trim($_POST["location"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                $location = trim($_POST["location"]);
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate capacity
        // Prepare a select statement
        $sql = "SELECT capacity FROM event WHERE capacity = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_capacity);

            // Set parameters
            $param_capacity = trim($_POST["capacity"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                $capacity = trim($_POST["capacity"]);
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    

    // Validate category
        // Prepare a select statement
        $sql = "SELECT category FROM event WHERE category = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_category);

            // Set parameters
            $param_category = trim($_POST["category"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                $category = trim($_POST["category"]);
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    

    // Validate other
        // Prepare a select statement
        $sql = "SELECT other FROM event WHERE other = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_other);

            // Set parameters
            $param_other = trim($_POST["other"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                $other = trim($_POST["other"]);
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    

    // Check input errors before inserting in database
    if(empty($title_err) && empty($event_date_err) && empty($start_time_err) && empty($end_time_err) && empty($location_err)){

        if(empty($capacity)){
            $capacity = 0;
        }
        if(empty($other)){
            $other = "N/A";
        }
        if(empty($description)){
            $description = "N/A";
        }

        // Prepare an insert statement
        $sql = "INSERT INTO event (organizerid, title, description, event_date, start_time, end_time, location, capacity, category, other) VALUES (?,?,?,?,?,?,?,?,?,?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssss",$param_organizerid, $param_title, $param_description, $param_event_date, $param_start_time, $param_end_time, $param_location, $param_capacity, $param_category, $param_other);

            // Set parameters echo htmlspecialchars($_SESSION["email"]);
            session_start();

            $param_organizerid = $_SESSION["id"];
            $param_title = $title;
            $param_description = $description;
            $param_event_date = $event_date;
            $param_start_time = $start_time;
            $param_end_time = $end_time;
            $param_location = $location;
            $param_capacity = $capacity;
            $param_category = $category;
            $param_other = $other;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: ./welcome.php");
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

<nav class="topnav">
    <a class="navbar-brand" href="#">
        <img alt="Home" src="../HTML/Cuttlefishy.png"
             width= "50"  height= "50" "./Cuttlefishy.png">
    </a>
    <a class="title" href="./welcome.php">Cuttlefish Events</a>
</nav>
</head>
<body>
<div class="register">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h2>Event Creation</h2>
        <p>Please fill out this form to create your event.</p>

        <label for="title">Event Title:</label>
        <input type="text" id="title" name="title" style="width: 600px;"> <br>
        <span><?php echo $title_err; ?></span><br>

        <label for="description">Description:</label> <br>
        <textarea id="description" name="description" rows="5" cols="50"></textarea> <br>

        <label for="date">Event Date:</label>
        <input type="date" id="event_date" name="event_date">

        <label for="start_time">Start Time:</label>
        <input type="datetime-local" id="start_time" name="start_time">

        <label for="end_time">End Time:</label>
        <input type="datetime-local" id="end_time" name="end_time"><br>

        <span><?php echo $event_date_err; ?></span><br>
        <span><?php echo $start_time_err; ?></span><br>
        <span><?php echo $end_time_err; ?></span><br>


        <label for="location">Location:</label>
        <input type="text" id="location" name="location" style="width: 600px;"> <br>
        <span><?php echo $location_err; ?></span><br>

        <label for="capacity">Event Capacity:</label>
        <input type="number" step="1" id="capacity" name="capacity" min="0">

        <label for="category">Event Category:</label>
        <select id="category" name="category">
            <option value="wedding">Wedding</option>
            <option value="family-reunion">Family Reunion</option>
            <option value="birthday">Birthday Party</option>
            <option value="other">Other</option>
        </select> <br>
        
        <label for="other">If Other Category:</label><br>
        <textarea id="other" name="other" rows="5" cols="50"></textarea><br>

        <button type="submit">Create Event</button>
    </form>
</div>
</body>

</html>

<style>
    span {
        font-weight: bold;
        color : red;
    }
</style>