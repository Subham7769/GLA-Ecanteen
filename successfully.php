<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
include "connection.php";
 $uname = $_POST["Name"];
 $emailid = $_POST["Email"];
 $pass = $_POST["Pwd"];
 $mob=$_POST["Mob"];
 $gen=$_POST["Gen"];
 $addr=$_POST["Addr"];
 $ctype = $_POST["CT"];
 $cid=$_POST["Roll"];
 $img=$_POST["upload"];
 $sql = "SELECT cid,email FROM  signup where email ='$emailid' OR cid='$cid'";
 $result = $con->query($sql);
   if ($result->num_rows > 0) {
	   	 $_SESSION["msg1"]="Email Id and Your College ID  Already Registered";
    echo "Record already exist";
	header('Location:/Website\Registration.php');
}	
 else 
{
	// to upload a image
$target_dir = "profile/";
$target_file = $target_dir . basename($_FILES["upload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["Submit"])) {
    $check = getimagesize($_FILES["upload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
		header('Location:/Website\Registration.php');
        $uploadOk = 0;
    }
}
$ext=substr($imageFileType,strpos($imageFileType,'/'));
$iname="profile/".$cid.".".$ext;
// Check if file already exists
if (file_exists($iname)) {
    echo "Sorry, file already exists.";
	header('Location:/Website\Registration.php');
    $uploadOk = 0;
}
// Check file size
if ($_FILES["upload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
	header('Location:/Website\Registration.php');
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	header('Location:/Website\Registration.php');
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
	header('Location:/Website\Registration.php');
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["upload"]["name"]). " has been uploaded.";
		rename($target_file,$iname);
    } else {
        echo "Sorry, there was an error uploading your file.";
		header('Location:/Website\Registration.php');
    }
}
// finished to upload a image
	$_SESSION["msg1"]= "An Error occured Please try again later";
  $sql2="Insert into signup(name, password, email, mobile, ctype, cid, gender, address,image) Values('$uname','$pass','$emailid','$mob','$ctype','$cid','$gen','$addr','$iname')";
}
if ($con->query($sql2) == TRUE) {
	$_SESSION["islogin"]=$cid;
	$_SESSION["name"]=$uname;
	$_SESSION["ctype"]=$ctype;
	$_SESSION["iname"]=$iname;
	header('Location:/Website\index.php');
	}
else{
	header('Location:/Website\Registration.php');
}
$con->close();
}
else{
	header('Location:/Website\Registration.php');
}
?>