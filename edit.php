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
		if($name=="Edit"){
		$sql="select * from product";
		if($result = $con->query($sql)){
		echo "<h3 class='formheading'>List of Products</h3>";
		echo "<tr><th>Product Image</th><th>Product ID</th><th>Product Name</th><th>No. Of Varinats</th><th>Category</th><th></th><th></th></tr>";
		while($row=$result->fetch_assoc()){
		$sql2="select Category_Name from category where Category_Id='".$row["Category_id"]."'";
		$result2 = $con->query($sql2);
		$row2=$result2->fetch_assoc();
		if($product==$row["Product_id"]){
		echo "<tr><td style='text-align:center'><img  style='width:50px;height:50px;' src='pics/".$row2["Category_Name"]."/".$row["Product_image"]."' height='30%' width='35%'></td><td style='text-align:center'>".$row["Product_id"]."</td>";
		echo "<td style='text-align:center;'><input style='width:70px;' type='text' id='proname' value='".$row["Name"]."'></td><td style='text-align:center;width:50px;'><input style='width:20px;' type='text' id='pronov' value='".$row["nov"]."'></td><td style='text-align:center'>".$row2["Category_Name"]."</td>";
		?><td><input class='formbutton' type='button'  name='more' value='MORE'  onclick="javascript:update('MORE','<?php echo $row["Product_id"];?>')"/></td>
		<td><input class='formbutton' type='button'  name='Update' value='UPDATE'  onclick="javascript:update('UPDATE','<?php echo $row["Product_id"];?>')"/></td></tr><?php
		}
		else
		{
			?><tr><td style='text-align:center'><img  style='width:50px;height:50px;' src='pics/<?php echo $row2["Category_Name"]."/".$row["Product_image"];?>'></td><td style='text-align:center'><?php echo $row["Product_id"];?></td><td style='text-align:center'><?php echo $row["Name"];?></td><td style='text-align:center'><?php echo $row["nov"];?></td><td style='text-align:center'><?php echo $row2["Category_Name"];?></td><td colspan='2' style='text-align:center' ><input class='formbutton' type='button'  name='Edit' value='Edit'  onclick="javascript:edit(this.value,'<?php echo $row["Product_id"];?>')"/></td></tr><?php
		}
		}
		}
		}
		else
		if($name=="Remove"){
		$sql1="Delete from product where Product_id='".$product."'";
		$result1 = $con->query($sql1);
		$sql="select * from product";
		if($result = $con->query($sql)){
		echo "<h3 class='formheading'>List of Products</h3>";
		echo "<tr><th>Product Image</th><th>Product ID</th><th>Product Name</th><th>No. Of Varinats</th><th>Category</th><th></th><th></th></tr>";
		while($row=$result->fetch_assoc()){
		$sql2="select Category_Name from category where Category_Id='".$row["Category_id"]."'";
		$result2 = $con->query($sql2);
		$row2=$result2->fetch_assoc();
		echo "<tr><td style='text-align:center'><img style='width:50px;height:50px;' src='pics/".$row2["Category_Name"]."/".$row["Product_image"]."' height='30%' width='35%'></td><td style='text-align:center'>".$row["Product_id"]."</td><td style='text-align:center'>".$row["Name"]."</td><td style='text-align:center'>".$row["nov"]."</td><td style='text-align:center'>".$row2["Category_Name"]."</td>";
		?>
		<td><input class='formbutton' type='button'  name='REMOVE' value='Remove'  onclick="javascript:edit('Remove','<?php echo $row["Product_id"];?>')"/></td>
		<td><input class='formbutton' type='button'  name='Edit' value='Edit'  onclick="javascript:edit('Edit','<?php echo  $row["Product_id"];?>')"/></td></tr>
		<?php
		}
		}
		}
		else
		if($name=="CatEdit"){
		$sql1="Delete from category where Category_Id='".$product."'";
		$result1 = $con->query($sql1);
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
		if($name=="CRemove"){
		$sql1="Delete from signup where cid='".$product."'";
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
		else
		if($name=="CEdit"){
		echo "<h3 class='formheading'>List of Customers</h3>";
		$sql="select * from signup";
		echo "<tr><th>Name</th><th>User Name</th><th>Email id</th><th>Mobile</th><th>Category</th><th>Address</th><th></th></tr>";
		if($result = $con->query($sql)){
		while($row=$result->fetch_assoc()){
		if($product==$row["cid"]){
		echo "<tr><td style='text-align:center'><input style='width:70px;' type='text' id='name' value='".$row["name"]."'></td><td style='text-align:center'><input style='width:70px;' type='text' id='cid' value='".$row["cid"]."'></td><td style='text-align:center'>".$row["email"]."</td><td style='text-align:center'><input style='width:70px;' type='text' id='mobile' value='".$row["mobile"]."'></td><td style='text-align:center'><input style='width:70px;' type='text' id='ctype' value='".$row["ctype"]."'></td><td style='text-align:center'><input style='width:70px;' type='text' id='addr' value='".$row["address"]."'></td>";	
		?>
		<td><input class='formbutton' type='button'  name='UPDATE' value='UPDATE'  onclick="javascript:cupdate('CUPDATE','<?php echo $row["email"];?>')"/></td></tr>
		<?php
		}
		else{
		echo "<tr><td style='text-align:center'>".$row["name"]."</td><td style='text-align:center'>".$row["cid"]."</td><td style='text-align:center'>".$row["email"]."</td><td style='text-align:center'>".$row["mobile"]."</td><td style='text-align:center'>".$row["ctype"]."</td><td style='text-align:center'>".$row["address"]."</td>";	
		?>
		<td><input class='formbutton' type='button'  name='Edit' value='Edit'  onclick="javascript:edit('CEdit','<?php echo $row["cid"];?>')"/></td></tr><?php
		}
		}		
		}
		}
		$con->close();
		}
	?>	