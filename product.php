<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"  && $_SESSION["ctype"]=="Admin"){
	include"connection.php";
	$pname=$_POST["P_Name"];
	$nov=$_POST["P_nov"];
	$pvar1=$_POST["P_Var1"];
	$pprice1=$_POST["P_Price1"];
	$pvar2=$_POST["P_Var2"];
	$pprice2=$_POST["P_Price2"];
	$pvar3=$_POST["P_Var3"];
	$pprice3=$_POST["P_Price3"];
	$pvar4=$_POST["P_Var4"];
	$pprice4=$_POST["P_Price4"];
	$pvar5=$_POST["P_Var5"];
	$pprice5=$_POST["P_Price5"];
	$pvar6=$_POST["P_Var6"];
	$pprice6=$_POST["P_Price6"];
	$pvar7=$_POST["P_Var7"];
	$pprice7=$_POST["P_Price7"];
	$pvar8=$_POST["P_Var8"];
	$pprice8=$_POST["P_Price8"];
	$pid=$_POST["P_ID"];
	$pcid=$_POST["P_CID"];
	$pshipchrg=$_POST["ship"];
	$img=$_POST["P_Img"];
	$sql = "SELECT Name FROM  product where Name ='$pname'";
 $result = $con->query($sql);
   if ($result->num_rows > 0) {
	   	 $_SESSION["msg1"]="Product already exist";
	header('Location:/admin.php');
}	
 else 
{
	$_SESSION["msg1"]="";
  $sql2="Insert into product(Product_id, Name,nov, Variant1, Price1, Variant2, Price2, Variant3, Price3, Variant4, Price4, Variant5, Price5, Variant6, Price6, Variant7, Price7, Variant8, Price8, Shipping_charge, Category_id, Product_image) Values('$pid','$pname','$nov','$pvar1','$pprice1','$pvar2','$pprice2','$pvar3','$pprice3','$pvar4','$pprice4','$pvar5','$pprice5','$pvar6','$pprice6','$pvar7','$pprice7','$pvar8','$pprice8','$pshipchrg','$pcid','$img')";
  }
if ($con->query($sql2)) {
	?>
	<script>alert("Product Added Succesfully");</script>
	<?php
	header('Location:/Website\admin.php');
	}
else{
	echo  "Error: ".$con->error." ";
	header('Location:/Website\Registration.php');
}
$con->close();
}
else{
	header('Location:/Website\Registration.php');
}
?>