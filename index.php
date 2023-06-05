<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>GLA Canteen</title>
    <meta name="author" content="Adtile">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="css/styles.css">
	<script src="js/js.js"></script>
	 <script src="js/responsive-nav.js"></script>
	<script type="text/javascript">
	<?php
	session_start();
	?>
	function select(str){
var xmlhttp; 
  if (str == "") {
    return;
  }
if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("loo").innerHTML = this.responseText;
	  div_showlogin();
    }
  };
  xmlhttp.open("GET", "select.php?q="+str, true);
  xmlhttp.send();
 }
	function AddtoCart(pro){
var xmlhttp; 
var qty=document.getElementById("Qty_"+pro).value;
var price=document.getElementById("Price_"+pro).value;
var variant=document.getElementById("Variant_"+pro).value;
  if (pro == "") {
    return;
  }
if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		document.getElementById("abc1").innerHTML= this.responseText;
		alert("Product Added to Cart");
    }
  };
  xmlhttp.open("GET", "addtocart.php?var="+variant+"&price="+price+"&qty="+qty+"&pro="+pro, true);
  xmlhttp.send();
 }
 function getprice(str,pro){
var xmlhttp; 
  if (str == "") {
    return;
  }
if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("Price_"+pro).value = this.responseText;
    }
  };
  xmlhttp.open("GET", "getprice.php?q="+str+"&p="+pro, true);
  xmlhttp.send();
 }
 function removefromcart(str){
var xmlhttp; 
  if (str == "") {
    return;
  }
if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("abc1").innerHTML = this.responseText;
	  div_showcart();
    }
  };
  xmlhttp.open("GET", "rmov.php?q="+str, true);
  xmlhttp.send();
 }
 function logout(){
var xmlhttp; 
if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		document.getElementById("abc").innerHTML = this.responseText;
		div_showlogin();
    }
  };
  xmlhttp.open("POST", "logout.php", true);
  xmlhttp.send();
 }
  function login(){
var xmlhttp; 
var uid=document.getElementById("userid").value;
var pwd=document.getElementById("pwd").value;
if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		document.getElementById("abc").innerHTML = this.responseText;
		div_showlogin();
    }
  };
  xmlhttp.open("GET", "login1.php?userid="+uid+"&pwd="+pwd, true);
  xmlhttp.send();
 }</script>
<!-- Start WOWSlider.com HEAD section -->
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<script type="text/javascript" src="engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->
  </head>
  <body id="body" onload="div_showlogin()"><center>
    <header id="Home">
			<a href="#Home" class="logo" data-scroll>
					<img src="icons/glalogo.png" alt="GLA LOGO"height="40px" width="38px">
					GLA CANTEEN
			</a>
		<nav class="nav-collapse">
			<ul>
			<li class="menu-item">
					<a style="padding: 1.02em;" align="center" id='pup' onclick="div_showlogin()"><img src="icons/user.png"  id='pup' onclick="div_showlogin()" ></a>
				</li>
				<li class="menu-item">
					<a style="padding: 1.02em;" align="center" id='cartf' onclick="div_showcart()" ><img src="icons/cart.png"  onclick="div_showcart()" ></a>
				</li>
			<li class="menu-item active">
					<a href="#Home" data-scroll>Home</a>
				</li>
				<li class="menu-item">
					<a href="#Drinks" data-scroll>Drinks</a>
				</li>
				<li class="menu-item">
					<a href="#Snacks" data-scroll>Snacks</a>
				</li>
				<li class="menu-item">
					<a href="#Fast-Food" data-scroll>Fast-Food</a>
				</li>
				<li class="menu-item">
					<a href="#Food" data-scroll>Food</a>
				</li>
				<li class="menu-item">
					<a href="#CakePastry" data-scroll>Cake/Pastry</a>
				</li>
				<li class="menu-item">
					<a href="#Sweets" data-scroll>Sweets</a>
				</li>
			</ul>
		</nav>
	</header>
<div id="abc"  style="overflow-y:scroll;">
<?php
error_reporting(0);
if($_SESSION["msg1"]!=null){
			echo "<font color='blue'><b>".$_SESSION["msg1"]."</b></font>";
			$_SESSION["msg1"]=null;
		}
		?>
<!-- Popup Div Starts Here -->
<?php
if($_SESSION["islogin"]==null){
?>
<div id="popupContact"  style="">
<!-- Contact Us Form -->
<div class="form"  style="border-radius: 5px;background-color: #f2f2f2;">
<img id="close" src="icons/3.png" onclick ="div_hidelogin()">
<h2>Please Login/Sign up</h2>
<hr>
						<table>  
							<tr><td><h3 align="center">User Id:</h3></td><td><input type="text" class="input" id="userid" required/></td></tr>  
							<tr><td><h3 align="center">Password:</h3></td><td><input type="password" id="pwd" required/></td></tr>  
							<tr><td colspan="2" align="center"><input class="formsub" type="button" name="signin" style="width:100px;"value="Login" onclick="login()"/></td></tr>  
						</table>  
<hr>						
<form action="Registration.php" id="form" method="post" name="registrationform">
<h2>Sign up</h2>
<hr>
<center>
<input class="formsub" type="submit" value="Signup"/>  
</center>
</form>
</div>
</div>
<!-- Popup Div Starts Here -->
<?php
}
else{
?>
<div id="popupContact2">
<!-- Contact Us Form -->
<div class="form">
<form id="form" method="post" name="loginform">
<img id="close" src="icons/3.png" onclick ="div_hidelogin()">
<center>
<h2>Welcome <?php echo $_SESSION["name"]; ?></h2>
<hr>
						<table>
							<tbody  align="center">
							<tr><td style="text-align:center;"><?php
							if($_SESSION["ctype"]=="Admin"){?>
							<a href= 'admin.php' class='formsub' style="text-decoration:none">Admin Page</a>
							<?php
							}
							?></td></tr>
							<tr><td class="td"><img src="<?php echo $_SESSION["iname"]; ?>"  align="center" width="150px" height="180px"></td></tr>
							<tr><td class="td"><?php echo $_SESSION["name"]; ?></td></tr>
							<tr><td class="td"align="center"><input class="formsub" type="button" name="Logout" style="width:100px;" value="Logout" onclick="logout()"/></td></tr>  
							</tbody>
						</table></form>
				</center>	    
				<select align="center" name="selectby" Required onchange='select(this.value)'>
<option value='0' disabled selected>Orders</option>
<option value='Pending'>Current Orders</option>
<option value='Delivered'>Delivered Orders</option>
<option value='Canceled'>Caneled Orders</option>
</select>
		
<div class="left-side-bar-admin form" style="background-color:white" id="loo" style="float:left;overflow-y: scroll;"></div>
</div>
</div>
</div>
<?php
}
?>
<!-- Popup Div Ends Here -->
</div>

