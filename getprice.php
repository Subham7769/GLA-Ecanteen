<?php
include"connection.php";
session_start();
$str=$_GET["q"];
$pro=$_GET["p"];
$t=substr($str,strlen($str)-1);
$sql="Select Price".$t." from product where Name='".$pro."'";
if($result= $con->query($sql)){
while($row = $result->fetch_assoc()){
echo $row["Price".$t];
	}
}
$con->close();
//}
//else {
//	header('Location:/Website\index.php');
//}
?>