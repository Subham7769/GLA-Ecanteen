<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "GET"  && $_SESSION["ctype"]=="Admin")
{
include "connection.php";
$name=$_GET["q"];
$product=$_GET["pro"];
?>
<table border="1" style="overflow-x:auto;"> 
<?php
if($name=="UPDATE"){
$productname=$_GET["proname"];
$productnov=$_GET["pronov"];
		$sql1="Update product set nov='".$productnov."',Name='".$productname."' where Product_id='".$product."'";
		$result1 = $con->query($sql1);
		$sql="select * from product";
		if($result = $con->query($sql)){
		echo "<h3 class='formheading'>List of Products</h3>";
		echo "<tr><th>Product Image</th><th>Product ID</th><th>Product Name</th><th>No. Of Variants</th><th>Category</th><th></th><th></th></tr>";
		while($row=$result->fetch_assoc()){
		$sql2="select Category_Name from category where Category_Id='".$row["Category_id"]."'";
		$result2 = $con->query($sql2);
		$row2=$result2->fetch_assoc();
		echo "<tr><td style='text-align:center'><img  style='width:50px;height:50px;' src='pics/".$row2["Category_Name"]."/".$row["Product_image"]."'></td><td style='text-align:center'>".$row["Product_id"]."</td>";
		echo "<td style='text-align:center'>".$row["Name"]."</td><td style='text-align:center'>".$row["nov"]."</td><td style='text-align:center'>".$row2["Category_Name"]."</td>";
		?><td><input class='formbutton' type='button'  name='Remove' value='Remove'  onclick="javascript:edit('Remove','<?php echo $row["Product_id"];?>')"/></td>
		<td><input class='formbutton' type='button'  name='Edit' value='Edit'  onclick="javascript:edit('Edit','<?php echo $row["Product_id"];?>')"/></td></tr><?php
		}
	}
}
else
	if($name=="MORE"){
		$sql="select * from product where Product_id='".$product."'";
		if($result = $con->query($sql)){
		echo "<h3 class='formheading'>List of Products</h3>";
		echo "<tr><th>Product Image</th><th>Product ID</th><th>Product Name</th><th>NOV</th><th>Category</th><th>Variant1</th><th>Price1</th><th>Variant2</th><th>Price2</th><th>Variant3</th><th>Price3</th><th>Variant4</th><th>Price4</th><th>Variant5</th><th>Price5</th><th>Variant6</th><th>Price6</th><th>Variant7</th><th>Price7</th><th>Variant8</th><th>Price8</th><th>Ship. Chrg.</th><th></th></tr>";
		while($row=$result->fetch_assoc()){
		$sql2="select Category_Name from category where Category_Id='".$row["Category_id"]."'";
		$result2 = $con->query($sql2);
		$row2=$result2->fetch_assoc();
		echo "<tr><td style='text-align:center'><img  style='width:50px;height:50px;' src='pics/".$row2["Category_Name"]."/".$row["Product_image"]."' height='30%' width='35%'></td><td style='text-align:center'>".$row["Product_id"]."</td>";
		echo "<td style='text-align:center;'><input style='width:70px;' type='text' id='proname' value='".$row["Name"]."'></td><td style='text-align:center;width:50px;'><input style='width:20px;' type='text' id='pronov' value='".$row["nov"]."'></td><td style='text-align:center'>".$row2["Category_Name"]."</td>";
		echo "<td style='text-align:center'><input style='width:70px;' type='text' id='provar1' value='".$row["Variant1"]."'></td>";
		echo "<td style='text-align:center'><input style='width:70px;' type='text' id='proprc1' value='".$row["Price1"]."'></td>";
		echo "<td style='text-align:center'><input style='width:70px;' type='text' id='provar2' value='".$row["Variant2"]."'></td>";
		echo "<td style='text-align:center'><input style='width:70px;' type='text' id='proprc2' value='".$row["Price2"]."'></td>";
		echo "<td style='text-align:center'><input style='width:70px;' type='text' id='provar3' value='".$row["Variant3"]."'></td>";
		echo "<td style='text-align:center'><input style='width:70px;' type='text' id='proprc3' value='".$row["Price3"]."'></td>";
		echo "<td style='text-align:center'><input style='width:70px;' type='text' id='provar4' value='".$row["Variant4"]."'></td>";
		echo "<td style='text-align:center'><input style='width:70px;' type='text' id='proprc4' value='".$row["Price4"]."'></td>";
		echo "<td style='text-align:center'><input style='width:70px;' type='text' id='provar5' value='".$row["Variant5"]."'></td>";
		echo "<td style='text-align:center'><input style='width:70px;' type='text' id='proprc5' value='".$row["Price5"]."'></td>";
		echo "<td style='text-align:center'><input style='width:70px;' type='text' id='provar6' value='".$row["Variant6"]."'></td>";
		echo "<td style='text-align:center'><input style='width:70px;' type='text' id='proprc6' value='".$row["Price6"]."'></td>";
		echo "<td style='text-align:center'><input style='width:70px;' type='text' id='provar7' value='".$row["Variant7"]."'></td>";
		echo "<td style='text-align:center'><input style='width:70px;' type='text' id='proprc7' value='".$row["Price7"]."'></td>";
		echo "<td style='text-align:center'><input style='width:70px;' type='text' id='provar8' value='".$row["Variant8"]."'></td>";
		echo "<td style='text-align:center'><input style='width:70px;' type='text' id='proprc8' value='".$row["Price8"]."'></td>";
		echo "<td style='text-align:center'><input style='width:70px;' type='text' id='ship_chrg' value='".$row["Shipping_charge"]."'></td>";
		?><td><input class='formbutton' type='button'  name='Update' value='UPDATE'  onclick="javascript:moreupdate('MOREUPDATE','<?php echo $row["Product_id"];?>')"/></td></tr><?php
		}
		}
	}
	else 	if($name=="MOREUPDATE"){
	$pname=$_GET["proname"];
	$nov=$_GET["pronov"];
	$provar1=$_GET["provar1"];
	$proprice1=$_GET["proprc1"];
	$provar2=$_GET["provar2"];
	$proprice2=$_GET["proprc2"];
	$provar3=$_GET["provar3"];
	$proprice3=$_GET["proprc3"];
	$provar4=$_GET["provar4"];
	$proprice4=$_GET["proprc4"];
	$provar5=$_GET["provar5"];
	$proprice5=$_GET["proprc5"];
	$provar6=$_GET["provar6"];
	$proprice6=$_GET["proprc6"];
	$provar7=$_GET["provar7"];
	$proprice7=$_GET["proprc7"];
	$provar8=$_GET["provar8"];
	$proprice8=$_GET["proprc8"];
	$shipchrg=$_GET["ship_chrg"];
		$sql1="Update product set Name='".$pname."',nov='".$nov."',Variant1='".$provar1."',Price1='".$proprice1."',Variant2='".$provar2."',Price2='".$proprice2."',Variant3='".$provar3."',Price3='".$proprice3."',Variant4='".$provar4."',Price4='".$proprice4."',Variant5='".$provar5."',Price5='".$proprice5."',Variant6='".$provar6."',Price6='".$proprice6."',Variant7='".$provar7."',Price7='".$proprice7."',Variant8='".$provar8."',Price8='".$proprice8."' ,Shipping_charge='".$shipchrg."' where Product_id='".$product."'";
		$result1 = $con->query($sql1);
		$sql="select * from product";
		if($result = $con->query($sql)){
		echo "<h3 class='formheading'>List of Products</h3>";
		echo "<tr><th>Product Image</th><th>Product ID</th><th>Product Name</th><th>No. Of Variants</th><th>Category</th><th></th><th></th></tr>";
		while($row=$result->fetch_assoc()){
		$sql2="select Category_Name from category where Category_Id='".$row["Category_id"]."'";
		$result2 = $con->query($sql2);
		$row2=$result2->fetch_assoc();
		echo "<tr><td style='text-align:center'><img  style='width:50px;height:50px;' src='pics/".$row2["Category_Name"]."/".$row["Product_image"]."'></td><td style='text-align:center'>".$row["Product_id"]."</td>";
		echo "<td style='text-align:center'>".$row["Name"]."</td><td style='text-align:center'>".$row["nov"]."</td><td style='text-align:center'>".$row2["Category_Name"]."</td>";
		?><td><input class='formbutton' type='button'  name='Remove' value='Remove'  onclick="javascript:edit('Remove','<?php echo $row["Product_id"];?>')"/></td>
		<td><input class='formbutton' type='button'  name='Edit' value='Edit'  onclick="javascript:edit('Edit','<?php echo $row["Product_id"];?>')"/></td></tr><?php
		}
		}
		}else
		if($name=="CUPDATE"){
		$cname=$_GET["name"];
		$cid=$_GET["cid"];
		$ctype=$_GET["ctype"];
		$mob=$_GET["mobile"];
		$addr=$_GET["addr"];
		$sql1="Update signup set name='".$cname."',mobile='".$mob."',ctype='".$ctype."',cid='".$cid."',address='".$addr."' where email='".$product."'";
		$result1 = $con->query($sql1);
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
		$con->close();
		}
		?>