<div id="abc1" class='left-side-bar-admin'>
<!-- Popup Div Starts Here -->
<div id="popupContact1">
<!-- Contact Us Form -->
<div class="form" id='cartform' style="border-radius: 5px;background-color: #f2f2f2;" >
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
									echo "<tr><td align='center'>".$_SESSION["product"][$i]."</td><td align='center'>".$_SESSION["variant"][$i]."</td><td align='center'>".$_SESSION["price"][$i]."</td><td align='center'>".$_SESSION["qty"][$i]."</td><td align='center'>".$_SESSION["shipchrg"][$i]."</td><td align='center'>".($_SESSION["qty"][$i]*$_SESSION["price"][$i]+$_SESSION["shipchrg"][$i])."</td><td align='center'><input type='button' class='formsub' id='addtocart' onclick='removefromcart($i)' value='REMOVE'/></td></tr>";
								$ct=$ct+($_SESSION["qty"][$i]*$_SESSION["price"][$i]+$_SESSION["shipchrg"][$i]);
								}
								echo '<td  id="product_total_price"></td>';
								echo '</tbody><hr><tfoot><tr>';
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
</div>
<div id="container">
<div class="slider">
<div id="wowslider-container1">
<div class="ws_images"><ul>
		<li><a href="#Drinks" target="_self"><img src="data1/images/drinks.png" alt="Drinks" title="Drinks" id="wows1_0"/></a></li>
		<li><a href="#Snacks"><img src="data1/images/snacks.png" alt="Snacks" title="Snacks" id="wows1_1"/></a></li>
		<li><a href="#CakePastry" target="_self"><img src="data1/images/cakes.png" alt="Cakes" title="Cakes" id="wows1_2"/></a></li>
	</ul></div>
	<div class="ws_bullets"><div>
		<a href="#" title="Drinks"><span>1</span></a>
		<a href="#" title="Snacks"><span>2</span></a>
		<a href="#" title="Cakes"><span>3</span></a>
	</div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.com/vi">image slider</a> by WOWSlider.com v8.7</div>
<div class="ws_shadow"></div>
</div>	
<script type="text/javascript" src="engine1/wowslider.js"></script>
<script type="text/javascript" src="engine1/script.js"></script>
</div>
	<?php
include "connection.php";
$sql="Select * from category ";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	?>
	<section id="<?php echo $row["Category_Name"];?>">
	<h2><?php
	echo $row["Category_Name"]."</h2>";
	$sql2="Select * from product where Category_Id=".$row["Category_Id"] ;
$result2= $con->query($sql2);
if ($result2->num_rows > 0) {
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
		?>
		<div class="subsection">
				<div>
					<img src="pics/<?php echo $row["Category_Name"];?>/<?php echo $row2["Product_image"];?>" class="pic"  >
				</div>
				<div>
					<?php echo $row2["Name"];?>
				</div>
				<div class="subsubsection">
				<h5>Var:</h5>
				<select id="Variant_<?php echo $row2["Name"];?>" onchange="getprice(this.value,'<?php echo $row2["Name"];?>')">
				<?php 
				$i=1;
				while($i<=$row2["nov"]){?>
						
							<option value="<?php echo $row2["Variant".$i]."$i";?>"> <?php echo $row2["Variant".$i]."</option>";
						$i++;
				}
						?></select>
				</div>
				<div id="Price" class="subsubsection">
					<h5>Price:</h5>
						<input type="text" size="1" id="Price_<?php echo $row2["Name"];?>" value="<?php echo $row2["Price1"];?>" readonly/>		
				</div>
				<div class="subsubsection">
					<h5>Qty:</h5>
						<input size="1" type="number" id="Qty_<?php echo $row2["Name"];?>" min="0" max="10" id="Qty" value='1' onchange="setprice(this.value,"<?php echo $row2["Name"];?>")"/>
				</div>
				<div>
						<input type="button" class="formsub" id= 'addtocart' value="Add to Cart" onclick="javascript:AddtoCart('<?php echo $row2["Name"];?>')"/>				
				</div>
			</div><?php
	}
}
	}
}?>
</section>
	</div>
    <script src="js/fastclick.js"></script>
    <script src="js/scroll.js"></script>
    <script src="js/fixed-responsive-nav.js"></script>

	</div>
<footer><center>
<h3>In Association With</h3>
<a href="https://msg91.com/startups/?utm_source=startup-banner"><img src="https://msg91.com/images/startups/msg91Badge.png" width="120" height="90" title="MSG91 - SMS for Startups" alt="Bulk SMS - MSG91"></a>
</center></footer>
	</center></body>
</html>