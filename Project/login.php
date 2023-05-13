<?php
include('conn.php');
if(isset($_POST['login']))
{
    $email=$_POST['email'];
    $password=md5($_POST['pass']);
    $sql="SELECT * FROM clients WHERE email='".$email."' and password='".$password."'";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    if($count == 1) {
         
         
         header("location: home.html");
      }else {
         echo '<script>alert("Your Login Name or Password is invalid") </script>' ;
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,
100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
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
    <form action="" method="POST">
        <h2 class="p-2 text-center">Login Form</h2>
  <div class="container ">
    <div class="form-floating mb-3 text-center">
        <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" name="pass" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>
    <button type="submit" class="btn btn-danger w-100" name="login">Login</button>
  </div>
  <div class="container pt-2 pb-2 rounded" style="background-color:#fff">
    <div class="text-center text-black">You Don't have account? <a class='text-decoration-none' href="signup.php">sign up</a></div>
  </div>
</form>
  <script src='js/script.js'></script>
</body>
</html>