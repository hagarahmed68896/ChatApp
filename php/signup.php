<?php
// include config file
include_once("config.php");

// if signup button clicked
if(isset($_POST['Signup'])){
//     if(empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || 
//        empty($_POST['password']) || empty($_POST['confirmpassword']) || empty($_POST['image'])){
//        echo "All inputs required";
//  }
//  else{
        $firstName = mysqli_real_escape_string($conn, $_POST['fname']);
        $lastName = mysqli_real_escape_string($conn, $_POST['lname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        // email validation
        $emailQuery = "SELECT * FROM users WHERE email ='{$email}'";
        $runEmailQuery = mysqli_query($conn,$emailQuery);

        if($runEmailQuery){
            if(mysqli_num_rows($runEmailQuery)> 0){
                echo "Email is already Exists"; 
            }else{
                // check password length
                if(strlen($_POST["password"]) < 8 || strlen($_POST["confirmpassword"]) < 8){
                    echo "password is too short, password must be at least 8 characters";
                }
            else if($_POST["password"] != $_POST["confirmpassword"]){
                echo "Password Not Matched";
            }
            
                
                else{
                    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                    $image = $_FILES['image'];

                    //image name
                    //size
                    // temporary
                    // type
                    $imageName = $image['name'];
                    $imageSize = $image['size'];
                    $imageTempName = $image['tmp_name'];
                    $imageType = $image['type'];

                    // get image extension or type
                    $explode = explode(".", $imageName);
                    $lowerCase = strtolower(end($explode));

                    // image extension
                    $extension = ["png", "jpg", "jpeg"];

                    // if extension not matched
                    if(in_array($lowerCase, $extension) == false){
                        echo "this is not a valid image, please choose a JPG , PNG or JPEG";
                    }else {
                        $random = rand(999999999,111111111);
                        $time = time();

                        // image unique name
                        $uniqueImageName = $random. $time . $imageName;

                        // save image
                        move_uploaded_file($imageTempName,"../images/" . $uniqueImageName);

                        // user status
                        $status = "offline";
                        // echo $uniqueImageName;
                        $insertQuery = "INSERT INTO users (firstName, lastName, email, password, image, status)
                        VALUES('{$firstName}','{$lastName}','{$email}','{$password}', '{$uniqueImageName}','{$status}')";
        
        
                    
                        $runInsertQuery = mysqli_query($conn, $insertQuery);
                        if(!$runInsertQuery){
                            echo "failed to insert in database";
                        }else{
                            echo "saved in database successfully";
                        }
                    }
                }

            }}}
        // }