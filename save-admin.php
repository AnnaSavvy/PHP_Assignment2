<?php
	// connection
	require './inc/database.php';
	// variables
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
    $email = $_POST['email'];
	$password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];
	// validate inputs
	$ok = true;
	require './inc/header.php';
		if (empty($first_name)) {
			echo '<p>First name required</p>';
			$ok = false;
		}
		if (empty($last_name)) {
			echo '<p>Last name required</p>';
			$ok = false;
		}
		if (empty($email)) {
			echo '<p>Email required</p>';
			$ok = false;
		}
		if ((empty($password)) || ($password != $password_repeat)) {
			echo '<p>Invalid passwords</p>';
			$ok = false;
		}
	// decide if we are saving or not
	if ($ok){
		$password = hash('sha512', $password);
		// set up the sql
		$sql = "INSERT INTO websiteadmins (first_name, last_name, email, password) 
		VALUES ('$first_name', '$last_name', '$email', '$password');";
		$conn->exec($sql);
    	echo '<section class="success-row">';
		echo '<div>';
		echo '<h3>Admin Saved</h3>';
		echo '</div>';
    	echo '</section>';
		header("Location: signin.php"); 
		
	}
	?>
	<!-- <section class="row success-back-row">
		<div>
			<p>All setup, click the button below to head to the sign in page!</p>
			<a href="signin.php" class="btn btn-primary">Sign In</a>
		</div>
	</section> -->
<?php require './inc/footer.php'; ?>
