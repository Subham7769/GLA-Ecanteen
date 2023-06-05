<?php
include"connection.php";
session_start();
if($_SERVER["REQUEST_METHOD"]=="GET"  && $_SESSION["ctype"]=="Admin"){
	$but=$_GET["but"];
	$name=$_GET["q"];
?>   
<table border="1" width="auto" height='auto'> 
<?php
	if($but=="Delivered"){
		$sql="UPDATE `order` SET `Status` = 'Delivered' WHERE Order_id = '$name'";
		if($con->query($sql)){
			
			echo "Order Updated Succesfully";
		}
}
else
	if($but=="Remove"){
	$sql="UPDATE `order` SET `Status` = 'Canceled' WHERE `order`.`Order_id` = '$name'";
		if($con->query($sql)){
			echo "Order Canceled Succesfully";
		}	
}
}
else{
	header('Location:/Website\index.php');
}
$con->close();
?>