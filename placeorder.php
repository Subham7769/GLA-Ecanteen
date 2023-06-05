<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"  && $_SESSION["ctype"]!=null){
	echo $_SESSION["noi"];
include "connection.php";
$t1=$_SESSION["islogin"];
$add=$_POST["Addr"];
$pm=$_POST["Pmode"];
$t3=array();
$t3=$_SESSION["qty"];
$t4=array();
$t4=$_SESSION["price"];
$t5=array();
$t5=$_SESSION["variant"];
$t6=array();
$t6=$_SESSION["product"];
$t7=array();
$t7=$_SESSION["shipchrg"];
$sql = "INSERT INTO `order` (`Customer_id`,paymode,Address) VALUES ('$t1','$pm','$add');";
if($result = $con->query($sql)){
$sql2="select max(Order_id) from `order` where Customer_id='$t1'";
if($result2 = $con->query($sql2)){
	echo "test".$sql2;
while($row2 = $result2->fetch_assoc()){
	$oid=$row2["max(Order_id)"];
	echo $oid;
}
}
$a=1;
while($a<=$_SESSION["noi"]){
	$tot=($t4[$a]*$t3[$a]+$t7[$a]);
$sql3 = "Insert into ordertable(oid, Product_Name, Variant, Price, Qty, Ship_Chrg, Total) values($oid,'$t6[$a]','$t5[$a]','$t4[$a]','$t3[$a]','$t7[$a]','$tot')";
if($result3 = $con->query($sql3)){
	$a++;
	echo "test3";
$_SESSION["qty"]=null;
$_SESSION["price"]=null;
$_SESSION["variant"]=null;
$_SESSION["product"]=null;
$_SESSION["shipchrg"]=null;
header('Location:/Website\index.php');
}
}
$_SESSION["noi"]=0;
}
$con->close();
}
else
{
header('Location:/Website\Registration.php');	
}
?>