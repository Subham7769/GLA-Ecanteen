<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="GET"){
	$i=$_GET["q"];
	while($i<=$_SESSION["noi"]-1){
$_SESSION["qty"][$i]=$_SESSION["qty"][$i+1];
$_SESSION["price"][$i]=$_SESSION["price"][$i+1];
$_SESSION["variant"][$i]=$_SESSION["variant"][$i+1];
$_SESSION["product"][$i]=$_SESSION["product"][$i+1];
$_SESSION["shipchrg"][$i]=$_SESSION["shipchrg"][$i+1];
$i++;
	}
	$_SESSION["noi"]=$_SESSION["noi"]-1;
	}
else
	header('Location:/Website\index.php');
	?>
<div id="popupContact1">
<!-- Contact Us Form -->
<div class="form" id='cartform' >
<form action="AddressConfirm.php" id="form" method="post" name="cartform">
<img id="close" src="icons/3.png" onclick ="div_hidecart()">
<h2>Cart</h2>
						<table border="1" cellpadding="10" cellspacing="10" id="orderedProductTbl">
							<thead>
							<tr  align="center"><th>Item</th><th>Variant</th><th>Price</th><th>Qty</th><th>Shipping.</th><th>Total</th><th></th></tr></thead>  
							<tbody id="OrderP">
							<?php
								if($_SESSION["noi"]>0){
									$ct=0;
									echo "<script language='javascript'>document.getElementById('proceed').disabled='false'</script>";
									for($i=1;$i<=$_SESSION["noi"];$i++){
									echo "<tr><td>".$_SESSION["product"][$i]."</td><td>".$_SESSION["variant"][$i]."</td><td>".$_SESSION["price"][$i]."</td><td>".$_SESSION["qty"][$i]."</td><td>".$_SESSION["shipchrg"][$i]."</td><td>".($_SESSION["qty"][$i]*$_SESSION["price"][$i]+$_SESSION["shipchrg"][$i])."</td><td><input type='button' class='formsub' id='addtocart' onclick='removefromcart($i)' value='REMOVE'/></td></tr>";
								$ct=$ct+($_SESSION["qty"][$i]*$_SESSION["price"][$i]+$_SESSION["shipchrg"][$i]);
								}
								echo '<td  id="product_total_price"></td>';
								echo '</tbody><hr><tfoot><tr>';
								echo '<th colspan="6" align="right" id="cart_total">Cart Total</th></tr>	';
								echo "<tr><th colspan='6' align='right'>$ct</th></tr>";
								echo '<tr><td colspan="6" align="center"><input type="submit" class="formsub" id="proceed" value="Proceed"/></td></tr>';   
								echo '</tfoot></table></form>';
								}
								else{
								$ct=0;								
								echo '<tr><th colspan="7" id="Empty Cart" align="center"><h3>CART IS EMPTY</h3></th></tr>';
								echo '<tr><td  id="product_total_price"></td>';
								echo '</tbody><hr><tfoot><tr>';
								echo '<th colspan="6" align="right" id="cart_total"><b>Cart Total</b></th></tr>	';
								echo "<tr><th colspan='6' align='right'>$ct</th></tr>";
								echo '<tr><td colspan="6" align="center"><input type="submit" class="formsub" id="proceed" value="Proceed" disabled="disabled" /></td></tr>';   
								echo '</tfoot></table></form>';
								}
					?>
</div>
</div>
