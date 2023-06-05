<!DOCTYPE html>
<?php
session_start();
if($_SESSION["ctype"]=="Admin"){
?>
<html>
	<head>
		<title>
			Admin
		</title>
   <link rel="stylesheet" href="css/admin.css">
	</head>
	<script>
	function edit(str,pro){
	var xmlhttp,proid,proname,pronov; 
   if (str == "" || pro== "") {
    return;
  }else
	  if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("getthing").innerHTML = this.responseText;
    }
  };
   xmlhttp.open("GET", "edit.php?q="+str+"&pro="+pro, true);
  xmlhttp.send();
}
function update(str,pro){
var xmlhttp;
var name=document.getElementById("proname").value;
var nov=document.getElementById("pronov").value;
if (str == "" || pro== "") {
    return;
  }else
	  if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("getthing").innerHTML = this.responseText;
    }
  };
   xmlhttp.open("GET", "update.php?pro="+pro+"&proname="+name+"&pronov="+nov+"&q="+str, true);
  xmlhttp.send();
}
function cupdate(str,pro){
var xmlhttp;
var name=document.getElementById("name").value;
var cid=document.getElementById("cid").value;
var ctype=document.getElementById("ctype").value;
var mobile=document.getElementById("mobile").value;
var addr=document.getElementById("addr").value;
if (str == "" || pro== "") {
    return;
  }else
	  if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
		xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("getthing").innerHTML = this.responseText;
	  alert("Customer Info. Successfully Updated");
    }
  };
   xmlhttp.open("GET", "update.php?pro="+pro+"&name="+name+"&cid="+cid+"&q="+str+"&ctype="+ctype+"&mobile="+mobile+"&addr="+addr, true);
  xmlhttp.send();
}
function moreupdate(str,pro){
var xmlhttp;
var name=document.getElementById("proname").value;
var nov=document.getElementById("pronov").value;
var provar1=document.getElementById("provar1").value;
var provar2=document.getElementById("provar2").value;
var provar3=document.getElementById("provar3").value;
var provar4=document.getElementById("provar4").value;
var provar5=document.getElementById("provar5").value;
var provar6=document.getElementById("provar6").value;
var provar7=document.getElementById("provar7").value;
var provar8=document.getElementById("provar8").value;
var proprc8=document.getElementById("proprc8").value;
var proprc7=document.getElementById("proprc7").value;
var proprc6=document.getElementById("proprc6").value;
var proprc5=document.getElementById("proprc5").value;
var proprc4=document.getElementById("proprc4").value;
var proprc3=document.getElementById("proprc3").value;
var proprc2=document.getElementById("proprc2").value;
var proprc1=document.getElementById("proprc1").value;
var ship_chrg=document.getElementById("ship_chrg").value;
if (str == "" || pro== "") {
    return;
  }else
	  if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("getthing").innerHTML = this.responseText;
    }
  };
   xmlhttp.open("GET", "update.php?pro="+pro+"&proname="+name+"&pronov="+nov+"&q="+str+"&provar1="+provar1+"&proprc1="+proprc1+"&provar2="+provar2+"&proprc2="+proprc2+"&provar3="+provar3+"&proprc3="+proprc3+"&provar4="+provar4+"&proprc4="+proprc4+"&provar5="+provar5+"&proprc5="+proprc5+"&provar6="+provar6+"&proprc6="+proprc6+"&provar7="+provar7+"&proprc7="+proprc7+"&provar8="+provar8+"&proprc8="+proprc8+"&ship_chrg="+ship_chrg  , true);
  xmlhttp.send()
  ;
}
	function getthing(str,ctype){
var xmlhttp; 
  if (str == "") {
    return;
  }
  else if(ctype=='Admin'){
if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("getthing").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "atask.php?q="+str, true);
  xmlhttp.send();
 }
	else { alert("You Are Not Admin"); }
}
 function setthing(but,ctype){
var xmlhttp; 
if(ctype=='Admin'){
var str = document.getElementById('Pendingform');
  if (str == "") {
    return;
  }
    var checkboxes = document.querySelectorAll('input[name="order"]:checked'), values = [];
if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		alert("Order is Updated as "+but);
		location.reload();
    }
  };
  Array.prototype.forEach.call(checkboxes, function(el) {
        values.push(el.value);
    });
	for (var i = 0; i < values.length; i++) {
  xmlhttp.open("GET", "setthing.php?q="+values[i]+"&but="+but, true);
  xmlhttp.send();
            
 }
}
else { alert("YOU ARE NOT ADMIN"); }
 }
  function logout(){
var xmlhttp; 
if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		window.location="index.php";
    }
  };
  xmlhttp.open("POST", "logout.php", true);
  xmlhttp.send();
 }
 function print(id)
{
var data=document.getElementById(id).innerHTML;
            var myWindow = window.open('', 'Order Details', 'height=400,width=600');
            myWindow.document.write('<html><head><title>Order Details</title>');
            myWindow.document.write('<style>td:hover{background-color:lightgrey}');
			myWindow.document.write('table { border-collapse: collapse; width: 100%;}');
			myWindow.document.write('tr:nth-child(even) {background-color: #f2f2f2}');
			myWindow.document.write('th, td {padding: 8px;border-bottom: 1px solid #ddd;}');
			myWindow.document.write('th:hover{background-color:skyblue}</style>');
            myWindow.document.write('</head><body >');
            myWindow.document.write(data);
            myWindow.document.write('</body></html>');
            myWindow.document.close();

            myWindow.onload=function(){

                myWindow.focus();
                myWindow.print();
                myWindow.close();
            };
}</script>
	<body>
		<header>
			<div align="center">
					<img src="icons/glalogo.png" alt="GLA LOGO"height="50px" width="50px">
						<font>GLA CANTEEN</font><input class="formsub" type="button" name="Logout" style="float:right;width:100px;" value="Logout" onclick="logout()"/>
			</div>
		</header>
		
			<div class="left-side-bar-admin" style="float:left;width:65%;">
				<div class="loginform" style="float:left;width:95%;overflow-x:scroll;">  
						<h3 class="formheading">List of Orders</h3>
					<form method="post">  
						<div id='Pendingform' ><table border="1" width="49%" height='49%'style='overflow-x:scroll;overflow-y:scroll;'>  
				<tr><th></th><th>Order Id</th><th>Name</th><th>Order Time</th><th>Mobile</th><th>Paymode</th><th>Item</th><th>Variant</th><th>Price</th><th>Quantity</th><th>Shipping</th><th>S. Total</th></tr>  
				<?php
				include "connection.php";
				$sql="select Order_Timing,Order_id, Customer_id, paymode from `order` where Status='Pending'";
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
				echo "<td rowspan='".$i."'><input type='checkbox' name='order' value='".$row["Order_id"]."' /></td><th rowspan='".$i."'>".$row["Order_id"]."</th><td rowspan='".$i."'style='text-align:center'>".$row2["name"]."</td><td rowspan='".$i."'>".$row["Order_Timing"]."</td><td rowspan='".$i."' style='text-align:center'>".$row2["mobile"]."</td><td rowspan='".$i."' style='text-align:center'>".$row["paymode"]."</td>";
				}
				echo "<td style='text-align:center'>".$row3["Product_Name"]."</td><td style='text-align:center'>".$row3["Variant"]."</td><td style='text-align:center'>".$row3["Price"]."</td><td style='text-align:center'>".$row3["Qty"]."</td><td style='text-align:center'>".$row3["Ship_Chrg"]."</td><td style='text-align:center'>".$row3["Total"]."</td></tr> "; 
				}
				if($st>0)
				echo "<tr><th colspan='5' style='text-align:center'>Total</th><td>$st</td></tr>";
				}
				}	
				}	
				else
					echo "<tr><th colspan='12'  style='text-align:center' >No More Orders Are Pending</th></tr>";		
				}	
				else
					echo "<tr><th colspan='12'  style='text-align:center' >No More Orders Are Pending</th></tr>";		
				}
				}	
				else
					echo "<tr><th colspan='12'  style='text-align:center' >No More Orders Are Pending</th></tr>";		
				?>  
				</table> 
					</div>   
								<table align="center">    
									<tr>	<td><input class="formbutton" type="button" value="Delivered" onclick="setthing(this.value,'<?php echo $_SESSION["ctype"] ?>')"  /><td><input class="formbutton" type="button" name="Print" value="Remove" onclick="setthing(this.value,'<?php echo $_SESSION["ctype"] ?>')" /></td></tr></table>   
									<input align="center" class="formbutton" type="button" value="Print"  onclick="print('Pendingform','<?php echo $_SESSION["ctype"] ?>')"  /> <br><br>
							</form> 
				</div>
			</div>

			<div class="right-side-bar-admin" style="float:top-left;">
				<div class="loginform" style="width:120%;" >  
						<h3 class="formheading">Add Category</h3>  
							<form action="category.php" method="post">  
								<table style="width:40%;" >  
									<tr><td>Category Name:</td><td><input type="text" name="C_Name"/></td>
											<td>Category Id:</td><td><input type="text" name="C_Id"/></td></tr>  
									<tr><td colspan="4" align="center"><input class="formbutton" type="submit" name="Add" value="Add Category"/></td></tr>  
								</table>  
							</form>
						<h3 class="formheading">Add Product</h3>  
							<form action="product.php" method="post">  
								<table  align="center"  style="width:40%;" >  
									<tr><td>Name</td><td><input type="text" name="P_Name"></td>
											<td>No.of Variants</td><td><input type="text" name="P_nov"></td></tr>
									<tr><td>Varient1</td><td><input type="text" name="P_Var1"></td>
											<td>Price1</td><td><input type="text" name="P_Price1"></td></tr>
									<tr><td>Varient2</td><td><input type="text" name="P_Var2"></td>
											<td>Price2</td><td><input type="text" name="P_Price2"></td></tr>
									<tr><td>Varient3</td><td><input type="text" name="P_Var3"></td>
											<td>Price3</td><td><input type="text" name="P_Price3"></td></tr>
									<tr><td>Varient4</td><td><input type="text" name="P_Var4"></td>
											<td>Price4</td><td><input type="text" name="P_Price4"></td></tr>
									<tr><td>Varient5</td><td><input type="text" name="P_Var5"></td>
											<td>Price5</td><td><input type="text" name="P_Price5"></td></tr>
									<tr><td>Varient6</td><td><input type="text" name="P_Var6"></td>
											<td>Price6</td><td><input type="text" name="P_Price6"></td></tr>
									<tr><td>Varient7</td><td><input type="text" name="P_Var7"></td>
											<td>Price7</td><td><input type="text" name="P_Price7"></td></tr>
									<tr><td>Varient8</td><td><input type="text" name="P_Var8"></td>
											<td>Price8</td><td><input type="text" name="P_Price8"></td></tr>
									<tr><td>Image</td><td><input type="text" placeholder='Enter URL' name="P_Img"></td>
											<td>Product Id</td><td><input type="text" name="P_ID"></td></tr>
									<tr><td>Category Id</td><td><input type="text" name="P_CID"></td>
											<td>Shipping Charges</td><td><input type="text" name="ship"></td></tr>
									<tr><td colspan="4" align="center"><input class="formbutton" type="submit" name="Add" value="Add Product"/></td></tr>  
								</table>  
							</form>
						<h3 class="formheading">List</h3>   
								<table  align="center"  style="width:40%;" >  
									<tr><td align="center"><input class="formbutton" type='button' style="width:90px;" name="Product" value="Product" onclick="getthing(this.value,'<?php echo $_SESSION["ctype"] ?>')"/></td>
									<td align="center"><input class="formbutton" type='button'  style="width:90px;" name="Customer" value="Customer"  onclick="getthing(this.value,'<?php echo $_SESSION["ctype"] ?>')"/></td></tr>  
									<tr><td align="center"><input class="formbutton" type='button'  style="width:90px;" name="Category" value="Category"  onclick="getthing(this.value,'<?php echo $_SESSION["ctype"] ?>')"/></td>  
									<td align="center"><input class="formbutton" type='button'  style="width:90px;"  name="Bill" value="Bill"  onclick="getthing(this.value,'<?php echo $_SESSION["ctype"] ?>')"/></td></tr>  
								</table>  
				</div>
		</div>
		<div style="clear:both;"></div>
			<div class="left-side-bar-admin" id='getthing' style="float:left;width:50%">
			</div>
	</body>
</html>
<?php
}
else
	header('Location:/Website\index.php');
?>