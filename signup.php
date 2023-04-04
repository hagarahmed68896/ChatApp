<?php
include_once("php/config.php");
session_start();
if(isset($_SESSION['id'])){
    header("location: users.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="CSS/signup.css">
</head>
<body>
    <div class="circle"></div>
    <div class="circle circle2"></div>
    <div id="container">
    <h2>Sign up</h2>
    <form action="" autocomplete="off" enctype="multipart/form-data" method="POST" id="signupData">
        <div id="errors"></div>
        <input type="text" name="fname" class="name" id="fname" placeholder="First name" required>
        <input type="text" name="lname" class="name" id="lname" placeholder="Last name" required><br>
        <input type="email" name="email" id="email" placeholder="Email" required><br>
        <input type="password" name="password" id="password" placeholder="Password" required><br>
        <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required><br>
        <input type="file" name="image" id="image" required><br>
        <input type="submit" name="Signup" id="Signup" value="Sign up">
        <p>Already have a account? <a href="login.php">Login</a> </p>
    </form>
    </div>
    <script
      src="https://code.jquery.com/jquery-3.6.1.js"
      integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
      crossorigin="anonymous"
    ></script> 
    <script src="js/signup.js"></script>
</body>
</html>