<?php
include "connection.php";
session_start();
if( $_SERVER["REQUEST_METHOD"] =="GET"){
$_SESSION["noi"]=$_SESSION["noi"]+1;
$i=$_SESSION["noi"];
$_SESSION["qty"][$i]=$_GET["qty"];
$_SESSION["price"][$i]=$_GET["price"];
$t=$_GET["var"];
$_SESSION["variant"][$i]=substr($t,0,strlen($str)-1);
$_SESSION["product"][$i]=$_GET["pro"];
$sql = "SELECT Shipping_charge FROM  product where Name ='".$_GET["pro"]."'";
 $result = $con->query($sql);
   if ($result->num_rows > 0) {
	   while($row = $result->fetch_assoc()){
		$_SESSION["shipchrg"][$i]=$row["Shipping_charge"];
	   }
   }
echo "<script language='javascript'>";
echo "alert('Product Added To cart')";
echo '</script>';
   }
if($_SESSION["ctype"]==null)
{
	$_SESSION["msg1"]="Please Login ";
}
?>
<div id="popupContact1">
<!-- Contact Us Form -->
<div class="form" id='cartform' onload="alert('yes');" ><script>alert("yes");</script>
<form action="AddressConfirm.php" id="form" method="post" name="cartform">
<img id="close" src="icons/3.png" onclick ="div_hidecart()">
<h2>Cart</h2>
						<table border="1" cellpadding="10" cellspacing="10" id="orderedProductTbl">
							<thead>
							<tr><th>Item</th><th>Variant</th><th>Price</th><th>Qty</th><th>Shipping.</th><th>Total</th><th></th></tr></thead>  
							<tbody id="OrderP">
								<?php
								error_reporting(0);
								if($_SESSION["noi"]>0){
									$ct=0;
									echo "<script language='javascript'>document.getElementById('proceed').disabled='false'</script>";
									for($i=1;$i<=$_SESSION["noi"];$i++){
									echo "<tr align='center'><td align='center'>".$_SESSION["product"][$i]."</td><td align='center'>".$_SESSION["variant"][$i]."</td><td align='center'>".$_SESSION["price"][$i]."</td><td align='center'>".$_SESSION["qty"][$i]."</td><td align='center'>".$_SESSION["shipchrg"][$i]."</td><td align='center'>".($_SESSION["qty"][$i]*$_SESSION["price"][$i]+$_SESSION["shipchrg"][$i])."</td><td align='center'><input type='button' class='formsub' id='addtocart' onclick='removefromcart($i)' value='REMOVE'/></td></tr>";
								$ct=$ct+($_SESSION["qty"][$i]*$_SESSION["price"][$i]+$_SESSION["shipchrg"][$i]);
								}
								echo '<td  id="product_total_price"></td>';
								echo '</tbody><tfoot><tr>';
								echo '<th colspan="7" align="right" id="cart_total">Cart Total</th></tr>	';
								echo "<tr><th colspan='7' align='right'>$ct</th></tr>";
								echo '<tr><td colspan="7" align="center"><input type="submit" class="formsub" id="proceed" value="Proceed"/></td></tr>';   
								echo '</tfoot></table></form>';
								}
								else{
								$ct=0;			
								echo '<tr><th colspan="7" id="Empty Cart" align="center"><h3>CART IS EMPTY</h3></th></tr>';
								echo '<tr><td  id="product_total_price"></td>';
								echo '</tbody><hr><tfoot><tr>';
								echo '<th colspan="7" align="right" id="cart_total"><b>Cart Total</b></th></tr>	';
								echo "<tr><th colspan='7' align='right'>$ct</th></tr>";
								echo '<tr><td colspan="7" align="center"><input type="submit" class="formsub" id="proceed" value="Proceed" disabled="disabled" /></td></tr>';   
								echo '</tfoot></table></form>';
								}
					?>
</div>
</div>

