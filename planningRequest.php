<?php
session_start();

// for databasses connection
$conn=mysqli_connect("localhost", "root", "Rosem@rie143", "naquinemdb") or die();   // for databasses connection
$msg="";

//cannot access if you are authenticated
if(!isset($_SESSION['USER_ID'])) {
	header("location:login.php");
	die();
}

//for sending input data in database
if (isset($_POST['submit'])){

    $quarter=$_POST['quarter'];
    $workweek=$_POST['workweek'];
    $mondayDailyPlanningRequest=$_POST['mondayDailyPlanningRequest'];
    $tuesdayDailyPlanningRequest=$_POST['tuesdayDailyPlanningRequest'];
    $wednesdayDailyPlanningRequest=$_POST['wednesdayDailyPlanningRequest'];
    $thursdayDailyPlanningRequest=$_POST['thursdayDailyPlanningRequest'];
    $fridayDailyPlanningRequest=$_POST['fridayDailyPlanningRequest'];
	$saturdayDailyPlanningRequest=$_POST['saturdayDailyPlanningRequest'];
	$sundayDailyPlanningRequest=$_POST['sundayDailyPlanningRequest'];
	$mondayActualDailyPlanningRequest=$_POST['mondayActualDailyPlanningRequest'];
	$tuesdayActualDailyPlanningRequest=$_POST['tuesdayActualDailyPlanningRequest'];
	$wednesdayActualDailyPlanningRequest=$_POST['wednesdayActualDailyPlanningRequest'];
	$thursdayActualDailyPlanningRequest=$_POST['thursdayActualDailyPlanningRequest'];
	$fridayActualDailyPlanningRequest=$_POST['fridayActualDailyPlanningRequest'];
	$saturdayActualDailyPlanningRequest=$_POST['saturdayActualDailyPlanningRequest'];
	$sundayActualDailyPlanningRequest=$_POST['sundayActualDailyPlanningRequest'];
    $mondayDailyPercentage=$mondayActualDailyPlanningRequest / $mondayDailyPlanningRequest * 100;
	$tuesdayDailyPercentage=$tuesdayActualDailyPlanningRequest / $tuesdayDailyPlanningRequest * 100;
	$wednesdayDailyPercentage=$wednesdayActualDailyPlanningRequest / $wednesdayDailyPlanningRequest * 100;
	$thursdayDailyPercentage=$thursdayActualDailyPlanningRequest / $thursdayDailyPlanningRequest * 100;
	$fridayDailyPercentage=$fridayActualDailyPlanningRequest / $fridayDailyPlanningRequest * 100;
	$saturdayDailyPercentage=$saturdayActualDailyPlanningRequest / $saturdayDailyPlanningRequest * 100;
	$sundayDailyPercentage=$sundayActualDailyPlanningRequest / $sundayDailyPlanningRequest * 100;
	$totalRequest=$mondayDailyPlanningRequest+$tuesdayDailyPlanningRequest+$wednesdayDailyPlanningRequest+$thursdayDailyPlanningRequest+$fridayDailyPlanningRequest+$saturdayDailyPlanningRequest+$sundayDailyPlanningRequest;
	$totalShiped=$mondayActualDailyPlanningRequest+$tuesdayActualDailyPlanningRequest+$wednesdayActualDailyPlanningRequest+$thursdayActualDailyPlanningRequest+$fridayActualDailyPlanningRequest+$saturdayActualDailyPlanningRequest+$sundayActualDailyPlanningRequest;
	$planningRequestPercentage=$totalShiped / $totalRequest * 100;

	$query="INSERT INTO `planningrequest`(`quarter`, `workweek`, `mondayDailyPlanningRequest`,
	`tuesdayDailyPlanningRequest`, `wednesdayDailyPlanningRequest`, `thursdayDailyPlanningRequest`,
	`fridayDailyPlanningRequest`, `saturdayDailyPlanningRequest`, `sundayDailyPlanningRequest`,
	`mondayActualDailyPlanningRequest`, `tuesdayActualDailyPlanningRequest`,
	`wednesdayActualDailyPlanningRequest`, `thursdayActualDailyPlanningRequest`, `fridayActualDailyPlanningRequest`, 
	`saturdayActualDailyPlanningRequest`, `sundayActualDailyPlanningRequest`, `mondayDailyPercentage`, 
	`tuesdayDailyPercentage`, `wednesdayDailyPercentage`, `thursdayDailyPercentage`, `fridayDailyPercentage`, 
	`saturdayDailyPercentage`, `sundayDailyPercentage`, `totalRequest`, `totalShiped`, `planningRequestPercentage` ) 	
	VALUES ('$quarter','$workweek','$mondayDailyPlanningRequest','$tuesdayDailyPlanningRequest',
	'$wednesdayDailyPlanningRequest','$thursdayDailyPlanningRequest','$fridayDailyPlanningRequest',
	'$saturdayDailyPlanningRequest','$sundayDailyPlanningRequest','$mondayActualDailyPlanningRequest',
	'$tuesdayActualDailyPlanningRequest','$wednesdayActualDailyPlanningRequest','$thursdayActualDailyPlanningRequest',
	'$fridayActualDailyPlanningRequest','$saturdayActualDailyPlanningRequest','$sundayActualDailyPlanningRequest',
	'$mondayDailyPercentage','$tuesdayDailyPercentage','$wednesdayDailyPercentage','$thursdayDailyPercentage',
	'$fridayDailyPercentage','$saturdayDailyPercentage','$sundayDailyPercentage','$totalRequest','$totalShiped','$planningRequestPercentage')";
	
    $data=mysqli_query($conn,$query);

    if ($data) {
        header("location: planningRequest.php");
        $msg="Successfully Sent Data";
    }else {
        $msg="Failed to Send Data";
    }
}

