<?php
// include config file
include_once("config.php");
session_start();

// if "login" button clicked
if(isset($_POST['login'])){
    // store email
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    // store password
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // check email is unique or not
    $emailQuery = "SELECT * FROM `users` WHERE email = '$email'";
    $runEmailQuery = mysqli_query($conn, $emailQuery);

    if(!$runEmailQuery){
        echo "Query Failed";
    }else{
        if(mysqli_num_rows($runEmailQuery) > 0){
            $fetchData = mysqli_fetch_assoc($runEmailQuery);
            $hashedPassword = $fetchData['password'];
        
            if(password_verify($_POST['password'], $hashedPassword)){
                $_SESSION['id'] = $fetchData['id'];
        
                // update status
                $status = "online";
        
                // status query
                $statusQuery= "UPDATE users SET status = '{$status}' WHERE id = '{$_SESSION['id']}'";
                $runStatusQuery = mysqli_query($conn, $statusQuery);
                if(!$runStatusQuery){
                    echo "failed to update users status";
                }else{
                    echo "success";
                }
            }else{
                echo "Password not matched";
            }
        }else{
            echo "Invalid email address";
        }
        
    }
}
?>