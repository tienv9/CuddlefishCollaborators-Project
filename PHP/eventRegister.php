
<!DOCTYPE html>
<html>
<head>
    <meta name="nav" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../CSS/styles.css">


    <div class="topnav">
        <a class="title" href="../HTML/index.html">This is a title, but should also be a link to main page</a>
    </div>
</head>
<body>
<div class="register">
    <form> //action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
        <p>Are you interested in attending this event?</p>
        <label for="response">Invitation Response: </label>
        <select id="response" name="response">
            <option value="interested">Interested</option>
            <option value="attending">Attending</option>
            <option value="not-attending">Not Attending</option>
        </select> 
        <button type="submit">Update Registration</button>
</form>
</div>
</body>
</html>
