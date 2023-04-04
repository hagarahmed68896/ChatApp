<?php
// server configuration
// 1-server name
// 2-user name
// 3-password
// 4-database name
$conn = mysqli_connect("localhost","root","","livechat");
if(!$conn){
    echo "Error connecting";
}
?>