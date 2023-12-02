<?php
session_start();

// check for authentication before we show any data
if (!isset($_SESSION['user_id']) || (time() > $_SESSION['timeout'])) {
    session_unset();     // Unset all session variables
    session_destroy();
    header('location: signin.php');
    exit();
} else {
    // connect to db
    require './inc/database.php';
    if (!empty($_GET['id'])) {
        // Prepared statement
        $query = "DELETE FROM content WHERE ID = ?";
        $statement = $conn->prepare($query);
        $statement->execute(array($_GET['id']));
    }

	$_SESSION['timeout'] = time() + 120; // seconds (2 minutes)

    // disconnect
    $conn = null;

    header('location: display-content.php');
    exit();

}
?>
