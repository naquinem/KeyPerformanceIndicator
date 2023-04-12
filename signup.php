<?php
//session_start();
$conn=mysqli_connect("localhost", "root", "Rosem@rie143", "naquinemdb") or die();
$msg="";
if (isset($_POST['submit'])){
    //echo "<pre>";
    //print_r($_POST);

    //$firstname=$_POST['firstname'];
    //$lastname=$_POST['lastname'];
    $username=$_POST['username'];
    //$gender=$_POST['gender'];
    //$birthday=$_POST['birthday'];
    $password=$_POST['password'];
    $password1=$_POST['password1'];
    
    $query="INSERT INTO `login`(`username`, `password`, `password1`) VALUES ('$username', '$password', '$password1')";

    $data=mysqli_query($conn,$query);

    if ($data) {
        header("location: SignIn.php");
        $msg="Successfully Signup";
    }else {
        $msg="Signup failed";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SignUp</title>
</head>
<body>
    <div class="container">
        <div class="signupdiv">
            <h2 id="word">SignUp Page</h2>
            <form method="post" action="" class="signup">            
            
                <label for="firstname">First Name</label>
                <input id="firstname" type="text" placeholder="Enter first name" name="firstname" required>
                <label for="lastname">Last Name</label>
                <input id="lastname" type="text" placeholder="Enter last name" name="lastname" required>
                <label for="username">Username</label>
                <input id="username" type="username" placeholder="Enter username" name="username" required>
                <label for="gender">Gender</label>
                <select name="gender" id="gender">
                    <option value="male">MALE</option>
                    <option value="female">FEMALE</option>
                </select>    
                <label for="birthday">Birthday:</label>
                <input type="date" id="birthday" name="birthday" required>
                <label for="password">Password</label>
                <input id="username" type="password" placeholder="Enter password" name="password" required>
                <label for="password1">Password</label>
                <input id="password1" type="password" placeholder="Confirm password" name="password1" required><br><br>
                <input type="submit" name="submit" value="Submit" id="submit">
                <div class="error">
                    <?php echo $msg ?>
                </div>
            </form>
        </div>
    </div>


    <script src="index.js"></script>
</body>
</html>