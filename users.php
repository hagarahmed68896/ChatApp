<?php
include_once("php/config.php");
session_start();
if(!isset($_SESSION['id'])){
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatting App</title>
    <link rel="stylesheet" href="CSS/users.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/solid.css" integrity="sha384-Tv5i09RULyHKMwX0E8wJUqSOaXlyu3SQxORObAI08iUwIalMmN5L6AvlPX2LMoSE" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/fontawesome.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
     integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
</head>
<body>
    <div class="circle"></div>
    <div class="circle circle2"></div>
    <div id="container">
    <div id="header">
    <?php
        $headerQuery = "SELECT * FROM `users` WHERE id = '{$_SESSION["id"]}'";
        $runHeaderQuery = mysqli_query($conn, $headerQuery);

        if(!$runHeaderQuery){
            echo "connection failed";
        }else{
            $info = mysqli_fetch_assoc($runHeaderQuery);
        ?>
            <!-- profile image -->
            <div id="headerProfile">
            <img style="height: 70px; width: 70px;  overflow: hidden; border: 2px solid #e6336f; border-radius: 50%;" src="images/<?php echo $info['image']; ?>" alt="">
            </div>
            <div id="details">
                <!-- full name -->
                <h3 id="headerName"><?php echo $info['firstName']." ".$info['lastName']; ?></h3>
                <!-- status => Onine or Offline -->
                <h3 id="headerStatus"><?php echo $info['status']; ?></h3>
            </div>
            <?php
            }
            ?>
  
        <button id="logout"><a href="php/logout.php">Logout</a></button>
    </div>
    <div id="searchBox">
        <input type="text" id="search" placeholder="Find a Friend To chat" autocomplete="off">
        <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" fill="currentColor" class="bi bi-search searchButton" viewBox="0 0 26 26">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
          </svg>   
    </div>
    <div id="onlineUsers">


    </div>
    </div>
    <script
      src="https://code.jquery.com/jquery-3.6.1.js"
      integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
      crossorigin="anonymous"
    ></script> 
    <script src="js/users.js"></script>
</body>
</html>