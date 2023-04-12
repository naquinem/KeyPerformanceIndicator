<?php
session_start();
$conn=mysqli_connect("localhost", "root", "Rosem@rie143", "naquinemdb");
if(!isset($_SESSION['USER_ID'])) {
	header("location:login.php");
	die();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<style>
		@import url('https://fonts.googleapis.com/css2? family=poppins:wght@300;400;700&display=swap');
		body{
			display: grid;
			font-family: 'poppins', sans-serif;
		}
	</style>
</head>
<body>
	<header>
		<div>
			<nav>
				<h2>Welcome <?php echo $_SESSION['USER_NAME'] ?> </h2>
				<h5><a href="logout.php">Logout</a></h5>
			</nav>
		</div>

	</header>
	<main>
		<div>

		</div>
	</main>
	<footer></footer>
	
</body>
</html>