//for fetching data from database
$show="select * from planningrequest";
$connect=mysqli_query($conn,$show);
$num=mysqli_num_rows($connect);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="index.css">
    <title>PLANNING REQUEST</title>
</head>
<body>

	<div class="row row-cols-1">
		<div>
			<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
  				<div class="container-fluid row-cols-4">
    				<a class="navbar-brand ml-2">PLANNING REQUEST</a>
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
		<div class="container">
			<div class="col-sm-1 mt-3" style="">
				<div class="form mt-2 p-3">
    				<form method="post" action="" >
						<div class="form mt-2 p-3">
							<div class="form mt-2 p-3">
								<label for="quarter">Quarter</label>         
								<select name="quarter" id="quarter">
                					<option value="2022-01">2022-01</option>
                					<option value="2022-02">2022-02</option>
									<option value="2022-03">2022-03</option>
									<option value="2022-04">2022-04</option>
            					</select>
            					<label for="workweek">Work Week</label>
            					<input id="workweek" type="number" placeholder="Enter work week" name="workweek" required>

							</div>
						
							<div class="form mt-2 p-3">
								<p>DAILY PLANNING REQUEST</p>
								<label for="mondayDailyPlanningRequest">Monday</label>
                				<input type="number" name="mondayDailyPlanningRequest" required>
								<label for="tuesdayDailyPlanningRequest">Tuesday</label>
                				<input type="number" name="tuesdayDailyPlanningRequest" required>
								<label for="wednesdayDailyPlanningRequest">Wednesday</label>
                				<input type="number" name="wednesdayDailyPlanningRequest" required>
								<label for="thursdayDailyPlanningRequest">Thursday</label>
                				<input type="number" name="thursdayDailyPlanningRequest" required>
								<label for="fridayDailyPlanningRequest">Friday</label>
                				<input type="number" name="fridayDailyPlanningRequest" required>
								<label for="saturdayDailyPlanningRequest">Saturday</label>
                				<input type="number" name="saturdayDailyPlanningRequest" required>
								<label for="sundayDailyPlanningRequest">Sunday</label>
                				<input type="number" name="sundayDailyPlanningRequest" required>
							</div>
							<div class="form mt-2 p-3">
								<p>DAILY PLANNING REQUEST ACTUAL</p>
								<label for="mondayActualDailyPlanningRequest">Monday</label>
                				<input type="number" name="mondayActualDailyPlanningRequest" required>
								<label for="tuesdayActualDailyPlanningRequest">Tuesday</label>
                				<input type="number" name="tuesdayActualDailyPlanningRequest" required>
								<label for="wednesdayActualDailyPlanningRequest">Wednesday</label>
                				<input type="number" name="wednesdayActualDailyPlanningRequest" required>
								<label for="thursdayActualDailyPlanningRequest">Thursday</label>
                				<input type="number" name="thursdayActualDailyPlanningRequest" required>
								<label for="fridayActualDailyPlanningRequest">Friday</label>
                				<input type="number" name="fridayActualDailyPlanningRequest" required>
								<label for="saturdayActualDailyPlanningRequest">Saturday</label>
                				<input type="number" name="saturdayActualDailyPlanningRequest" required>
								<label for="sundayActualDailyPlanningRequest">Sunday</label>
                				<input type="number" name="sundayActualDailyPlanningRequest" required>
							</div>
            				<input type="submit" name="submit" value="Submit" id="submit">
            				<div class="error">
                				<?php echo $msg ?>
							</div>
						</div>	
    				</form>
				</div>
			</div>	
				<div class="col-sm-11 mt-3 p-3">
					<table class="table table-hover">
						<h1 class="mt-3">PLANNING REQUEST</h1>
						<tr>
							<th></th>
							<th></th>
							<th colspan="7">Daily Planning Request</th>
							<th colspan="7">Daily Planning Request Output</th>
							<th colspan="7">OUT/IN %</th>
							<th>REQUEST</th>
							<th>SHIPPED</th>
							<th>SHIP TO REQUEST</th>
						</tr>
						<tr>
							<th>Quarter</th>
							<th>WW</th>
							<th>Mon</th>
							<th>Tue</th>
							<th>Wed</th>
							<th>Thu</th>
							<th>Fri</th>
							<th>Sat</th>
							<th>Sun</th>
							<th>Mon</th>
							<th>Tue</th>
							<th>Wed</th>
							<th>Thu</th>
							<th>Fri</th>
							<th>Sat</th>
							<th>Sun</th>
							<th>Mon</th>
							<th>Tue</th>
							<th>Wed</th>
							<th>Thu</th>
							<th>Fri</th>
							<th>Sat</th>
							<th>Sun</th>
							<th>HDD</th>
							<th>HDD</th>
							<th>TOTAL</th>
						</tr>
						<?php
							if ($num>0) {
								while($datas=mysqli_fetch_assoc($connect)) {
									echo "
									<tr>
										<td>".$datas['quarter']."</td>
										<td>".$datas['workweek']."</td>
										<td>".$datas['mondayDailyPlanningRequest']."</td>
										<td>".$datas['tuesdayDailyPlanningRequest']."</td>
										<td>".$datas['wednesdayDailyPlanningRequest']."</td>
										<td>".$datas['thursdayDailyPlanningRequest']."</td>
										<td>".$datas['fridayDailyPlanningRequest']."</td>
										<td>".$datas['saturdayActualDailyPlanningRequest']."</td>
										<td>".$datas['sundayDailyPlanningRequest']."</td>
										<td>".$datas['mondayActualDailyPlanningRequest']."</td>
										<td>".$datas['tuesdayActualDailyPlanningRequest']."</td>
										<td>".$datas['wednesdayActualDailyPlanningRequest']."</td>
										<td>".$datas['thursdayActualDailyPlanningRequest']."</td>
										<td>".$datas['fridayActualDailyPlanningRequest']."</td>
										<td>".$datas['saturdayActualDailyPlanningRequest']."</td>
										<td>".$datas['sundayActualDailyPlanningRequest']."</td>
										<td>".$datas['mondayDailyPercentage']."</td>
										<td>".$datas['tuesdayDailyPercentage']."</td>
										<td>".$datas['wednesdayDailyPercentage']."</td>
										<td>".$datas['thursdayDailyPercentage']."</td>
										<td>".$datas['fridayDailyPercentage']."</td>
										<td>".$datas['saturdayDailyPercentage']."</td>
										<td>".$datas['sundayDailyPercentage']."</td>
										<td>".$datas['totalRequest']."</td>
										<td>".$datas['totalShiped']."</td>
										<td>".$datas['planningRequestPercentage']."</td>
									</tr>
									";
								};					
							};
						?>
					</table>
				</div>	
			</div>		
    		<script src="index.js"></script>
		</div>
	</div>	
</body>
</html>