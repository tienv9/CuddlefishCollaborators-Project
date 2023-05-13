<?php
?>

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
        <label for="title">Event Title: </label>
        <input type="text" id="title" name="title">

        <label for="description">Description: </label>
        <input type="text" id="description" name="description">

        <label for="date">Event Date: </label>
        <input type="date" id="date" name="date">

        <label for="start_time">Start Time: </label>
        <input type="datetime-local" id="start_time" name="start_time">

        <label for="end_time">End Time: </label>
        <input type="datetime-local" id="end_time" name="end_time">

        <label for="location">Location: </label>
        <input type="text" id="location" name="location">

        <label for="capacity">Event Capacity: </label>
        <input type="number" id="capacity" name="capacity" min="0">

        <label for="category">Event Category: </label>
        <select id="category" name="category">
            <option value="wedding">Wedding</option>
            <option value="family-reunion">Family Reunion</option>
            <option value="birthday">Birthday Party</option>
            <option value="other">Other</option>
        </select>


        <label for="other">If Other Category: </label>
        <input type="text" id="other" name="other">

        <button type="submit">Create Event</button>
</div>
</body>
</html>
