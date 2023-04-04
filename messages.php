<?php
include_once("php/config.php");
session_start();
if (!isset($_SESSION['id'])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="CSS/messages.css">
</head>
<body>
    <div class="circle"></div>
    <div class="circle circle2"></div>
    <div id="container">
    <div id="header">
        <a href="users.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
              </svg>
        </a>
        <?php
            $myid = $_SESSION['id'];
            // getting from messages url
            $userid = mysqli_real_escape_string($conn, $_GET['userid']);

            $headerQuery = "SELECT * FROM `users` WHERE id = '{$userid}'";
            $runHeaderQuery = mysqli_query($conn, $headerQuery);

            if (!$runHeaderQuery) {
                echo "Connection failed";
            } else {
                $info = mysqli_fetch_assoc($runHeaderQuery);
            ?>
                <!-- profile -->
                <div id="profileImage">
                    <img src="images/<?php echo $info['image']; ?>" alt="">
                </div>

                <!-- user Detail (name & status) -->
                <div id="userDetail">
                    <h3 id="name"><?php echo $info['firstName'] . " " . $info['lastName']; ?></h3>
                    <p id="status"><?php echo $info['status']; ?></p>
                </div>
        </div>
    <?php
            }
    ?>

    <!-- <div id="profileImage">
        <img src="assets/WhatsApp Image 2022-07-27 at 3.54.33 PM (4).jpeg" alt="">
    </div>
    <div id="userDetail">
        <h3 id="name">Mohamed Hashad</h3>
        <p id="status">Online</p>
    </div>
    </div> -->
    <div id="mainSection">
<!-- <div class="request incoming">
    <h3 class="name">Mohamed Hashad</h3>
    <p class="messages">Lorem ipsum dolor sit amet consectetur 
        adipisicing elit. Vel libero illo aliquid suscipit, architecto eaque quasi officiis est doloribus ipsa expedita nobis atque voluptatem sed omnis recusandae dicta repellendus possimus!</p>
</div>
<div class="responseCard outgoing">
    <div class="response">
        <h3 class="name">You</h3>
        <p class="messages">Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus excepturi eum consequatur, 
            ab sapiente reiciendis voluptas quod rem omnis ratione alias reprehenderit soluta, neque est eaque esse, molestiae minus necessitatibus.</p>
    </div> -->

<!-- </div> -->
    </div>
    <form action="" id="typingArea">
    <div id="messagingTypingSection">
        <input type="text" name="outgoing" placeholder="Type Your Message Here." id="outgoing" class="setid" autocomplete="off" value="<?php echo $myid; ?>" hidden>
        <input type="text" name="incoming" placeholder="Type Your Message Here." id="incoming" class="setid" autocomplete="off" value="<?php echo $userid?>" hidden>
        <input type="text" name="typingField" placeholder="Type Your Message Here." id="typingField" autocomplete="off">
        <input type="submit" value="Send" id="sendMessage">
    </div>
        </form>
</div>
<script
      src="https://code.jquery.com/jquery-3.6.1.js"
      integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
      crossorigin="anonymous"
    ></script> 
<script src="js/showChat.js"></script>
<script src="js/messages.js"></script>
</body>
</html>