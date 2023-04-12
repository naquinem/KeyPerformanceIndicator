<?php
session_start();
$conn=mysqli_connect("localhost", "root", "Rosem@rie143", "naquinemdb");

if($conn->connect_error) {
    echo $conn->connect_error;
}
else{
    echo "success";
}

$msg="";
if (isset($_POST['submit'])){
    //echo "<pre>";
    //print_r($_POST);

    $username=mysqli_real_escape_string($conn, $_POST['username']);
    $password=mysqli_real_escape_string($conn, $_POST['password']);
    //$password1=mysqli_real_escape_string($conn, $_POST['password1']);
    $sql=mysqli_query($conn,"select * from login where username='$username' && password='$password' "); // && password1='$password' 
    $num=mysqli_num_rows($sql);
    if ($num>0) {
        //echo "found";
        $row=mysqli_fetch_assoc($sql);
        $_SESSION['USER_ID']= $row['id'];
        $_SESSION['USER_NAME']= $row['username'];
        header("location: index.php");
    }else{
        $msg="Please Enter Valid Details";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="container mt-5 bg-transparent" style="height:80%">

        <div class="row row-cols-10s">
            <form method="post" action="">
                <div class="rounded mt-5">
                    <img src="metrics.png" alt="metrics" style="width:15%">
                </div>
                <div class="h1 mt-5">
                    Sign In
                </div>
                <div class="mb-3 mt-3 h3">
                    <label for="username">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="username">
                </div>
                <div class="mb-3 h3">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                </div>
                <button type="submit" class="btn btn-primary btn-lg mt-3" name="submit">Submit</button>
                <div class="mt-5">
                    <a href="signup.php">Sign up for KPI</a>
                </div>
                <div class="error">
                    <?php echo $msg ?>
                </div>
            </form>
        </div>
        <div>
            <p></p>
        </div>
    </div>



    <script src="index.js"></script>
</body>
</html>