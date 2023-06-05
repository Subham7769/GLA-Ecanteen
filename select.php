<?php
session_start();
if($_SESSION["ctype"]!=null){
	if($_SERVER["REQUEST_METHOD"]=="GET" ){
$type=$_GET["q"];
echo '<table border="1px solid black" width="auto" height="auto" style="overflow-x:auto;">';
echo"<tr><th>Order Id</th><th>Order Time</th><th>Name</th><th>Mobile</th><th>Pay Mode</th><th>Item</th><th>Variant</th><th>Price</th><th>Quantity</th><th>Shipping</th><th>Total</th></tr>  ";
echo "<h3 class='formheading'>List of Orders</h3>";
				include "connection.php";
				$sql="select * from `order` where Status='$type' and Customer_id='".$_SESSION["islogin"]."'";
				if($result = $con->query($sql)){
				while($row=$result->fetch_assoc()){
				$sql2="select name,mobile from `signup` where cid='".$row["Customer_id"]."'";
				$result2 = $con->query($sql2);
				if ($result2->num_rows > 0) {
				$row2=$result2->fetch_assoc();
				$sql3="select * from `ordertable` where oid='".$row["Order_id"]."'";
				$sql4="select count(*) from `ordertable` where oid='".$row["Order_id"]."'";
				if($result4 = $con->query($sql4)){
					$st=0;
				while($row4=$result4->fetch_assoc()){
					if($row4["count(*)"]>0){
					$i=$row4["count(*)"];
					}
				if($result3 = $con->query($sql3)){
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
echo "</table>";				
}else
	header('Location:/Website\index.php');
}
else
{
}
?>