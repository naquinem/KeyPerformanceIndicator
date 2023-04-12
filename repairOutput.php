<?php
session_start();

// for databasses connection
$conn=mysqli_connect("localhost", "root", "Rosem@rie143", "naquinemdb") or die();   // for databasses connection
$msg="";

//cannot access if you are authenticated
if(!isset($_SESSION['USER_ID'])) {
	header("location:SignIn.php");
	die();
}

//for sending input data in database
if (isset($_POST['submit'])){


    $quarter=$_POST['quarter'];
    $workweek=$_POST['workWeek'];
	$neptune=$_POST['neptune'];
	$saturn=$_POST['saturn'];
	$titanSlot=$_POST['titanSlot'];
	$otherTitan=$_POST['otherTitan'];
	$sled=$_POST['sled'];
	$magnusSlotVendor=$_POST['magnusSlotVendor'];
	$totalNeptune=$neptune + $saturn + $sled;
	$totalTitan=$titanSlot + $otherTitan + $magnusSlotVendor;
	$totalOutput=$totalNeptune + $totalTitan;

	$query="INSERT INTO `repairoutput`(`quarter`, `workWeek`, 
	`neptune`, `saturn`, `titanSlot`, `otherTitan`, `sled`, 
	`magnusSlotVendor`, `totalNeptune`, `totalTitan`, `totalOutput`) 
	VALUES ('$quarter','$workweek','$neptune','$saturn',
	'$titanSlot','$otherTitan','$sled','$magnusSlotVendor',
	'$totalNeptune','$totalTitan','$totalOutput')";
	
    $data=mysqli_query($conn,$query);

    if ($data) {
        header("location: repairoutput.php");
        $msg="Successfully Sent Data";
    }else {
        $msg="Failed to Send Data";
    }
}

//for fetching data from database
$show="select * from repairoutput";
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
    <title>REPAIR OUTPUT PER HEAD</title>
</head>
<body>
	<div>
		<nav class="navbar navbar-expand-sm bg-primary navbar-dark ml">
			<div class="container-fluid">
				<a class="navbar-brand">REPAIR OUTPUT</a>
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
			<div class="mt-3">
				<form method="post" action="" >
					<div>
						<label for="quarter">Quarter</label>         
						<select name="quarter" id="quarter">
							<option value="2022-01">2022-01</option>
							<option value="2022-02">2022-02</option>
							<option value="2022-03">2022-03</option>
							<option value="2022-04">2022-04</option>
						</select>
						<label for="workWeek">Work Week</label>
						<input id="workWeek" type="number" placeholder="Enter work week" name="workWeek" required>
						<label for="neptune">NEPTUNE</label>
						<input type="number" name="neptune" required>
						<label for="saturn">SATURN</label>
						<input type="number" name="saturn" required>
						<label for="titanSlot">TITAN SLOT</label>
						<input type="number" name="titanSlot" required>
						<label for="otherTitan">OTHER TITAN</label>
						<input type="number" name="otherTitan" required>
						<label for="sled">SLED</label>
						<input type="number" name="sled" required>
						<label for="magnusSlotVendor">MAGNUS SLOT/VENDOR</label>
						<input type="number" name="magnusSlotVendor" required>
						<button type="button" class="btn btn-primary" name="submit">Submit</button>
						<div class="error">
							<?php echo $msg ?>
						</div>
					</div>	
				</form>
			</div>
			<div class="col-11 mt-3">
				<h1>REPAIR OUTPUT PER HEAD</h1>
				<table class="table table-hover">
					<tr>
						<th>Quarter</th>
						<th>WW</th>
						<th>NEPTUNE</th>
						<th>SATURN</th>
						<th>TITAN SLOT</th>
						<th>OTHER TITAN</th>
						<th>SLED</th>
						<th>MAGNUS SLOT/VENDOR</th>
						<th>TOTAL NEPTUNE SHIPED</th>
						<th>TOTAL TITAN SHIPED</th>
						<th>TOTAL OUTPUT</th>
					</tr>
					<?php
						if ($num>0) {
							while($datas=mysqli_fetch_assoc($connect)) {
								echo "
									<tr>
										<td>".$datas['quarter']."</td>
										<td>".$datas['workWeek']."</td>
										<td>".$datas['neptune']."</td>
										<td>".$datas['saturn']."</td>
										<td>".$datas['titanSlot']."</td>
										<td>".$datas['otherTitan']."</td>
										<td>".$datas['sled']."</td>
										<td>".$datas['magnusSlotVendor']."</td>
										<td>".$datas['totalNeptune']."</td>
										<td>".$datas['totalTitan']."</td>
										<td>".$datas['totalOutput']."</td>
									</tr>
								";
							}
						
						}
					?>
				</table>
					<script src="index.js"></script>
		</div>
	</div>
</body>
</html>