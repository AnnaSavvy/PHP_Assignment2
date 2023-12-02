<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Willowdale Gardening</title>
    <meta name="description" content="Willowdale Gardening">
    <meta name="author" content="Anna Savitskaia">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril%20Fatface">

</head>

<body>
<header>
    <h1>Willowdale Gardening. Call us now! <a href="tel:1-777-777-7777">1-777-777-7777</a></h1>
</header>
<nav id="nav_menu">
    <img src="img/logo.png" alt="Logo" width="100" height="100">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="display-content.php">View</a></li>
        <li>
            <?php
            if (!isset($_SESSION['user_id'])) {
                echo '<a href="signin.php">Sign In</a>';
            } else {
                echo '<a href="logout.php">Sign Out</a>';
            }
            ?>
        </li>
    </ul>
</nav>