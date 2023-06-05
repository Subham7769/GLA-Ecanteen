<?php
include"connection.php";
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"  && $_SESSION["ctype"]=="Admin"){
	$cname=$_POST["C_Name"];
	$cid=$_POST["C_Id"];
	$sql = "SELECT Category_Name FROM  category where Category_Name ='$cname'";
 $result = $con->query($sql);
   if ($result->num_rows > 0) {
	   	 $_SESSION["msg1"]="Category already exist";
	header('Location:/Website\admin.php#');
}	
 else 
{
	$_SESSION["msg1"]="";
  $sql2="Insert into category(Category_Id, Category_Name) Values('$cid','$cname')";
}
if ($con->query($sql2) == TRUE) {
		?>
	<script>alert("Category Added Succesfully");</script>
	<?php
	header('Location:/Website\admin.php');
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