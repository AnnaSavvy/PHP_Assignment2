<?php
session_start();
require './inc/header.php';

$isAdmin = false;
if (isset($_SESSION['user_id']) && time() < $_SESSION['timeout']) {
    $isAdmin = true;
}

// connect to db
require './inc/database.php';
if (!empty($_POST['submit'])) {
    $editing = !empty($_POST['ID']);
    // check for authentication before we show any data
    if (!$isAdmin && $editing) {
        session_unset();     // Unset all session variables
        session_destroy();
        header('location: signin.php');
        exit();
    }

    // Prepared statement
    if (!empty($_POST['ID'])) {
        $query = "UPDATE content SET image = ?, name = ?, price = ?, description = ? WHERE ID = ?";
    } else {
        $query = "INSERT INTO content (image, name, price, description) VALUES(?,?,?,?)";
    }

    $statement = $conn->prepare($query);

    // File name
    $filename = $_FILES['image']['name'];
    // Location
    $target_file = './uploads/'.$filename;
    // file extension
    $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);
    // Valid image extension
    $valid_extension = array("png","jpeg","jpg");
    if(in_array($file_extension, $valid_extension)) {
        // Upload file
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){
            // Execute query
            if ($editing) {
                $statement->execute(
                    array($filename,$_POST['name'],$_POST['price'],$_POST['description'],$_POST['ID']));
            } else {
                $statement->execute(
                    array($filename,$_POST['name'],$_POST['price'],$_POST['description']));
            }
            $uploadSuccess = true;

        }
    }
    else {
        $valid_file=false;
    }
}

$_SESSION['timeout'] = time() + 120; // seconds (2 minutes)

// set up query
$sql = "SELECT * FROM content";

// run the query and store the results
$result = $conn->query($sql);

echo '<main >';
// Display the username from the session variable if available
if (isset($_SESSION['user_id'])) {
    $fname = htmlspecialchars($_COOKIE['firstname']);
    $lname = htmlspecialchars($_COOKIE['lastname']);
    echo '<h2>Welcome back, ' . $fname .' '.$lname. '!</h2>';
}
echo '<h2>Upload you plant for sale or exchange here:</h2>
  <div class="box">';
echo '<div class="item" id="create" ><a href="edit-content.php" class="btn">Create new item</a></div>';
foreach ($result as $row) {
    echo '<div class="item item'.$row['ID'] . '">';
    echo '<img src="uploads/'.$row['image'].'" alt="Garden" width="100%">';
    echo '<p class="plant">Name: '.$row['name'].'</p>';
    echo '<p class="plant">Price: $'.$row['price'].'</p>';
    echo '<p class="plant">Description: '.$row['description'].'</p>';
    if ($isAdmin) {
        echo '<p class="btn"><a href="edit-content.php?id=' . $row['ID'] . '">Edit</a></p>'. '   ';
        echo '<p class="btn"><a href="delete-content.php?id=' . $row['ID'] . '">Delete</a></p>';
    }
    echo '</a></div>';
}

// close the table
echo '</div>
</main>';

// disconnect
$conn = null;

require './inc/footer.php';
?>
