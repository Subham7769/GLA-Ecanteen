<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$con = mysqli_connect($servername, $username, $password);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}else{
$sql="use gla_canteen";
if ($con->query($sql)) {
} else {
echo "not Connected successfully";
}
}
?>