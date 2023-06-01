<?php

include('conn.php');
if(isset($_POST['signup']))
{
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['userpassword'];
    $address=$_POST['address'];
    $mobile=$_POST['mobile'];
    $fpass=md5($password);
    
    $sql="INSERT INTO `clients`(`name`, `address`, `phone`, `email`, `password`) VALUES ('".$username."','".$address."','".$mobile."','".$email."','".$fpass."')";
    if(mysqli_query($conn,$sql))
    {
      ?>

<script>
					window.alert('Signup Success');
					window.location.href='login.php';
				</script>
<?php 
    }
    else
    { ?>
<script>
					window.alert('Signup ERROR, please check Your data and try agin !');
					
				</script>
<?php
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/all.min.css">
    <style>
        form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 800px;
        }
        @media (max-width: 991px ) {
            form {
                width: 100%;
            }
        }
        form button {
            width: 300px;
            margin: 20px 0;
        }
    </style>
</head>
<body style="height: 100vh; background-color:#1e293b; position: relative;">
    <form action="" method="post">
        <div   class="container">
            <h1 class="text-center text-danger">Sign Up</h1>
            <p class="text-center text-white">Please fill in this form to create an account.</p>
            <hr>
            <div class="form-floating">
                <input type="email" class="form-control" name="email" id="floatingEmail" placeholder="Enter Your Email" required>
                <label for="floatingEmail">Enter Your Email</label>
            </div>
            <div class="form-floating mt-2">
                <input type="text" class="form-control" name="username" id="floatingEmail" placeholder="Enter Your Username" required>
                <label for="floatingEmail">Enter Your Username</label>
            </div>
            <div class="form-floating mt-2">
                <input type="tel" class="form-control" name="mobile" id="floatingEmail" placeholder="Enter Your Mobile" required>
                <label for="floatingEmail">Enter Your Mobile</label>
            </div>
            <div class="form-floating mt-2">
                <input type="text" class="form-control" name="address" id="floatingEmail" placeholder="Enter Your Address" required>
                <label for="floatingEmail">Enter Your Addrss</label>
            </div>
            <div class="form-floating mt-2">
                <input type="password" class="form-control" id="floatingPassword" name="userpassword" placeholder="Enter Password" required>
                <label for="floatingPassword">Enter Password</label>
            </div>
            <div class="form-floating mt-2">
                <input type="password" class="form-control" id="floatingPassword" name="cuserpassword" placeholder="Confirm Password" required>
                <label for="floatingPassword">Confirm Password</label>
            </div>
        <div class="clearfix">
        <button type="submit" name="signup" class="btn btn-danger mt-2 w-100">Sign Up</button>
        </div>
        </div>
        </form>
        <script src='js/script.js'></script>
</body>
</html>