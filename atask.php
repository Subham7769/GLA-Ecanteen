<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "GET"  && $_SESSION["ctype"]=="Admin")
{
include "connection.php";
$name=$_GET["q"];
?>   
<script src="js/php.js"></script>
<table border="1" style="overflow-x:auto;"> 
<?php
if($name=="Product"){
	$sql="select * from product";
	if($result = $con->query($sql)){
		echo "<h3 class='formheading'>List of Products</h3>";
		echo "<tr><th>Product Image</th><th>Product ID</th><th>Product Name</th><th>No. Of Varinats</th><th>Category</th><th></th><th></th></tr>";
		while($row=$result->fetch_assoc()){
		$sql2="select Category_Name from category where Category_Id='".$row["Category_id"]."'";
		$result2 = $con->query($sql2);
		$row2=$result2->fetch_assoc();
		echo "<tr><td style='text-align:center'><img style='width:50px;height:50px;' src='pics/".$row2["Category_Name"]."/".$row["Product_image"]."' height='relative' width='relative'></td><td style='text-align:center'>".$row["Product_id"]."</td><td style='text-align:center'>".$row["Name"]."</td><td style='text-align:center'>".$row["nov"]."</td><td style='text-align:center'>".$row2["Category_Name"]."</td>";
?>
		<td><input class='formbutton' type='button'  name='REMOVE' value='Remove'  onclick="javascript:edit('Remove','<?php echo $row["Product_id"];?>')"/></td>
		<td><input class='formbutton' type='button'  name='Edit' value='Edit'  onclick="javascript:edit('Edit','<?php echo  $row["Product_id"];?>')"/></td></tr>
<?php
		}
}
}
else
if($name=="Category"){
	echo "<h3 class='formheading'>List of Category</h3>";
	$sql="select * from category";
	if($result = $con->query($sql)){
		echo "<tr><th>Category ID</th><th>Category Name</th><th></th></tr>";
	while($row=$result->fetch_assoc()){
		echo "<tr><td style='text-align:center'>".$row["Category_Id"]."</td><td style='text-align:center'>".$row["Category_Name"]."</td>";
		?>
		<td><input class='formbutton' type='button'  name='Remove' value='Remove'  onclick="javascript:edit('CatEdit','<?php echo  $row["Category_Id"];?>')"/></td></tr>
		<?php
	}
	}
}
else
if($name=="Bill"){
	echo "<h3 class='formheading'>List of Bills</h3>";
	echo "<tr><th>Order Id</th><th>Name</th><th>Order Time</th><th>Mobile</th><th>Pay Mode</th><th>Item</th><th>Variant</th><th>Price</th><th>Quantity</th><th>Shipping</th><th>Total</th></tr>";
		        $sql="select * from `order` where Status='Delivered'";
				if($result = $con->query($sql)){
				while($row=$result->fetch_assoc()){
				$sql2="select name,mobile from `signup` where cid='".$row["Customer_id"]."'";
				$result2 = $con->query($sql2);
				if ($result2->num_rows > 0) {
				$row2=$result2->fetch_assoc();
				$sql3="select * from `ordertable` where oid='".$row["Order_id"]."'";
				$sql4="select count(*) from `ordertable` where oid='".$row["Order_id"]."'";
				if($result4 = $con->query($sql4)){
				while($row4=$result4->fetch_assoc()){
					if($row4["count(*)"]>0){
					$i=$row4["count(*)"];
					}
				if($result3 = $con->query($sql3)){
					$st=0;
				while($row3=$result3->fetch_assoc()){
					$st=$st+$row3["Total"];
				echo "<tr>";
				if($i==$row4["count(*)"]){
				$i++;
				echo "<th rowspan='".$i."'>".$row["Order_id"]."</th><td rowspan='".$i."'style='text-align:center'>".$row2["name"]."</td><td rowspan='".$i."'>".$row["Order_Timing"]."</td><td rowspan='".$i."' style='text-align:center'>".$row2["mobile"]."</td><td rowspan='".$i."' style='text-align:center'>".$row["paymode"]."</td>";
				}
				echo "<td style='text-align:center'>".$row3["Product_Name"]."</td><td style='text-align:center'>".$row3["Variant"]."</td><td style='text-align:center'>".$row3["Price"]."</td><td style='text-align:center'>".$row3["Qty"]."</td><td style='text-align:center'>".$row3["Ship_Chrg"]."</td><td style='text-align:center'>".$row3["Total"]."</td></tr> "; 
				}
				if($st>0)
				echo "<tr><th colspan='5' style='text-align:center'>Total</th><td>$st</td></tr>";
				}
				}
				}
				}
				}
				}
				}
else
if($name=="Customer"){
	echo "<h3 class='formheading'>List of Customers</h3>";
		$sql="select * from signup";
		echo "<tr><th>Name</th><th>User Name</th><th>Email id</th><th>Mobile</th><th>Category</th><th>Address</th><th></th><th></th></tr>";
	if($result = $con->query($sql)){
		while($row=$result->fetch_assoc()){
		echo "<tr><td style='text-align:center'>".$row["name"]."</td><td style='text-align:center'>".$row["cid"]."</td><td style='text-align:center'>".$row["email"]."</td><td style='text-align:center'>".$row["mobile"]."</td><td style='text-align:center'>".$row["ctype"]."</td><td style='text-align:center'>".$row["address"]."</td>";	
?>
		<td><input class='formbutton' type='button'  name='REMOVE' value='Remove'  onclick="javascript:edit('CRemove','<?php echo $row["cid"];?>')"/></td>
		<td><input class='formbutton' type='button'  name='Edit' value='Edit'  onclick="javascript:edit('CEdit','<?php echo  $row["cid"];?>')"/></td></tr>
<?php
		}	
}
}
}
else
	header('Location:/Website\index.php');
$con->close();
?>
</table>