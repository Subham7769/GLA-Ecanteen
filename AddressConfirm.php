<!DOCTYPE html>
<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"  && $_SESSION["ctype"]!=null){
?>
<html>
<head>
<title>Popup contact form</title>
<link href="css/elements.css" rel="stylesheet">
<script type="text/javascript">
// Validating Empty Field
function check_empty(e) {
var dropdown = document.getElementById('Addr');
var lab=document.getElementById("lab");
var lab1=document.getElementById("lab1");
if(dropdown.selectedIndex==0){
lab.innerHTML="Select Address<br>";
dropdown.focus();
return false; 
}
if (document.form.Pmode.value == "" ) {
lab1.innerHTML="Select Payment Mode<br>";
return false;
div_show();
} else {
document.getElementById('form').submit();
alert("Order Successfully Placed...");
return true;
}
}
function Redirect(){
window.location="index.php";
}
//Function To Display Popup
function div_show() {
document.getElementById('abc').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
document.getElementById('abc').style.display = "none";
Redirect();

}
</script>
</head>
<!-- Body Starts Here -->
<body id="body" style="overflow:hidden;" onload="div_show()">
<div id="abc">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Contact Us Form -->
<form id="form" method="post" name="form" action="placeorder.php" onsubmit="return check_empty(this.event)">
					<img id="close" src="icons/3.png" onclick ="div_hide()">
					<h1>Confirm Address</h1>
					<hr>
					<center>	
						<h2>Select Delivery Address</h2><label id="lab" style="color: red; font-style: italic;"></label>
						<select align="center" name="Addr" id="Addr">
							<option value="0" selected  disabled >Please Select The Address...</option>
							<option disabled>~~~~~~~~~~~~~~~~~~~~~~</option>
							<option value="A Block">A Block</option>
							<option value="B Block">B Block</option>
							<option value="C Block">C Block</option>
							<option  value="D Block">D Block</option>
							<option  value="E Block">E Block</option>
							<option  value="F Block">F Block</option>
							<option  value="G Block">G Block</option>
							<option  value="H Block">H Block</option>
							<option  value="I Block">I Block</option>
							<option  value="J Block">J Block</option>
							<option disabled>~~~~~~~~~~~~~~~~~~~~~~</option>
							<option  value="Wing1">Wing 1</option>
							<option  value="Wing2">Wing 2</option>
							<option  value="Wing3">Wing 3</option>
							<option  value="Wing4">Wing 4</option>
							<option  value="Wing5">Wing 5</option>
							<option disabled>~~~~~~~~~~~~~~~~~~~~~~</option>
							<option  value="Ganga">Ganga</option>
							<option  value="Yamuna">Yamuna</option>
							<option  value="Kalpna Chawla">Kalpna Chawla</option>
							<option  value="Godavari">Godavari</option>
							<option disabled>~~~~~~~~~~~~~~~~~~~~~~</option>
							<option  value="Academic Block1">Academic Block 1</option>
							<option  value="Academic Block2">Academic Block 2</option>
							<option  value="Academic Block3">Academic Block 3</option>
							<option  value="Academic Block4">Academic Block 4</option>
							<option  value="Academic Block5">Academic Block 5</option>
							<option  value="Academic Block6">Academic Block 6</option>
							<option  value="Academic Block7">Academic Block 7</option>
							<option  value="Academic Block8">Academic Block 8</option>
							<option  value="Academic Block9">Academic Block 9</option>
							<option  value="Academic Block10">Academic Block 10</option>
							<option disabled>~~~~~~~~~~~~~~~~~~~~~~</option>
							<option  value="Residential Block1">Residential Block 1</option>
							<option  value="Residential Block2">Residential Block 2</option>
							<option  value="Residential Block3">Residential Block 3</option>
							<option  value="Residential Block4">Residential Block 4</option>
							<option  value="Residential Block5">Residential Block 5</option>
							<option  value="Residential Block6">Residential Block 6</option>
							<option  value="Residential Block7">Residential Block 7</option>
							<option  value="Residential Block8">Residential Block 8</option>
							<option  value="Residential Block9">Residential Block 9</option>
							<option  value="Residential Block10">Residential Block 10</option>
							<option disabled>~~~~~~~~~~~~~~~~~~~~~~</option>
						</select><br>
						<h2>Payment Mode</h2><label id="lab1" style="color: red; font-style: italic;"></label>
						<input id="COD" value="COD" name="Pmode"  type="radio">COD
						<input id="CC" value="CC" name="Pmode" type="radio">Card Payment<br>
						<input type="submit" class="formsub"   value="Place Order">
						</center>
</form>
</div>
</div>
</body>
<!-- Body Ends Here -->
</html>
<?php
	}
else
	header('Location:/Website\index.php');
?>