<?php
session_start();
$conn=mysqli_connect("localhost", "root", "Rosem@rie143", "naquinemdb");
if(!isset($_SESSION['USER_ID'])) {
	header("location:SignIn.php");
	die();
}
if (isset($_POST['submit'])){


    $quarter=$_POST['quarter'];
    $workweek=$_POST['workweek'];
    $mondayDailyPlanningRequest=$_POST['mondayDailyPlanningRequest'];
    $tuesdayDailyPlanningRequest=$_POST['tuesdayDailyPlanningRequest'];
    $wednesdayDailyPlanningRequest=$_POST['wednesdayDailyPlanningRequest'];
    

	$query="INSERT INTO `summary`(`id`, `metricMesurement`, `2022-Q1-Goal`, 
	`2022-Q2-Goal`, `2022-Q3-Goal`, `2022-Q4-Goal`, `2022-Q1-Actual`, 
	`2022-Q2-Actual`, `2022-Q3-Actual`, `2022-Q4-Actual`) 
	VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]',
	'[value-6]','[value-7]','[value-8]','[value-9]','[value-10]')";
	
    $data=mysqli_query($conn,$query);

    if ($data) {
        header("location: planningRequest.php");
        $msg="Successfully Sent Data";
    }else {
        $msg="Failed to Send Data";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="planningRequest.css" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<title>SUMMARY</title>
</head>
<body>
	<div>
		<nav class="navbar navbar-expand-sm bg-primary navbar-dark ml">
  			<div class="container-fluid">
    			<a class="navbar-brand">Welcome <?php echo $_SESSION['USER_NAME'] ?></a>
    			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      				<span class="navbar-toggler-icon"></span>
    			</button>
    			<div class="collapse navbar-collapse" id="mynavbar">
      				<ul class="navbar-nav me-auto">
        				<li class="nav-item">
							<a class="nav-link" href="index.php">Summary</a>
        				</li>
        				<li class="nav-item">
							<a class="nav-link" href="planningRequest.php">Planning Request</a>
        				</li>
        				<li class="nav-item">
							<a class="nav-link" href="repairOutput.php">Repair Output</a>
        				</li>
						<li class="nav-item">
							<a class="nav-link" href="logout.php">Logout</a>
        				</li>
      				</ul>
      				<form class="d-flex">
        				<input class="form-control me-2" type="text" placeholder="Search">
        				<button class="btn btn-primary" type="button">Search</button>
      				</form>
    			</div>
  			</div>
		</nav>
	</div>
	<div>

	</div>

	
</body>
</html>