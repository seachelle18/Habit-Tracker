<!DOCTYPE html>
<html lang="en">
<head>
    <title>Habit Tracker</title>
    <link rel="stylesheet" type="text/css" href="day-mode.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="habit tracker, mental health">
    <meta name="description" content="Habit Tracker">
    <meta name="author" content="Michelle Chow">
</head>
<header class="main-header">
    <div class="navbar">
        <ul>
            <li class="navbar-item"><a href="#">👻</a></li>
            <li class="navbar-item bubble"><a href="day.php">Morning</a></li>
            <li class="navbar-item bubble"><a href="night.php">Night</a></li>
            <li class="navbar-item bubble"><a href="journal.php">Journal</a></li>
            <li class="navbar-item bubble"><a href="about.php">About</a></li>
        </ul>
    </div>
    <div class="date">
        <?php 
        date_default_timezone_set("America/Edmonton");
        echo "Today is " . date('l, F j, Y');
        ?>
    </div>
</header>